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
    	
    }

    public function art_add($data)
    {
    	Db::startTrans();
    	try{
    		$article = [
    			'title' =>$data['title'],
    			'content'=>$data['content'],
    			'class_id'=>1,
    			'create_time'=>time()
    		];
    		$art_id = Db::name('article')->insertGetId($article);

	    	if(isset($data['images'])){
		    	$day = substr(date('Ymd'),2);
		    	$src = '../public/static/images/article/'.$day;
		    	$s_time = mktime(0,0,0,date('m'),date('d'),date('Y'));
		    	$e_time = mktime(23,59,59,date('m'),date('d'),date('Y'));
		    	$name_sql = Db::name('photo')
		    		->whereBetweenTime('create_time',$s_time,$e_time)
		    		->fieldRaw('name,MAX(create_time)')
		    		->find();
		    	$name = $name_sql['name'];
		    	if(!empty($name_sql['name'])){
		    		$name = $name_sql['name'];
		    	    $name=str_replace(strrchr($name, "."),"",$name);
		    	    preg_match_all('/\d+/',$name,$arr);
		    	    $num = $arr[0][count($arr[0])-1];
		    	    $new_num = sprintf("%0".(strlen($num))."d",$num+1);
		    	    $name = 'img'.$new_num;
		    	}else{
		    	    $name = 'img'.'001';
		    	}
		    	$aa = 1;
		    	foreach($data['images'] as $key=>$file){
		    		// $info->setUploadInfo($info);
		    		$pos = $key+1;
		    		if( in_array($pos,$data['img_pos']) == false) continue;
		    		static $img_info = [];
		    	    $info = $file->move($src,$name);
		    	    $img_arr = [
		    	        'name' => $info->getFilename(),
		    	        'pos' => $pos,
		    	        'src' => $src,
		    	        'create_time' => time()
		    	    ];
		    	    $img_info[$pos] =$img_arr;
		    	    //图片信息插入数据库
		    	    $photo_id = Db::name('photo')->insertGetId($img_arr);
		    	    Db::name('art_photo')->insert(['art_id'=>$art_id,'photo_id'=>$photo_id]);
		    	    //重新命名文件名,让其为 img001、img002一直递增。
		    	    preg_match_all('/\d+/',$name,$arr);
		    	    $num = $arr[0][count($arr[0])-1];
		    	    $new_num = sprintf("%0".(strlen($num))."d",$num+1);
		    	    $name = 'img'.$new_num;
		    	    $aa++;
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

    function article_det($id)
    {
    	$det = Db::name('article')->where('id',$id)->find();
    	$img = Db::name('art_photo ap')
    		->leftjoin('photo p','p.id','ap.photo_id')
    		->where('ap.art_id',$id)
    		->field('name,src,pos')
    		->select();
    	if(!empty($img)){
    		foreach($img as $key=>$value){
    			static $images = [];
    			$images[$value['pos']] = $value['src'].'/'.$value['name'];
    			$images[$value['pos']] = '__IMAGES__/'.substr($images[$value['pos']],strpos($images[$value['pos']],'article'));
    		}
    		$det['images'] = $images;
    	}
  
    	return $det;
    }
}
