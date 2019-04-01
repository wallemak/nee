<?php

namespace app\admin\controller;

use think\Controller;
// use think\Request;
use think\facade\Request;
use pp\admin\model\Admin;
use think\DB;
use Cache;


class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Admin;
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch('../views/admin/index.html');
    }
    public function test()
    {
        $res = redis()->get('name');
        // dd($res);
        return 'admin_test';
    }

    public function home()
    {
        return 'admin_home';
    }

    public function article_list()
    {
        $list = DB::name('article')->select();
        
        $this->assign('list',$list);
        return $this->fetch('../views/admin/article.html');

    }

    public function article_det()
    {
        $id = Request::param('id');
        $det = DB::name('article')->where('id',$id)->find();
        return $det;
    }

    public function article_edit()
    {
        $data = Request::param(true);
        $res = $this->model->art_edit();
        
        // return $data;
    }

}
