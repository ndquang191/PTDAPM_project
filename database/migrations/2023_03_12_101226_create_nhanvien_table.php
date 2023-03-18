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
            $table->string('CCCD', 20);
            $table->date('NgayCap');
            $table->string('NoiCap');
            $table->string('DiaChi');
            $table->string('NoiSinh');
            $table->string('TonGiao');
            $table->string('DanToc');
            $table->string('SDT',12);
            $table->string('Email',50);
            $table->unsignedBigInteger('MaTDHV');
            $table->unsignedBigInteger('MaPB');
            $table->unsignedBigInteger('MaCV');
            $table->unsignedBigInteger('MaBH')->nullable();
            $table->boolean('TrangThai')->default(1);
            $table->foreign('MaPB')->references('MaPB')->on('phongban')->onDelete('cascade');
            $table->foreign('MaTDHV')->references('MaTDHV')->on('trinhdohocvan')->onDelete('cascade');
            $table->foreign('MaCV')->references('MaCV')->on('chucvu')->onDelete('cascade');
            $table->foreign('MaBH')->references('MaBH')->on('baohiem')->onDelete('cascade');

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
