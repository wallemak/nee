<?php

namespace app\http\middleware;

use think\Controller;
use Cache;
use think\facade\Request;


class CheckToken extends Controller
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

        if( !array_key_exists('token',Request::header()) ){
        	
        }
    	return $next($request);
    }
}
