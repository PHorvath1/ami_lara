<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('user_id')->default(null);
            $table->uuid('editor_id')->default(null);
            $table->string('title');
            $table->text('abstract');
            $table->tinyInteger('state');
            $table->integer('page_count')->default(null);
            $table->text('note')->default(null);
            $table->string('language')->default('en');
            $table->string('doi')->default(null);
            $table->text('source')->default(null);
            $table->id('type_id');
            $table->string('latex_path')->default(null);
            $table->timestamp('deleted_at')->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
