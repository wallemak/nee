<?php

namespace app\admin\controller;

use think\Controller;
// use think\Request;
use think\facade\Request;
use app\admin\model\Admin;
use think\DB;
use Cache;


class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Admin();
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
        $data = DB::name('article')->where('id',3)->find();
        $content = $data['content'];
        $this->srt_cut($content);

    }

    public function srt_cut($srt,$start=0)
    {
        $pos = strpos($srt,'src="')+5;
        $s = substr($srt,0,$pos);
        dd($s);
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
        // var_dump($data);die;
        $res = $this->model->art_edit($data);

        // return $data;
    }

    public function article_add()
    {
        $data = Request::param(true);
        $res = $this->model->art_add($data);
        if($res){
            return ['error'=>'ok','content'=>'添加成功'];
        }else{
            return ['error'=>'400','content'=>'添加失败'];
        }
    }

}
