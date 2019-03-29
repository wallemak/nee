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
        // $data = Request::param('data');
        $data = Request::param(true);
        // $files = Request::file('imgs');
        // // var_dump($files);
        // $imags = $data['imgs'];
        // foreach($imags as $key=>$value){
            
        //     $img_file = explode(',',$value['base64'])[1];
        //     $img_file = base64_decode($img_file);
        //     // $img_file->move('../upload');

        //     static $img_arr = [];
        //     $img_arr[$key] = [
        //         'pos' => $value->img_pos,
        //     ];
        // }

        // foreach($data['imgs'] as $file){
        //     // $info = $file->move( '../uploads');
        // }


        return $data;
    }

    // public function article_edit()
    // {
    //     $files = Request::file('image');
    //     $files->move( '../upload');
    // }
}
