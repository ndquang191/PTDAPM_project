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
        Schema::create('chitietbaohiem', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('MaBHXH');
            $table->string('TenCheDo');
            $table->decimal('MucDong', 10, 2);
            $table->foreign('MaBHXH')->references('MaBHXH')->on('baohiem')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietbaohiem');
    }
};
