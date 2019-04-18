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
        return $this->fetch('../views/admin/login.html');
    }


    public function login()
    {
        $data = Request::only(['username','password'],'post');
        // $data = Request::only(['username','password']);
        $info = Request::header();
        // return $info;
        $data['password'] = openssl()->authcode($data['password'],'D');
        if($data['password'] == '证书错误'){
            return ['error'=>401,'content'=>'证书错误'];
        }
        $res = $this->model->login($data);
        return $res;
    }

    public function logout()
    {
     
    }
}
