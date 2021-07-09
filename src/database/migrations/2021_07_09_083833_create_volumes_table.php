<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolumesTable extends Migration
{
    public function up(): void
    {
        Schema::create('volumes', function (Blueprint $table) {
            $table->id();
            $table->year('release_year');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volumes');
    }
}
