<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BouncerAdminController extends Controller
{
    public function assignRole(BouncerAssignRoleRequest $request){
        return User::find($validated['user_id'])?->assign($validated['role_name']);
    }
}
