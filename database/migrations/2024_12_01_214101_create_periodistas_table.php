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
        Schema::create('periodistas', function (Blueprint $table) {
            $table->id('idperiodistas'); // Clave primaria
            $table->string('nombre', 100);
            $table->string('especialidad', 100)->nullable();
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
        Schema::dropIfExists('periodistas');
    }
};
