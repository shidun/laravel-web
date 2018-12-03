<?php

namespace App;

use App\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    protected $rememberTokenName = '';

    protected $fillable = [
        'name', 'password',
    ];

    //用户有哪些角色
    public function roles()
    {
    	//多对多
    	return $this->belongsToMany(\App\AdminRole::class, 'admin_role_user', 'user_id', 'role_id')->withPivot(['user_id', 'role_id']);
    }

    //判断是否有某个角色，某些角色
    public function isInRoles($roles)
    {
    	return !!$roles->intersect($this->roles)->count();
    }

    //给用户分配角色
    public function assignRole($role)
    {
    	return $this->roles()->save($role);
    }

    //取消用户分配的角色
    public function deleteRole()
    {
    	return $this->roles()->detach($role);
    }

    //是否有权限
    public function hasPermission($permission)
    {
    	return $this->isInRoles($permission->roles);
    }
// }
}