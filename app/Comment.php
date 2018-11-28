<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Comment extends BaseModel
{
    //评论所属文章
    public function post()
    {
    	//一对多反向
    	return $this->belongsTo('App\Post');
    }

    //评论所属用户
    public function user()
    {
    	//一对多反向
    	return $this->belongsTo('App\User');
    }
}
