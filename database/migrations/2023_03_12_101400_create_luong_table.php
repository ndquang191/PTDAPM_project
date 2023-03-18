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
        Schema::create('luong', function (Blueprint $table) {
            $table->id('MaBangLuong');
            $table->unsignedBigInteger('MaNV');
            $table->decimal('LuongCoBan', 10, 2);
            $table->decimal('HeSoLuong', 3, 2);
            $table->decimal('GiaTriKTKT', 10, 2);
            $table->decimal('BaoHiem', 10, 2);
            // $table->decimal('PhuCap', 10, 2);
            $table->date('NgayQuyetToan');
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luong');
    }
};
