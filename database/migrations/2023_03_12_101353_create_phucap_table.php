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
        Schema::create('phucap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaPC');
            $table->unsignedBigInteger('MaNV');
            $table->date('NgayQD');
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');
            $table->foreign('MaPC')->references('MaPC')->on('pc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phucap');
    }
};
