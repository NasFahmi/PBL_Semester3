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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('pembeli_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('methode_pembayaran_id');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->string('keterangan', 255)->nullable();
            $table->boolean('is_Preorder');
            $table->unsignedBigInteger('Preorder_id');
            $table->boolean('is_complete');
            $table->timestamps();

            // relasi
            $table->foreign('pembeli_id')->references('id')->on('pembelis');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('methode_pembayaran_id')->references('id')->on('methode_pembayarans');
            $table->foreign('Preorder_id')->references('id')->on('preorders');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
