<?php

namespace app\home\controller;

use think\Controller;
// use think\Request;
use think\facade\Request;
use app\home\model\Nav;
use think\DB;
use Cache;
use think\Validate;

class NavController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }



    public function nav_edit()
    {

    }

    public function nav_add()
    {

    }

    public function all_nav()
    {
        return jsonp(Db::name('classify')->field('name')->select());
    }
}
