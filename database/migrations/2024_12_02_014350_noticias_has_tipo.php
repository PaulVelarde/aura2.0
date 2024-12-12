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
        Schema::create('noticias_has_tipo', function (Blueprint $table) {
            $table->unsignedBigInteger('noticia_id'); // Relación con noticias
            $table->unsignedBigInteger('tipo_id'); // Relación con tipo
            $table->timestamps();

            $table->foreign('noticia_id')->references('idnoticias')->on('noticias')->onDelete('cascade');
            $table->foreign('tipo_id')->references('idtipo')->on('tipo')->onDelete('cascade');

            $table->primary(['noticia_id', 'tipo_id']); // Clave primaria compuesta
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias_has_tipo');
    }
};
