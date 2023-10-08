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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_country');
            $table->string('customer_industry');
            $table->string('customer_shareholder');
            $table->string('customer_sanction');
            $table->string('customer_equipment');
            $table->string('customer_production');
            $table->string('customer_financial');
            $table->string('customer_maintenance');
            $table->string('customer_address');
            $table->string('customer_access');
            $table->string('customer_remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
