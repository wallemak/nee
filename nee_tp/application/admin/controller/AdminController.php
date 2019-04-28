<?php

namespace app\admin\controller;

use think\Controller;
// use think\Request;
use think\facade\Request;
use app\admin\model\Admin;
use think\DB;
use Cache;
use think\Validate;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Admin();
        $this->rule = ['class_id'=>'require','title'=>'require'];
        $this->massage = ['class_id.require'=>'分类不能为空','title.require'=>'标题不能为空'];
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
        // return 'test';
        dd(Request::url());
        // redis()->set('aaa','123',10086);
        // $aaa = redis()->get('123');
        // redis()->rm('aaa');
    }



    public function home()
    {
        return 'admin_home';
    }

    public function article_index()
    {
        return $this->fetch('../views/admin/article.html');
    }

    public function article_list()
    {
        $data = Request::only(['page'=>1,'limit'=>5],'get');
        $list = $this->model->list($data);
        $class_list = Db::name('classify')->field('id,name')->select();
        $json = json_decode('{}');
        $json->count = $list['count'];
        unset($list['count']);
        $json->list = $list;
        $json->class_list = $class_list;

        return $json;

    }

    public function article_det()
    {
        $id = Request::param('id');

        $det = $this->model->article_det($id);
        // dd($det);
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

    public function article_del()
    {
        $id = Request::param('id');
        $res = $this->model->del($id);
        if($res){
            $imgaes = Db::name('photo')->where('is_del',1)->select();
            foreach($imgaes as $val){
                $file = $val['src'].'/'.$val['name'];
                if(is_file($file) ) unlink($file);
                $path =  $val['src'];
                if( is_dir($path) && count( scandir($path) ) == 2 ) rmdir($path);
            }
            Db::name('photo')->where('is_del',1)->delete();
            return ['error'=>'ok','content'=>'删除成功'];
        }else{
            return ['error'=>'400','content'=>'删除失败'];
        }
    }

}
