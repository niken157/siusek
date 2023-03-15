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
            $table->integer('nomer_ruangan');
            $table->integer('no_sesi');
            $table->integer('hadir');
            $table->integer('tdk_hadir');
            $table->integer('nama');
            $table->string('cacatan');
            $table->string('ttd');
            $table->string('pengawas');
            $table->string('nip');
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
