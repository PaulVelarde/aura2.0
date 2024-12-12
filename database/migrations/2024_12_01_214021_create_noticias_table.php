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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id('idnoticias'); // Clave primaria
            $table->string('titular', 100);
            $table->mediumText('contenido');
            $table->string('image', 45)->nullable();
            $table->date('fecha')->nullable();
            $table->string('fuente', 45)->nullable();
            $table->unsignedBigInteger('usuario_id'); // Relación con users
            $table->timestamps();

            $table->foreign('usuario_id')->references('idusuarios')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
