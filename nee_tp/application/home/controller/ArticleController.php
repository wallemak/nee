<?php

namespace app\home\controller;

use think\Controller;
use think\DB;
use Cache;
use think\Validate;
use think\facade\Request;

class ArticleController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function list()
	{
		return Db::name('artcile')->select();
	}
}
