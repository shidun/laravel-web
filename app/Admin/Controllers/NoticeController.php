<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
	//通知列表页面
	public function index()
	{
		$notices = Notice::all();
		return view('/admin/notice/index', compact('notices'));
	}

	public function create()
	{
		return view('/admin/notice/create');
	}

	public function store()
	{
		$this->validate(request(), [
			'title' => 'required',
			'content' => 'required',

		]);

		$notice = Notice::create(request(['title', 'content']));

		//创建发送通知任务
		dispatch(new \App\Jobs\SendMessage($notice));
		return redirect('/admin/notices');
	}
}