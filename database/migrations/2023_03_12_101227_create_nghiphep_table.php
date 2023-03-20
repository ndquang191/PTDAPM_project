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
        Schema::create('nghiphep', function (Blueprint $table) {
            $table->id('MaNP');
            $table->unsignedBigInteger('MaNV');
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');
            $table->string('NoiDung')->nullable();
            $table->boolean('CoPhep');
            $table->boolean('PheDuyet');
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nghiphep');
    }
};
