<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BouncerController extends Controller
{
    /**
     * Assigns a role to a user
     * @param User $user
     * @param string $role
     * @return Application|Factory|View The user's profile view after the assignment
     */
    public function assign_role(User $user, string $role) {
        $user->assign($role);
        $user->save();
        return view('pages.users.show', [$user]);
    }

    /**
     * Retracts a role from a user
     * @param User $user
     * @param string $role
     * @return Application|Factory|View The user's profile view after the retraction
     */
    public function unassign_role(User $user, string $role) {
        $user->retract($role);
        $user->save();
        return view('pages.users.show', [$user]);
    }
}
