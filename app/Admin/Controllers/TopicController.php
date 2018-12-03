<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
	//专题列表页面
	public function index()
	{
		$topics = Topic::all();
		return view('/admin/topic/index', compact('topics'));
	}

	public function create()
	{
		return view('/admin/topic/create');
	}

	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
		]);

		Topic::create(['name' => request('name')]);
		return redirect('/admin/topics');
	}

	public function destroy(Topic $topic)
	{
		$topic->delete();
		return 'true';
	}

}