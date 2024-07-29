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
        Schema::create('public_works', function (Blueprint $table) {
            $table->id();
            $table->string('dateSanction');
            $table->string('dateStart');
            $table->string('amountBudgeted');
            $table->string('location');
            $table->string('village');
            $table->string('typeOfWork');
            $table->string('completion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_works');
    }
};
