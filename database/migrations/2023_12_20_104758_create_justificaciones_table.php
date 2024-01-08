<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crea la tabla 'justificaciones' con los siguientes campos
        Schema::create('justificaciones', function (Blueprint $table) {
            $table->id(); // Campo de identificación único.
            $table->string('nombre'); // Campo de cadena para almacenar el nombre.
            $table->text('motivo'); // Campo de texto para almacenar el motivo de la justificación.
            $table->text('evidencia')->nullable(); // Campo de texto para almacenar la evidencia (puede ser nulo).
            $table->timestamps(); // Dos campos adicionales (created_at y updated_at) para registrar la fecha y hora de creación y actualización de cada registro.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimina la tabla 'justificaciones' si existe
        Schema::dropIfExists('justificaciones');
    }
};
