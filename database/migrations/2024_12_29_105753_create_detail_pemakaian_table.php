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
        Schema::create('detail_pemakaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemakaian');
            $table->unsignedBigInteger('id_inventaris');
            $table->integer('jumlah_barang');
            $table->foreign('id_inventaris')->references('id')->on('inventaris')->onDelete('cascade');
            $table->foreign('id_pemakaian')->references('id')->on('pemakaian')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pemakaian');
    }
};
