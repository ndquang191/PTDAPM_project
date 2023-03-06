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
        Schema::create('danhgia', function (Blueprint $table) {
            $table->id('MaDG');
            $table->unsignedBigInteger('MaNV');
            $table->date('NgayQuyetDinh');
            $table->string('NoiDung');
            $table->decimal('Giatri', 15, 2);
            $table->boolean('PhanLoai'); // 0 = Khen thuong | 1 = Ki luat
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgia');
    }
};
