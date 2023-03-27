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
        Schema::create('setting', function (Blueprint $table) {
            $table->Increments('id_setting');
            $table->string('nama_ujian');
            $table->string('logo');
            $table->string('tahun_ajaran');
            $table->integer('jumlah_pass');
            $table->enum('tipe_pass',['Kombinasi','Angka','Huruf']);
            $table->enum('tipe_user',['nis','manual','random']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
