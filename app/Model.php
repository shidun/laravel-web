<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

// 默认对应表 => posts
class Model extends BaseModel
{
	protected $guarded = []; //不可以注入的字段 为空所有字段都可以注入
}
