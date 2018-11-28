<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
	//注册页面
    public function index()
    {
    	return view('register.index');
    }

	//注册页面提交
    public function register(Request $request)
    {
    	//验证
    	$this->validate($request, [
    		'name' => 'required|min:3|max:30|unique:users,name',
    		'email' => 'required|unique:users,email|email',
    		'password' => 'required|min:3|max:20|confirmed',
    	]);
    	//逻辑

    	$user = new User();
    	$user->name = Request('name');
    	$user->email = Request('email');
    	$user->password = bcrypt(Request('password'));
    	$user->save();
    	
    	//渲染,
    	return redirect('/login');
    }	

}
