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
            $table->uuid('editor_id')->nullable()->default(null);
            $table->string('title');
            $table->text('abstract');
            $table->tinyInteger('state');
            $table->integer('page_count')->nullable()->default(null);
            $table->text('note')->nullable()->default(null);
            $table->string('language')->default('en');
            $table->string('doi')->nullable()->default(null);
            $table->text('source')->nullable()->default(null);
            $table->id('type_id');
            $table->string('latex_path')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
