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
        Schema::table('detail_projects', function (Blueprint $table) {
            $table->boolean('scope_checked')->nullable();
            $table->string('engineer_type')->nullable();            
            $table->string('scope')->nullable();
        });

       }   /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_projects', function (Blueprint $table) {
            //
        });
    }
};