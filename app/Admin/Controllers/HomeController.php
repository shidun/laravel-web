<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	//展示首页页面
	public function index()
	{
		return view('admin.home.index');
	}
}