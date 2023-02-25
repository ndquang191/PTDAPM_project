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
            $table->id('MaNV');
            $table->string('TenNV', 50);
            $table->binary('HinhAnh');
            $table->date('NgaySinh');
            $table->boolean('GioiTinh');
            $table->string('CCCD', 20);
            $table->string('DiaChi');
            $table->string('NoiSinh');
            $table->string('TonGiao');
            $table->string('SDT',12);
            $table->string('Email',100);
            $table->string('ChuyenNganh');
            $table->string('TrinhDoHocVan');
            $table->string('PhongBan');
            $table->string('ChucVu');
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
