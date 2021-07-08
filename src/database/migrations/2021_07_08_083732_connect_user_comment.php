<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectUserComment extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table){
            $table->foreignIdFor(User::class);
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('comments') && Schema::hasColumn('comments', 'user_id')) {
            Schema::dropColumns('comments', ['user_id']);
        }
    }
}
