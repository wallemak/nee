<?php

namespace app\admin\model;

use think\Model;
use think\DB;
use Cache;
use thinl\File;

class Admin extends Model
{
    //
    public function art_edit($data)
    {
    	$id = $data['id'];
    	$day = substr(date('Ymd'),2);
    	$src = '../public/static/images/article/'.$day;
    	$name = DB::name('photo')->value('name');
    	if($name){
    	    $name=str_replace(strrchr($name, "."),"",$name);
    	    preg_match('/\d+/',$name,$arr);
    	    $name = 'img'.$arr[0]+1;
    	}else{
    	    $name = 'img'.'001';
    	}
    	foreach($data['images'] as $pos=>$info){
    	    $info->move($src,$name);
    	    $img_arr = [
    	        'name' => $info->getFilename(),
    	        'pos' => 'art_img'.$pos,
    	        'src' => $src,
    	        'create_time' => time()
    	    ];
    	    DB::name('photo')->insert($img_arr);
    	    $name++;
    	}
    	// DB::anme('article')->where('id',)->update($article);
    	// return ... 
    }

    public function art_add($data)
    {
    	DB::startTrans();
    	try{
    		$err = ['error'=>true,'SQL'=>'','file_error'=>''];
	    	if(isset($data['images'])){
		    	$day = substr(date('Ymd'),2);
		    	$src = '../public/static/images/article/'.$day;
		    	$s_time = mktime(0,0,0,date('m'),date('d'),date('Y'));
		    	$e_time = mktime(23,59,59,date('m'),date('d'),date('Y'));
		    	$name = DB::name('photo')->whereBetweenTime('create_time',$s_time,$e_time)->value('name');
		    	if($name){
		    	    $name=str_replace(strrchr($name, "."),"",$name);
		    	    preg_match('/\d+/',$name,$arr);
		    	    $name = 'img'.$arr[0];
		    	    $name++;
		    	}else{
		    	    $name = 'img'.'001';
		    	}
		    	foreach($data['images'] as $pos=>$file){
		    		// $info->setUploadInfo($info);
		    		static $img_info = [];
		    	    $info = $file->move($src,$name);
		    	    if(!$info) $err['file_error'] = $info->getError();
		    	    $img_arr = [
		    	        'name' => $info->getFilename(),
		    	        'pos' => $pos,
		    	        'src' => $src,
		    	        'create_time' => time()
		    	    ];
		    	    $img_info[$pos] =$img_arr;
		    	    DB::name('photo')->insert($img_arr);
		    	    $name++;
		    	}
	    	}
	    	$article = [
	    		// 'title' =>$data['title'],
	    		'title' =>1,
	    		'content'=>$data['content'],
	    		'class_id'=>1,
	    		'create_time'=>time()

	    	];
	    	DB::name('article')->insert($article);
	    	DB::commit();
	    	$err['SQL'] = $info->getError();
	    	return $err;
    	} catch(\Exception $e){
    		if( isset($img_info) && !empty($img_info) ){
    			foreach($img_info as $value){
    				$un_src = $value['src'].'/'.$value['name'];
    				unlink($un_src);
    			}
    		}
    		$err['SQL'] = Db::getLastSql();
    		if( !empty($err['file_error']) ){
    			$err['error'] = '文件上传错误';
    		}else{
    			$err['error'] = 'SQL错误';
    			
    		}
    		DB::rollback();
    		return $err;
    	}

    }
}
