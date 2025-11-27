<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('tagihan_id');
        $table->unsignedBigInteger('user_id'); // siswa yg membayar
        $table->date('tgl_bayar')->nullable();
        $table->decimal('jumlah_bayar', 12, 2);
        $table->enum('metode', ['transfer', 'gerai', 'tunai'])->default('transfer');
        $table->string('bukti')->nullable(); // file bukti pembayaran
        $table->enum('status', ['menunggu', 'valid', 'ditolak'])->default('menunggu');
        $table->text('catatan')->nullable();
        $table->timestamps();

        $table->foreign('tagihan_id')->references('id')->on('tagihans')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
