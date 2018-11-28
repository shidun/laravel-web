<?php

//管理后台
Route::group(['prefix' => 'admin'], function() {

	//登录展示页面
	Route::get('/login', '\App\Admin\Controllers\LoginController@index');
	//登录提交
	Route::post('/login', '\App\Admin\Controllers\LoginController@login');	
	//退出
	Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');

	Route::group(['middleware' => 'auth:admin'], function() {
		//后台首页
		Route::get('/home', '\App\Admin\Controllers\HomeController@index');
	});
});