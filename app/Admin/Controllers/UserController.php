<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use App\AdminRole;

class UserController extends Controller
{
	//管理员列表页面
	public function index()
	{
		$users = AdminUser::paginate(2);
		return view('/admin/user/index', compact('users'));
	}

	//管理员创建界面
	public function create()
	{
		return view('/admin/user/create');
	}

	//创建提交
	public function store()
	{
		//验证
		$this->validate(request(), [
			'name' => 'required|min:2',
			'password' => 'required'
		]);

		//逻辑
		$name = request('name');
		$password = bcrypt(request('password'));
		AdminUser::create(compact('name', 'password'));
		return redirect('/admin/users');
	}

	//用户角色页面
	public function role(AdminUser $user)
	{
		$roles = AdminRole::all();
		$myRoles = $user->roles;
		// var_dump($myRoles->toArray());exit();
		return view('/admin/user/role', compact('roles', 'myRoles', 'user'));
	}

	//保存用户角色
	public function storeRole(AdminUser $user)
	{
		$this->validate(request(), [
			'roles' => 'required|array'
		]);

		$roles = \App\AdminRole::findMany(request('roles'));
		$myRoles = $user->roles;

		//要增加的
		if (empty($myRoles)) {
			$addRoles = $roles;
		} else {
			$addRoles = $roles->diff($myRoles);
		}
		foreach ($addRoles as $role) {
			$user->assignRole($role);
		}

		//要删除的
		if (!empty($myRoles)) {
			$deleteRoles = $myRoles->diff($roles);
			foreach ($deleteRoles as $role) {
				$user->deleteRole($role);
			}
		}

		return redirect('/admin/users');
	}
}