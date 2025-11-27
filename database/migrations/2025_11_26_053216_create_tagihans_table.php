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
    Schema::create('tagihans', function (Blueprint $table) {
        $table->id();
        $table->string('kode')->unique(); // contoh: TAG-2024-0001
        $table->unsignedBigInteger('siswa_id');
        $table->string('jenis'); // SPP / Ujian / Bangunan / dll
        $table->decimal('jumlah', 12, 2);
        $table->date('jatuh_tempo')->nullable();
        $table->enum('status', ['belum_bayar', 'tertunda', 'lunas'])->default('belum_bayar');
        $table->text('keterangan')->nullable();
        $table->timestamps();

        $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
