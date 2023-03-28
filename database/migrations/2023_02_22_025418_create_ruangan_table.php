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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->Increments('id_ruangan');
            $table->string('keterangan_ruangan');
            $table->string('nama_ruangan',50)->unique();
            $table->integer('jumlah_PC');
            $table->integer('cadangan_pc');
            $table->enum('keterangan', ['ya','tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};
