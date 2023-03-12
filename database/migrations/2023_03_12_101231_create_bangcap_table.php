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
        Schema::create('bangcap', function (Blueprint $table) {
            $table->id('MaBC');
            $table->unsignedBigInteger('MaNV');
            $table->string('TenBC', 100);
            $table->string('LoaiBC');
            $table->date('NgayCap');
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bangcap');
    }
};
