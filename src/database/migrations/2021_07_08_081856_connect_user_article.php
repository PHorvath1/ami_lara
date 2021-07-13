<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectUserArticle extends Migration
{
    public function up(): void
    {
        Schema::create('user_articles', function (Blueprint $table){
           $table->foreignIdFor(User::class);
           $table->foreignIdFor(Article::class);
           $table->string('contribution_type')->default('author');
        });
    }

    public function down(): void
    {
        \Schema::dropIfExists('user_articles');
    }
}
