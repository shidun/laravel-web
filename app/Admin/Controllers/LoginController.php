<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
	//登录展示页面
	public function index()
	{
		return view('admin.login.index');
	}

	//登录提交
	public function login(Request $request)
	{
    	//验证
    	$this->validate($request, [
    		'name' => 'required',
    		'password' => 'required',
    	]);

    	//逻辑
    	$user = request(['name', 'password']);
    	if (\Auth::guard('admin')->attempt($user)) {
    		return redirect('/admin/home');
    	}
    	//渲染
    	return \Redirect::back()->withErrors('账号密码不匹配');
	}

	//退出
	public function logout()
	{
    	\Auth::guard('admin')->logout();
    	return redirect('/admin/login');
	}
}