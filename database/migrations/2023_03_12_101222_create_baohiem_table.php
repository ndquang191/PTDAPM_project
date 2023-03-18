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
            $table->date('NgayBatDau');
            $table->decimal('MucDongQDTS', 10, 2);
            $table->decimal('MucDongTNLD', 10, 2);
            $table->decimal('MucDongHT', 10, 2);
            $table->decimal('MucDongBHTN', 10, 2);
            $table->smallInteger('Thang');
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
