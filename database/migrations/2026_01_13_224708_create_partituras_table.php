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
        Schema::create('partituras', function (Blueprint $table) {
            $table->id('idpartitura');
            $table->string('nombre');
            $table->foreignId('categoria_id')->constrained('categoria', 'idcategoria');
            $table->foreignId('autor_id')->constrained('autores', 'idautor');
            $table->foreignId('audio_id')->constrained('audios', 'idaudio');
            $table->foreignId('documento_id')->constrained('documentos', 'iddocumento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partituras');
    }
};
