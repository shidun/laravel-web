<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	//管理员列表页面
	public function index()
	{
		//withoutGlobalScope 把post里的全局scope取消
		$posts = Post::withoutGlobalScope('avaiable')->where('status', 0)->orderBy('created_at', 'desc')->paginate(4);
		return view('/admin/post/index', compact('posts'));
	}

	//管理员创建界面
	public function status(Post $post)
	{
		$this->validate(request(), [
			'status' => 'required|in:-1,1'
		]);

		$post->status = request('status');
		$post->save();
		return 'true';
	}
}