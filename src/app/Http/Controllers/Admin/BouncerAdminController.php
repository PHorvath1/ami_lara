<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BouncerAssignAbilityRequest;
use App\Http\Requests\Admin\BouncerAssignRoleRequest;
use App\Models\User;
use Silber\Bouncer\Database\Role;

class BouncerAdminController extends Controller
{
    public function assignRole(BouncerAssignRoleRequest $request){
        return User::find($request->validated()['user_id'])?->assign($request->validated()['role_name']);
    }

    public function unAssignRole(BouncerAssignRoleRequest $request){
        return User::find($request->validated()['user_id'])?->unassign($request->validated()['role_name']);
    }

    public function assignAbility(BouncerAssignAbilityRequest $request){
        return Role::where('name', $request->validated()['role_name'])->first()->allow($request->validated()['ability_name'], '\App\Models' . $request->validated()['entity']);
    }

     public function unassignAbility(BouncerAssignAbilityRequest $request){
         return Role::where('name', $request->validated()['role_name'])->first()->disallow($request->validated()['ability_name'], '\App\Models' . $request->validated()['entity']);
     }
}
