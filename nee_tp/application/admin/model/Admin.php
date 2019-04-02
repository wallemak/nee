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
    	
    	if(isset($data['images'])){

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
	    		// $info->setUploadInfo($info);
	    	    $info->move($src,$name);
	
	    	    $img_arr = [
	    	        'name' => $name.'.png',
	    	        'pos' => 'art_img'.$pos,
	    	        'src' => $src,
	    	        'create_time' => time()
	    	    ];
	    	    $img_info[$name] =$img_arr;
	    	    
	    	    DB::name('photo')->insert($img_arr);
	    	    $name++;

	    	}
	    	
    	}
    	$article = [
    		'title' =>1,
    		'content'=>$data['content'],
    		'class_id'=>1,
    		'create_time'=>time()

    	];
    	DB::name('article')->insert($article);

    	// return $img_info;
    }
}
