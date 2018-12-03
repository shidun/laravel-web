<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use App\AdminRole;
use App\AdminPermission;

class PermissionController extends Controller
{
	//权限列表页面
	public function index()
	{
		$permissions = AdminPermission::paginate(10);
		return view('/admin/permission/index', compact('permissions'));
	}

	//创建权限页面
	public function create()
	{
		return view('/admin/permission/add');
	}

	//保存权限
	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required',
		]);

		AdminPermission::create(request(['name', 'description']));
		return redirect('/admin/permissions');
	}
}