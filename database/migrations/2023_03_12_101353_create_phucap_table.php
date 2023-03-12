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
            $table->id('MaPhuCap');
            $table->unsignedBigInteger('MaNV');
            $table->string('TenPC');
            $table->string('NoiDung');
            $table->date('NgayQuyetDinh');
            $table->decimal('GiaTri', 10, 2);
            $table->foreign('MaNV')->references('MaNV')->on('nhanvien')->onDelete('cascade');

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
