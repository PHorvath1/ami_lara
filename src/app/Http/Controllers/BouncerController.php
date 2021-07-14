<?php


namespace App\Http\Controllers;


use App\Models\User;

class BouncerController extends Controller
{

    public function assignRole(User $user, string $role) {
        $user->assign($role);
        $user->save();
        return view('pages.users.show', [$user]);
    }

    public function unassignRole(User $user, string $role) {
        $user->retract($role);
        $user->save();
        return view('pages.users.show', [$user]);
    }
}
