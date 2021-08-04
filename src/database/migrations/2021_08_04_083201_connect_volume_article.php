<?php

use App\Models\Article;
use App\Models\Volume;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectVolumeArticle extends Migration
{
    public function up(): void
    {
        Schema::create('volume_article', function (Blueprint $table){
            $table->foreignIdFor(Volume::class);
            $table->foreignIdFor(Article::class);
            $table->integer('from_page')->default('0');
            $table->integer('to_page')->default('0');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volume_article');
    }
}
