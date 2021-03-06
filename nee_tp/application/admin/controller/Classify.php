<?php

namespace app\admin\controller;

use think\Controller;
use think\facade\Request;
use Cache;
use think\DB;
use think\Validate;

class Classify extends Controller
{
    //
    public function __construct()
    {
        parent::__construct();
        // $this->rule = [
        //     'name'=>'require'
        // ];
    }

    public function index()
    {
        return $this->fetch('../views/admin/classify.html');
    }

    public function list()
    {
        $data = Request::only(['page'=>1,'limit'=>5],'get');
        $count = Db::name('classify')->count();
        $list = Db::name('classify')->page($data['page'],$data['limit'])->select();
        $json = json_decode('{}');
        $json->count = $count;
        $json->list = $list;
        return $json;
    }

    public function add()
    {
        $data = Request::only('name','post');

        $rule = ['name'=>'require|unique:classify'];
        $messages = ['name.require'=>'名称不能为空','name.unique'=>'分类名称已存在,不能重复添加'];
        $validate = Validate::make($rule,$messages);
        $res = $validate->check($data);
        if(!$res) return ['error'=>'ok','content'=>$validate->getError()];

        $data['create_time'] = time();
        $res = Db::name('classify')->Insert($data);
        if($res){
            return ['error'=>'ok','content'=>'添加成功'];
        }else{
            return ['error'=>400,'content'=>'添加失败'];
        }
    }

    public function edit()
    {
        $data = Request::only(['id','name'],'post');
        $data['update_time'] = time();
        $res = DB::name('classify')->where('id',$data['id'])->Update($data);
        if($res){
            return ['error'=>'ok','content'=>'修改成功'];
        }else{
            return ['error'=>400,'content'=>'修改失败'];
        }
    }

    public function del()
    {
        $id = Request::param('id');
        $con = Db::name('article')->where('class_id',$id)->count();
        if($con !=0) return ['error'=>400,'content'=>'该分类下有文章,不能删除'];
        Db::name('classify')->where('id',$id)->delete();
        return ['error'=>'ok','content'=>'删除成功'];
    }
}
