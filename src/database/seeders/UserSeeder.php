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
        User::factory([
                          'name' => 'Test Editor',
                          'email' => 'editor@test.com',
                      ])->create();
        User::factory([
                          'name' => 'Test Technical Editor',
                          'email' => 'technical@test.com',
                      ])->create();
        User::factory(50)->create();
    }
}
