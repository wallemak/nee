<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// Route::get('think', function () {
//     return 'hello,ThinkPHP5!';
// });

// Route::get('hello/:name', 'index/hello');


Route::group('admin',function(){
	Route::get('/','admin/AdminController/index');
	Route::get('home','admin/AdminController/home');
	//article
	Route::get('article_list','admin/AdminController/article_list');
	Route::post('article_det','admin/AdminController/article_det');
	Route::post('article_edit','admin/AdminController/article_edit');
	Route::post('article_add','admin/AdminController/article_add');
	Route::post('article_del','admin/AdminController/article_del');
	//classify
	Route::get('classify_list','admin/Classify/list');
	Route::post('classify_edit','admin/Classify/edit');
	Route::post('classify_add','admin/Classify/add');
	Route::post('classify_del','admin/Classify/del');


} )->middleware('Login');
Route::group('blog',function(){
	Route::get('/','home/IndexController/index');
	// Route::get('article_list','home/')
});
Route::post('login','admin/LoginController/login');
Route::get('test', 'admin/AdminController/test');
