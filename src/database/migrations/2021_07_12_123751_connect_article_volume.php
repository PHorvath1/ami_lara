<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectArticleVolume extends Migration
{
    public function up(): void
    {
        Schema::create('article_volumes', function (Blueprint $table) {
           $table->foreignIdFor(\App\Models\Article::class);
           $table->foreignIdFor(\App\Models\Volume::class);
           $table->integer('from_page')->default(0);
           $table->integer('to_page')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_volumes');
    }
}
