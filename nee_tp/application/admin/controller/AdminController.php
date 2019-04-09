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
        $a = ['1','2'];
        $a = array_flip($a);
        $aa = 0;
        if( isset($a[0]) ) return 1;
        return 'test';
    }



    public function home()
    {
        return 'admin_home';
    }

    public function article_list()
    {
        $data = Request::only(['page'=>1,'limit'=>10],'get');
        $list = $this->model->list($data);
        $this->assign('list',$list);
        return $this->fetch('../views/admin/article.html');

    }

    public function article_det()
    {
        $id = Request::param('id');
        // return $id;
        $det = $this->model->article_det($id);
        return $det;
    }

    public function article_edit()
    {
        $data = Request::param(true);
        $res = $this->model->art_edit($data);
        if($res){
            $imgaes = Db::name('photo')->where('is_del',1)->select();
            foreach($imgaes as $val){
                $file = $val['src'].'/'.$val['name'];
                if(is_file($file) ) unlink($file); 
            }
            Db::name('photo')->where('is_del',1)->delete();
            return ['error'=>'ok','content'=>'修改成功'];
        }else{
            return ['error'=>'400','content'=>'修改失败'];
        }
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
