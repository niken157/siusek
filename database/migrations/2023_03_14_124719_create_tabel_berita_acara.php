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
        Schema::create('tabel_berita_acara', function (Blueprint $table) {
            $table->Increments('id_ba');
            $table->string('nama_ruangan');
            $table->string('nama_sesi');
            $table->integer('hadir');
            $table->integer('tdk_hadir');
            $table->string('nama');
            $table->string('catatan');
            $table->string('ttd');
            $table->string('pengawas');
            $table->string('nip');
            $table->string('hari');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_berita_acara');
    }
};
