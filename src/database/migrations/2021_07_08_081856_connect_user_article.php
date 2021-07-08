<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectUserArticle extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table){
           $table->foreignIdFor(User::class);
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('articles') && Schema::hasColumn('articles', 'user_id')) {
            Schema::dropColumns('articles', ['user_id']);
        }
    }
}
