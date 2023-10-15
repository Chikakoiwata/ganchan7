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
        Schema::create('logis', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable(); 
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->date('start_day')->nullable();
            $table->date('end_day')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->time('start_timezone')->nullable();
            $table->time('end_timezone')->nullable();
            $table->string('pic')->nullable();
            $table->string('logi_remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logis');
    }
};
