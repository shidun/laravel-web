<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
	//登录页面
    public function index()
    {
        if(\Auth::check()) {
            return redirect("/posts");
        }
    	return view('login.index');
    }

	//登录页面提交
    public function login(Request $request)
    {
    	//验证
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required',
    		'is_remember' => 'integer'
    	]);

    	//逻辑
    	$user = request(['email', 'password']);
    	$is_remember = boolval(request('is_remember'));
    	if (\Auth::attempt($user, $is_remember)) {
    		return redirect('/posts');
    	}
    	//渲染
    	return \Redirect::back()->withErrors('邮箱密码不匹配');
    }


    //退出登录
    public function logout()
    {
    	\Auth::logout();
    	return redirect('/login');
    }
}
