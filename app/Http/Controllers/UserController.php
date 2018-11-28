<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //个人中心页面
    public function show(User $user)
    {
        //个人信息 包含关注 粉丝数
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);

        //这个人的文章列表, 取最新的前10条
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();

        //这个人关注的用户，含关注用户的 关注/粉丝/文章数
        $stars = $user->stars;
        $susers = User::whereIn('id', $stars->pluck('star_id'))->withCount(['stars', 'fans', 'posts'])->get();

        //这个人的粉丝用户，含粉丝用户的 关注/粉丝/文章数
        $fans = $user->fans;
        $fusers = User::whereIn('id', $fans->pluck('fan_id'))->withCount(['stars', 'fans', 'posts'])->get();

        return view('user.show', compact('user', 'posts', 'susers', 'fusers'));
    }

    //关注
    public function fan(User $user)
    {
        $current = \Auth::user();
        $current->doFan($user->id);
        return 'true';
    }

    //取消关注
    public function unfan(User $user)
    {
        $current = \Auth::user();
        $current->doUnFan($user->id);
        return 'true';
    }

    //个人设置页面
    public function setting()
    {
        $me = \Auth::user();
        return view('user/setting', compact('me'));
    }

    //个人设置页面提交
    // public function settingStore(Request $request)
    // {
    //     if ($request->isMethod('POST')) {
    //         // var_dump($_FILES);exit();
    //         $file = $request->file('source');
    //         $name = $request->get('name');
    //         //文件是否上传成功
    //         if ($file->isValid()) {

    //             //原文件名
    //             $originalName = $file->getClientOriginalName();
    //             //扩展名
    //             $ext = $file->getClientOriginalExtension();
    //             //MimeType
    //             $type = $file->getClientMimeType();
    //             //临时绝对路径
    //             $realPath = $file->getRealPath();
    //             $fileName = uniqid().'.'.$ext;
    //             $imgurl = 'upload/' . $fileName;
    //             $bool = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));
    //             $user = \Auth::user();
    //             $user->avatar = $imgurl;
    //             $user->name = $name;
    //             $user->save();
    //             return redirect('/users/setting');
    //         }
    //     }
    // }

    public function settingStore(Request $request, User $user)
    {
        $this->validate(request(),[
            'name' => 'min:3',
        ]);

        $name = request('name');
        if ($name != $user->name) {
            if(\App\User::where('name', $name)->count() > 0) {
                return back()->withErrors(array('message' => '用户名称已经被注册'));
            }
            $user->name = request('name');
        }
        if ($request->file('avatar')) {
            $path = $request->file('avatar')->storePublicly(md5(\Auth::id() . time()));
            $user->avatar = "/storage/". $path;
        }

        $user->save();
        return back();
    }
}
