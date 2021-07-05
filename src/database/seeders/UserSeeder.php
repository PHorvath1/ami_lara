<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory([
            'name' => 'Site Admin',
            'email' => 'admin@test.com',
         ])->create();
        User::factory(50)->create();
    }
}
