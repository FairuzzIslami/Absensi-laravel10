<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kehadiran_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kehadiran_id');
            $table->string('nama');
            $table->integer('nis');
            $table->string('tanda_tangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadiran_details');
    }
};
