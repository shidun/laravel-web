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

		Route::group(['middleware' => 'can:system'], function() {
			//管理人员模块
			Route::get('/users', '\App\Admin\Controllers\UserController@index');
			//创建用户
			Route::get('/users/create', '\App\Admin\Controllers\UserController@create');
			//创建用户提交
			Route::post('/users/store', '\App\Admin\Controllers\UserController@store');
			//用户角色
			Route::get('/users/{user}/role', '\App\Admin\Controllers\UserController@role');
			Route::post('/users/{user}/role', '\App\Admin\Controllers\UserController@storeRole');
			//权限
			Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
			Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
			Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
			//角色
			Route::get('/roles', '\App\Admin\Controllers\RoleController@index');
			Route::get('/roles/create', '\App\Admin\Controllers\RoleController@create');
			Route::post('/roles/store', '\App\Admin\Controllers\RoleController@store');
			Route::get('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission');
			Route::post('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@storePermission');
		});

		Route::group(['middleware' => 'can:post'], function() {
			//审核模块
			Route::get('/posts', '\App\Admin\Controllers\PostController@index');
			//审核
			Route::post('/posts/{post}/status', '\App\Admin\Controllers\PostController@status');
		});
		Route::group(['middleware' => 'can:topic'], function() {
			//专题模块
			Route::resource('topics', '\App\Admin\Controllers\TopicController', ['only' => ['index', 'create', 'store', 'destroy']]);
		});

		Route::group(['middleware' => 'can:notice'], function() {
			//专题模块
			Route::resource('notices', '\App\Admin\Controllers\NoticeController', ['only' => ['index', 'create', 'store']]);
		});

	});
});