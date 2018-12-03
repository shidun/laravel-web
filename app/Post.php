<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

// 默认对应表 => posts
class Post extends Model
{
	use Searchable;

    //指定表
    // protected $table = 'post';

	// protected $guarded = []; //不可以注入的字段 为空所有字段都可以注入

	// protected $fillable = ['title', 'content']; //可以注入数据字段
	
	//定义索引里面的type
	public function searchableAs()
	{
		return "post";
	}

	//定义索引有哪些字段
	public function toSearchableArray()
	{
		return [
			'title' => $this->title,
			'content' => $this->content
		];
	}

	//关联用户
	public function user()
	{
		return $this->belongsTo(\App\User::class, 'user_id', 'id'); //第二个参数是post的外键对应的第三个
	}

	//评论模型  一对多
	public function comments()
	{
		return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
	}

	//点赞关联  一对一
	public function zan($user_id)
	{
		return $this->hasOne('App\Zan')->where('user_id', $user_id);
	}

	//文章所有赞
	public function zans()
	{
		return $this->hasMany('App\Zan');
	}

	//属于某个作者的文章
	public function scopeAuthorBy(Builder $query, $user_id)
	{
		return $query->where('user_id', $user_id);
	}

	//这个文章对应的专题
	public function postTopic()
	{
		return $this->hasMany(\App\PostTopic::class, 'post_id', 'id');
	}

	//不属于某个专题的文章
	public function scopeTopicNotBy(Builder $query, $topic_id)
	{
		return $query->doesntHave('postTopic', 'and', function($q) use($topic_id) {
			$q->where('topic_id', $topic_id);
		});
	}

	// 全局scope的方式
	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('avaiable', function(Builder $builder) {
			$builder->whereIn('status', [0, 1]);
		});
	}
}
