<?php

namespace app\admin\controller;

use think\Controller;
// use think\Request;
use think\facade\Request;
use app\admin\model\Login;
use think\DB;

class LoginController extends Controller
{
    // protected $middleware = ['Check'];

    public function __construct()
    {
        parent::__construct();
        $this->model = new Login;
        // $this->request = new Request;
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        // return 'login_index';
        return $this->fetch('../views/admin/login.html');
    }


    public function login()
    {
        $data = Request::only(['username','password']);
        return $data;
        $info = Request::header();
        // return $info;

        $data['password'] = openssl()->authcode($data['password'],'D');
        if($data['password'] == '证书错误'){
            return ['error'=>401,'content'=>'证书错误'];
        }
        $res = $this->model->login($data);
        // if(is_null($res)){
        //     return ['error'=>403,'content'=>'账号或密码错误'];
        // }else{
        //     return ['content'=>'登录成功'];
        // }
        return $res;
    }

    public function logout()
    {
     
    }
}
