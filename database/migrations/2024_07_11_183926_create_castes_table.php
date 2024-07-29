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
        Schema::create('castes', function (Blueprint $table) {
            $table->bigIncrements('castId');
            $table->string('castName');
            $table->string('SC')->nullable();
            $table->string('ST')->nullable();
            $table->string('OBC')->nullable();
            $table->string('Gen')->nullable();
            $table->string('Religion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('castes');
    }
};
