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
        Schema::create('hopdonglaodong', function (Blueprint $table) {
            $table->id('MaHDLD');
            $table->string('LoaiHopDong');
            $table->unsignedBigInteger('MaNV');
            $table->date('NgayKi');
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');
            $table->string('DiaDiem');
            $table->string('ChuyenMon');
            $table->string('PhapNhan');
            $table->decimal('LuongCoBan', 10, 2);
            $table->decimal('HeSoLuong', 3, 2);
            $table->boolean('TrangThai')->default(1);
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hopdonglaodong');
    }
};
