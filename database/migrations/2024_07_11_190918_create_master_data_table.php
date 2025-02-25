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
        Schema::create('master_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stateId');
            $table->foreignId('constituencyId');
            $table->foreignId('mandalId');
            $table->foreignId('disttId');
            $table->foreignId('villageId');
            $table->foreignId('depttId');
            $table->foreignId('compId');
            $table->foreignId('casteID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_data');
    }
};
