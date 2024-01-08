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
        // Crea la tabla 'asistencias' con los siguientes campos
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id(); // Campo de identificación único.
            $table->date('fecha'); // Campo de fecha para almacenar la fecha de la asistencia.
            $table->time('entrada')->nullable(); // Campo de tiempo para almacenar la hora de entrada (puede ser nulo).
            $table->time('salida')->nullable(); // Campo de tiempo para almacenar la hora de salida (puede ser nulo).
            $table->string('estado'); // Campo de cadena para almacenar el estado de la asistencia.
            $table->timestamps(); // Dos campos adicionales (created_at y updated_at) para registrar la fecha y hora de creación y actualización de cada registro.
        });
    }
};
