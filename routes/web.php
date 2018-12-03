<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//用户模块
//注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
//注册提交
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
//登录页面
Route::get('/login', '\App\Http\Controllers\LoginController@index')->name('login');
//提交登录
Route::post('/login', '\App\Http\Controllers\LoginController@login');
//退出登录
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
	
Route::group(['middleware' => 'auth:web'], function(){
	//专题详情页
	Route::get('/topic/{topic}', '\App\Http\Controllers\TopicController@show');
	//投稿
	Route::post('/topic/{topic}/submit', '\App\Http\Controllers\TopicController@submit');

	//个人中心
	Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
	//关注
	Route::post('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
	//取消关注
	Route::post('/user/{user}/unfan', '\App\Http\Controllers\UserController@unfan');

	//个人设置页面
	Route::get('/users/setting', '\App\Http\Controllers\UserController@setting');
	//个人设置提交
    Route::post('/user/{user}/setting', '\App\Http\Controllers\UserController@settingStore');

	// Route::get('/', function () {
	//     return view('welcome');
	// });
	// 文章列表页
	Route::get('/', '\App\Http\Controllers\PostController@index');

	// Route::group(['prefix' => 'posts'], function() {
	// 	Route::put('/', '\App\Http\Controller\PostController@index');
	// 	Route::put('/{id}', '\App\Http\Controller\PostController@index');
	// });
	//文章搜索页
	Route::get('/posts/search', '\App\Http\Controllers\PostController@search');

	// 文章列表页
	Route::get('/posts', '\App\Http\Controllers\PostController@index');

	// 文章详情页
	Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');

	//创建文章
	Route::get('/post/create', '\App\Http\Controllers\PostController@create');
	//创建文件提交
	Route::post('/posts', '\App\Http\Controllers\PostController@store');
	//编辑文章
	Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');


	//更新文章
	Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
	//删除文章
	Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
	//圖片上傳
	Route::any('/posts/image/upload', '\App\Http\Controllers\PostController@imgUpload');

	//评论提交
	Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');

	//文章点赞
	Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');

	//文章取消点赞
	Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');

	//通知
	Route::get('/notices', '\App\Http\Controllers\NoticeController@index');
});

include_once('admin.php');
