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
        Schema::create('peserta', function (Blueprint $table) {
            $table->Increments('id_peserta');
            $table->string('nis', 50)->unique();
            $table->string('nama_peserta');
            $table->string('kelas');
            $table->enum('jenis_kelamin', ['Perempuan','Laki-Laki']);
            $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha','Konghucu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
