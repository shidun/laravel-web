<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use App\AdminRole;
use App\AdminPermission;

class RoleController extends Controller
{
	//角色列表
	public function index()
	{
		$roles = AdminRole::paginate(10);
		return view('admin.role.index', compact('roles'));
	}

	//创建角色页面
	public function create()
	{
		return view('admin.role.add');
	}

	//角色保存
	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required'
		]);

		AdminRole::create(request(['name', 'description']));
		return redirect('/admin/roles');
	}

	//角色和权限的关系页面
	public function permission(AdminRole $role)
	{
		// 获取所有权限
		$permissions = AdminPermission::all();

		//获取当前角色权限
		$myPermission = $role->permissions;
		// var_dump($myPermission);exit();
		return view('admin.role.permission', compact('permissions', 'myPermission', 'role'));
	}

	//储存角色权限
	public function storePermission(AdminRole $role)
	{
		$this->validate(request(), [
			'permissions' => 'required|array',
		]);

		$permissions = AdminPermission::findMany(request('permissions'));
		$myPermissions = $role->permissions;

		// 对已经有的权限
		if (empty($myPermissions)) {
			$addPermissions = $permissions;
		} else {
			$addPermissions = $permissions->diff($myPermissions);
		}
		foreach ($addPermissions as $permission) {
			$role->grantPermission($permission);
		}

		if (!empty($myPermissions)) {
			$deletePermission = $myPermissions->diff($permissions);
			foreach ($deletePermission as $permission) {
				$role->deletePermission($permission);
			}
		}

		return redirect('/admin/roles');
	}
}