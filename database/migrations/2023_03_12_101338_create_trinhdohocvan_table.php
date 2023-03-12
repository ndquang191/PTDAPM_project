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
        Schema::create('trinhdohocvan', function (Blueprint $table) {
            $table->id('MaHeDaoTao');
            $table->string('TenHeDaoTao');
            $table->string('TrinhDoChuyenMon');
            $table->string('XepLoai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trinhdohocvan');
    }
};
