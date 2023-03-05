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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id('MaNV')->from(10000);
            $table->string('TenNV', 50);
            $table->binary('HinhAnh')->nullable();
            $table->date('NgaySinh');
            $table->boolean('GioiTinh');
            $table->string('CCCD', 20)->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('NoiSinh')->nullable();
            $table->string('TonGiao')->nullable();
            $table->string('DanToc')->nullable();
            $table->string('SDT',12);
            $table->string('Email',100);
            $table->string('ChuyenNganh')->nullable();
            $table->string('TrinhDoHocVan')->nullable();
            $table->string('PhongBan')->nullable();
            $table->string('ChucVu')->nullable();
            $table->boolean('TrangThai')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien');
    }
};
