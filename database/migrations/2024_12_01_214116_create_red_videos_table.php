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
        Schema::create('redes_videos', function (Blueprint $table) {
            $table->id('idredes'); // Clave primaria
            $table->string('titulo', 45);
            $table->string('url', 45);
            $table->string('plataforma', 45);
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('tipo_idtipo'); // Relación con tipo
            $table->unsignedBigInteger('usuario_id'); // Relación con users
            $table->timestamps();

            $table->foreign('tipo_idtipo')->references('idtipo')->on('tipo')->onDelete('cascade');
            $table->foreign('usuario_id')->references('idusuarios')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_videos');
    }
};
