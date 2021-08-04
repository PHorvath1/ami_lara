<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectArticleCategories extends Migration
{
    public function up(): void
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->foreignIdFor(Article::class);
            $table->foreignIdFor(Category::class);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_category');
    }
}
