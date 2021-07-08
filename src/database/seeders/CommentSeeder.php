<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Revision;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        Revision::all()->each(function (Revision $revision){
            /** @var Comment $comment */
            $comment = Comment::factory()->make();
            $comment->user_id = User::random()->id;
            $comment->revision_id = $revision->id;
            $comment->save();
        });
    }
}
