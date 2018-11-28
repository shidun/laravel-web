<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Zan;

class PostController extends Controller
{
    //搜索结果页
    public function search()
    {
        //验证
        $this->validate(request(), [
            'query' => 'required'
        ]);

        //逻辑
        $query = request('query');
        $posts = \App\Post::search($query)->paginate(2);

        //渲染
        return view('post/search', compact('posts', 'query'));
    }

    public function zan(Post $post)
    {
        $param = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id
        ];

        //firstOrCreate 查找是否有这条数据 有查找没有就创建
        Zan::firstOrCreate($param);
        return back();
    }

    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }

    public function comment(Post $post)
    {
        //验证
        $this->validate(request(), [
            'content' => 'required|min:3'
        ]);

        //逻辑
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);
        return redirect("/posts/{$post->id}");
    }

    public function imgUpload(Request $request)
    {
        $path = $request->file('yourFileName')->storePublicly(time());
        return json_encode(array(
            'errno' => 0,
            'data' => [asset('storage/'.$path)]
        ));
    }

    //列表页面
    public function index(\Psr\Log\LoggerInterface $log)//使用注入方式log使用log
    {
        // 使用容器使用log
        // $app = app();
        // $log = $app->make("log");
        // $log->info("post_index2", ['data' => '2222222']);
        
        \Log::info("post_index3", ['data' => '33333']);//使用门脸使用log

        $posts = Post::orderBy('created_at', 'desc')->withCount(['comments', 'zans'])->paginate(6);
        return view('post/index', compact('posts'));
    }

    //列表详情页
    public function show(Post $post)
    {
        $post->load('comments');
        return view('post/show', compact('post'));
    }

    //创建页面
    public function create()
    {
        return view('post/create');
    }

    //创建文章提交
    public function store(Request $request)
    {
        // dump and die
        // $param = $request->all();
        //创建的2种方式
        // $post = new Post();
        // $post->title= $param['title'];
        // $post->content= $param['content'];
        // $post->save();

        //下面2行效果一致
        // $params = ['title' => $param['title'], 'content' => $param['content']]

        //验证
        $this->validate($request, [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:5',
        ]);
        $user_id = \Auth::id();
        $params = array_merge(request(['title', 'content']), compact('user_id'));

        Post::create($params);
        return redirect('posts');
    }

    //编辑页面
    public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }

    //编辑页面提交
    public function update(Request $request, Post $post)
    {
        //验证
        $this->validate($request, [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:5',
        ]);

        //权限判断
        $this->authorize('update', $post);
        //逻辑

        $post->title = request('title');
        $post->content = request('content'); 
        $post->save();
        
        //渲染
        return redirect("/posts/{$post->id}");
    }

    //删除文章
    public function delete(Post $post)
    {
        //用户权限认证

        //权限判断
        $this->authorize('delete', $post);

        $post->delete();
        return redirect("posts");
    }
}
