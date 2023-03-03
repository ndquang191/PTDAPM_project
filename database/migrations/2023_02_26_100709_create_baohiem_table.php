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
        Schema::create('baohiem', function (Blueprint $table) {
            $table->id('MaBH');
            $table->unsignedBigInteger('MaNV');
            $table->string('SoBaoHiem',20);
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc'); // Thay thế thời hạn
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baohiem');
    }
};
