<?php

namespace app\admin\model;

use think\Model;
use think\Db;
use Cache;
use thinl\File;

class Admin extends Model
{
    //
    public function art_edit($data)
    {
    	$id = $data['art_id'];
    	Db::startTrans();
    	try{
    		$article = [
    			'title' =>$data['title'],
    			'content'=>$data['content'],
    			'class_id'=>$data['class_id'],
    		];
    		Db::name('article')->where('id',$id)->Update($article);
    		Db::name('photo p')->leftjoin('art_photo ap','p.id = ap.photo_id')->where('ap.art_id',$id)->Update(['is_del'=>1]);
            Db::name('art_photo')->where('art_id',$data['art_id'])->delete();
    		
    		if( isset($data['images']) ){
    			$img_pos = $data['img_pos'];
		    	$day = substr(date('Ymd'),2);
		    	$src = '../public/static/images/article/'.$day;
		    	$s_time = mktime(0,0,0,date('m'),date('d'),date('Y'));
		    	$e_time = mktime(23,59,59,date('m'),date('d'),date('Y'));
		    	$name_sql = Db::query("select name from mak_photo where id = (select MAX(id) from mak_photo where create_time between $s_time and $e_time)");
		    	if(!empty($name_sql)){
		    		$name = $name_sql[0]['name'];
		    	    $name=str_replace(strrchr($name, "."),"",$name);
		    	    preg_match_all('/\d+/',$name,$arr);
		    	    $num = $arr[0][count($arr[0])-1];
		    	    $new_num = sprintf("%0".(strlen($num))."d",$num+1);
		    	    $name = 'img'.$new_num;
		    	}else{
		    	    $name = 'img'.'001';
		    	}
		    	foreach($data['images'] as $key=>$file){
		    		// $info->setUploadInfo($info);
		    		static $img_info = [];
		    		$pos = $img_pos[$key];
		    	    $info = $file->move($src,$name);
		    	    $img_arr = [
		    	        'name' => $info->getFilename(),
		    	        'pos' => $pos,
		    	        'src' => $src,
		    	        'create_time' => time()
		    	    ];
		    	    $img_info[] =$img_arr;
		    	    //图片信息插入数据库
		    	    $photo_id = Db::name('photo')->insertGetId($img_arr);
		    	    Db::name('art_photo')->insert(['art_id'=>$id,'photo_id'=>$photo_id]);
		    	    //重新命名文件名,让其为 img001、img002一直递增。
		    	    preg_match_all('/\d+/',$name,$arr);
		    	    $num = $arr[0][count($arr[0])-1];
		    	    $new_num = sprintf("%0".(strlen($num))."d",$num+1);
		    	    $name = 'img'.$new_num;
		    	}
    		}

    		Db::commit();
    		return true;
    	} catch(\Exception $e){
    		
    		Db::rollback();
    		return false;
    	}
    }

    public function art_add($data)
    {
    	Db::startTrans();
    	try{
    		$article = [
    			'title' =>$data['title'],
    			'content'=>$data['content'],
    			'class_id'=>$data['class_id'],
    			'create_time'=>time()
    		];
    		$art_id = Db::name('article')->insertGetId($article);
	    	if(isset($data['images'])){
	    		$img_pos = $data['img_pos'];
		    	$day = substr(date('Ymd'),2);
		    	$src = '../public/static/images/article/'.$day;
		    	$s_time = mktime(0,0,0,date('m'),date('d'),date('Y'));
		    	$e_time = mktime(23,59,59,date('m'),date('d'),date('Y'));
		    	$name_sql = Db::query("select name from mak_photo where id = (select MAX(id) from mak_photo where create_time between $s_time and $e_time)");
		    	if(!empty($name_sql)){
		    		$name = $name_sql[0]['name'];
		    	    $name=str_replace(strrchr($name, "."),"",$name);
		    	    preg_match_all('/\d+/',$name,$arr);
		    	    $num = $arr[0][count($arr[0])-1];
		    	    $new_num = sprintf("%0".(strlen($num))."d",$num+1);
		    	    $name = 'img'.$new_num;
		    	}else{
		    	    $name = 'img'.'001';
		    	}
		    	foreach($data['images'] as $key=>$file){
		    		// $info->setUploadInfo($info);
		    		static $img_info = [];
		    		$pos = $img_pos[$key];

		    	    $info = $file->move($src,$name);
		    	    $img_arr = [
		    	        'name' => $info->getFilename(),
		    	        'pos' => $pos,
		    	        'src' => $src,
		    	        'create_time' => time()
		    	    ];
		    	    $img_info[] =$img_arr;
		    	    //图片信息插入数据库
		    	    $photo_id = Db::name('photo')->insertGetId($img_arr);
		    	    Db::name('art_photo')->insert(['art_id'=>$art_id,'photo_id'=>$photo_id]);
		    	    //重新命名文件名,让其为 img001、img002一直递增。
		    	    preg_match_all('/\d+/',$name,$arr);
		    	    $num = $arr[0][count($arr[0])-1];
		    	    $new_num = sprintf("%0".(strlen($num))."d",$num+1);
		    	    $name = 'img'.$new_num;
		    	}
	    	}
	    	Db::commit();
	    	return true;
    	} catch(\Exception $e){
    		if( isset($img_info) && !empty($img_info) ){
    			foreach($img_info as $value){
    				$un_src = $value['src'].'/'.$value['name'];
    				unlink($un_src);
    			}
    		}
    		Db::rollback();
    		return false;
    	}

    }

    public function article_det($id)
    {
    	$det = Db::name('article')->where('id',$id)->find();
    	$img = Db::name('art_photo ap')
    		->leftjoin('photo p','p.id = ap.photo_id')
    		->where('ap.art_id',$id)
    		->field('name,src,pos')
    		->select();
    	if(!empty($img)){
    		foreach($img as $key=>$value){
    			static $images = [];
    			$images[$value['pos']] = $value['src'].'/'.$value['name'];
    			$images[$value['pos']] = '/static/images/'.substr($images[$value['pos']],strpos($images[$value['pos']],'article'));
    		}
    		$det['images'] = $images;
    	}
    	return $det;
    }

    public function list($data)
    {
        $count = Db::name('article')->count();
    	$list = DB::name('article')->page($data['page'],$data['limit'])->select();
        $list['count'] = $count;
    	return $list;
    }

    public function del($id)
    {
    	Db::startTrans();
    	try{
    		Db::name('photo p')->leftjoin('art_photo ap','p.id = ap.photo_id')->where('ap.art_id',$id)->Update(['is_del'=>1]);
    		Db::name('article')->where('id',$id)->delete();
    		Db::name('art_photo')->where('art_id',$id)->delete();
    		Db::commit();
    		return true;
    	} catch(\Exception $e){

    		Db::rollback();
    		return false;
    	}
    }

}
