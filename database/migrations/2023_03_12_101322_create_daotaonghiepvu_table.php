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
        Schema::create('daotaonghiepvu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaDTNT');
            $table->string('TenKhoaDT');
            $table->smallInteger('SoLanDT');
            $table->foreign('MaDTNT')->references('MaDTNT')->on('chuongtrinhdaotao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daotaonghiepvu');
    }
};
