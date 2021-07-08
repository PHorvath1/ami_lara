<?php

use App\Models\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectArticleRevision extends Migration
{
    public function up(): void
    {
        Schema::table('revisions', function (Blueprint $table){
            $table->foreignIdFor(Article::class);
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('revisions') && Schema::hasColumn('revisions', 'article_id')) {
            Schema::dropColumns('revisions', ['article_id']);
        }
    }
}
