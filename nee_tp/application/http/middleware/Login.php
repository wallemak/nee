<?php

namespace app\http\middleware;

use think\Controller;
use Cache;
use think\facade\Request;


class Login extends Controller
{
    public function handle($request, \Closure $next)
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
        // $r = Cache::store('redis')->get($realip);
        $header = Request::header();
        $r = redis()->get($realip);
        if(!$r || !isset($header['token']) || $r!=$header['token']){
            return $this->redirect('admin/loginController/index')->remember();
        }
        


    	return $next($request);
    }
}
