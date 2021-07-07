<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up(): void
    {
        Schema::create('articles',
            function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
