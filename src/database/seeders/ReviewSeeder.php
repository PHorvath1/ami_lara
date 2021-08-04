<?php

namespace Database\Seeders;

use App\Models\Revision;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function (User $user) {
            $revisions = Revision::sample(random_int(1, 10));
            foreach ($revisions as $revision) {
                $user->reviews()->attach($revision->id);
            }
            $user->save();
        });
    }
}
