<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('nama_barang');
            $table->text('deskripsi');
            $table->string('kategori')->nullable();
            $table->string('lokasi_ditemukan');
            $table->date('tanggal_ditemukan');
            $table->string('foto')->nullable();

            $table->enum('status', ['pending', 'diklaim', 'selesai'])
                ->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};