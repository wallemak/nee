<?php

namespace app\admin\controller;

use think\Controller;
// use think\Request;
use think\facade\Request;
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
        // $files = Request::file('imags');
        // print_r($data);
        // foreach($files as $file){
        //     $info = $file->move( '../upload');
        // }

        foreach($data as $key=>$value){
            if($value != 'content'){
                $file = $value;
                // print_r($file);
                // $file->move( '../upload');

            }
        }
        

        // return $info->getFilename();
        return $data;
    }
}
