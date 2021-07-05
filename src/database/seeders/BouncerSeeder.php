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
        $admin = User::where('email', 'LIKE', 'admin@test.com')->first();
        $admin->assign('superuser');
    }
}
