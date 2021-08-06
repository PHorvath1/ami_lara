<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            $table->text('note');
            $table->string('pdf_path');
            $table->string('article_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('revisions');
    }
}
