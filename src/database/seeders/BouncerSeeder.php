<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utils\Bouncer;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    public function run(): void
    {
        Bouncer::allow('superuser')->everything();

        /** @var User $admin */
        $admin = User::where('email', 'admin@test.com')->first();
        $admin->assign('superuser');

        $admin = User::where('email', 'editor@test.com')->first();
        $admin->assign('editor');

        $admin = User::where('email', 'tech@test.com')->first();
        $admin->assign('technical-editor');
    }
}
