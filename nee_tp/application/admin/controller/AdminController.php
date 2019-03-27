<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\DB;
use Cache;


class AdminController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
        // return $list;
        // return 123456;
        $this->assign('list',$list);
        return $this->fetch('../views/admin/article.html');

    }
}
