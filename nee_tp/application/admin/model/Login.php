<?php

namespace app\admin\model;

use think\Model;
use think\DB;

class Login extends Model
{
    //

    public function login($data)
    {
        static $user;
    	$data['password'] = md5($data['password']);
    	$arr = [
    		'user'=>$data['username'],
    		'password' =>$data['password'],
    	];
    	$admin = DB::name('admin')->where($arr)->find();
        if($admin){
            $user = $admin['user'];
            $key = base64_encode(uniqid(md5(microtime(true)),true));
            $ip = $this->getIp();
            redis()->ser($user,$ip);
            redis()->ser($ip,$key);
        
        }

    	return $admin;
    	
    }

    public function getIp()
    {
        if(isset($_SERVER)){    
            if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
                    $realip = $_SERVER['HTTP_CLIENT_IP'];
                }else{
                    $realip = $_SERVER['REMOTE_ADDR'];
                }
        }else{
            if(getenv("HTTP_X_FORWARDED_FOR")){
                  $realip = getenv( "HTTP_X_FORWARDED_FOR");
                }elseif(getenv("HTTP_CLIENT_IP")) {
                  $realip = getenv("HTTP_CLIENT_IP");
                }else{
                  $realip = getenv("REMOTE_ADDR");
                }
        }
        return $realip;
    }

    
}
