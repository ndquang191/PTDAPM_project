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
        Schema::create('thoigiancongtac', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaNV');
            $table->unsignedBigInteger('MaCV');
            $table->date('NgayNhamChuc');
            $table->foreign('MaCV')->references('MaCV')->on('chucvu')->onDelete('cascade');
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thoigiancongtac');
    }
};
