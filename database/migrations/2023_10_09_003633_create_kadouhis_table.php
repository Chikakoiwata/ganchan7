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
        Schema::create('kadouhis', function (Blueprint $table) {
            $table->id();
            $table->integer('total_traveling_days');
            $table->integer('total_working_days');
            $table->integer('total_holidays');
            $table->integer('total_overtime_rate');
            $table->integer('total_extra_charge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kadouhis');
    }
};
