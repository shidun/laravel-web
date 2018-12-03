<?php

namespace App;

use App\Model;

class AdminRole extends Model
{
    protected $table = 'admin_roles';

    //当前角色所有权限
    public function permissions()
    {
    	return $this->belongsToMany(\App\AdminPermission::class, 'admin_permission_role', 'permission_id', 'role_id')->withPivot(['permission_id', 'role_id']);
    }

    //给角色赋予权限
    public function grantPermission($permisson)
    {
    	return $this->permissions()->save($permisson);
    }

    //取消角色赋予权限
    public function deletePermission($permission)
    {
    	return $this->permissions()->detach($permission);
    }

    //判读角色是否有权限
    public function hasPermission($permission)
    {
    	return $this->permission->contains($permission);
    }
}
