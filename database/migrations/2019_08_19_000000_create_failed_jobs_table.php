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
        // Crea la tabla 'failed_jobs' con los siguientes campos
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Campo de clave primaria autoincremental.
            $table->string('uuid')->unique(); // Campo de cadena para almacenar un identificador único universal.
            $table->text('connection'); // Campo de texto para almacenar la conexión de trabajo fallido.
            $table->text('queue'); // Campo de texto para almacenar la cola de trabajo fallido.
            $table->longText('payload'); // Campo de texto largo para almacenar la carga útil del trabajo fallido.
            $table->longText('exception'); // Campo de texto largo para almacenar la excepción del trabajo fallido.
            $table->timestamp('failed_at')->useCurrent(); // Campo de marca de tiempo para almacenar la fecha y hora de falla del trabajo, utilizando la marca de tiempo actual del sistema.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimina la tabla 'failed_jobs' si existe
        Schema::dropIfExists('failed_jobs');
    }
};
