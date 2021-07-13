<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectArticleCategory extends Migration
{
    public function up(): void
    {
        Schema::create('article_category', function (Blueprint $table){
            $table->id();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Article::class);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article');
    }
}
