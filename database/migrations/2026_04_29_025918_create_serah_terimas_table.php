<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('serah_terima', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('klaim_id');
$table->foreign('klaim_id')->references('id_klaim')->on('klaims')->onDelete('cascade');

            $table->foreignId('penemu_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('pemilik_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->dateTime('tanggal_serah_terima');
            $table->string('lokasi_serah_terima');
            $table->text('catatan')->nullable();
            
            $table->enum('status', ['dijadwalkan', 'selesai', 'batal'])
                  ->default('dijadwalkan');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('serah_terima');
    }
};