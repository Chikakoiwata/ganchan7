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
        Schema::create('detail_projects', function (Blueprint $table) {
            $table->id();
            $table->boolean('estimate_submitted')->nullable();  // チェックリストの項目1
            $table->boolean('po_received')->nullable();  // チェックリストの項目2
            $table->boolean('tax_checked')->nullable();  // チェックリストの項目1
            $table->boolean('danger_checked')->nullable();  // チェックリストの項目1
            $table->boolean('logi_arranged')->nullable();  // チェックリストの項目1
            $table->integer('estimate_no')->nullable();
            $table->integer('po_no')->nullable();
            $table->string('project_remarks')->nullable();
            $table->integer('project_id')->nullable(); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_projects');
    }
};
