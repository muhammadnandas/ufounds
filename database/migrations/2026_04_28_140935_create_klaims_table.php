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
        Schema::create('klaims', function (Blueprint $table) {

            // PRIMARY KEY
            $table->id('id_klaim');

            // 🔥 RELASI KE LAPORAN
            $table->foreignId('laporan_id')
                ->constrained('laporans')
                ->cascadeOnDelete();

            // 🔥 RELASI KE USER
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // 🔥 DATA KLAIM
            $table->string('nama_pemilik')->nullable();
            $table->text('deskripsi_klaim')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('bukti_kepemilikan')->nullable();

            // 🔥 WAKTU KLAIM
            $table->timestamp('tanggal_klaim')->nullable();

            // 🔥 STATUS
            $table->enum('status_klaim', [
                'menunggu',
                'diproses',
                'diterima',
                'ditolak'
            ])->default('menunggu');

            // 🔥 CATATAN ADMIN
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klaims');
    }
};