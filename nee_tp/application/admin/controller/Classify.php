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

    }

    public function edit()
    {
        
    }
}
