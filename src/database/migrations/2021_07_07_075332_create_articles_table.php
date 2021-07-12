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
                $table->uuid('id')->primary();
                $table->string('name');
                $table->text('summary');
                $table->tinyInteger('state')->default(0); //[ 'UNDER_REVIEW', 'ACCEPTED', 'REJECTED' ]
                $table->integer('page_count');
                $table->string('article_type');
                $table->text('note');
                $table->json('related_url')->nullable();
                $table->string('language');
                $table->string('doi')->nullable();
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
