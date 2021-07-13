<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectArticleTags extends Migration
{
    public function up(): void
    {
        Schema::create('article_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Article::class);
            $table->foreignIdFor(Tag::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_tags');
    }
}
