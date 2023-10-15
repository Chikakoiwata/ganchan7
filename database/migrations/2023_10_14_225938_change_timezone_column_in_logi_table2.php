<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('logis', function (Blueprint $table) {
            $table->string('start_timezone')->nullable()->change();  // カラム名がstart_timezoneだと仮定
            $table->string('end_timezone')->nullable()->change();  // カラム名がstart_timezoneだと仮定
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logi_table2', function (Blueprint $table) {
            //
        });
    }
};
