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
        Schema::table('detail_projects', function (Blueprint $table) {
            $table->string('estimate_no')->nullable()->change();
            $table->string('po_no')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('detail_projects', function (Blueprint $table) {
            $table->integer('estimate_no')->nullable(false)->change();
            $table->integer('po_no')->nullable(false)->change();

        });
    }
    
    
};
