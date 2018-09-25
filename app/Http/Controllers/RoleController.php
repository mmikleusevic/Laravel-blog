<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class RoleController extends Controller
{
	public function adminShow()
	{
		$users = User::all();

		return view('roles/admin.index', compact('users'));
	}
	public function userShow()
	{
		return view('roles/user.index');
	}
	public function store(User $user)
	{
		$user->assignRole(request('role'));
		return back();

	}
}
