<?php

namespace app\admin\controller;

use think\Controller;
use think\facade\Request;
use Cache;
use think\DB;

class Classify extends Controller
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $list = Db::name('classify')->select();
        $this->assign([
            'list' => $list,
        ]);
        return $this->fetch('../views/admin/classify.html');
    }

    public function add()
    {
        $data = Request::only('name','post');
        $res = Db::name('calssify')->Update($data);
        if($res){
            return ['error'=>'ok','content'=>'添加成功'];
        }else{
            return ['error'=>'400','content'=>'添加失败'];
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
            return ['error'=>'400','content'=>'修改失败'];
        }
    }
}
