<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('kadouhis', function (Blueprint $table) {
            $table->integer('project_id'); // 新しいカラムの追加
        });
    }
    
    
};
