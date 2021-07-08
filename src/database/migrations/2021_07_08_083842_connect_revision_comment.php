<?php

use App\Models\Revision;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectRevisionComment extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table){
            $table->foreignIdFor(Revision::class);
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('comments') && Schema::hasColumn('comments', 'revision_id')) {
            Schema::dropColumns('comments', ['revision_id']);
        }
    }
}
