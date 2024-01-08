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
        // Crea la tabla 'password_resets' con los siguientes campos
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index(); // Campo de cadena para almacenar la dirección de correo electrónico del usuario y se indexa para mejorar la velocidad de búsqueda.
            $table->string('token'); // Campo de cadena para almacenar el token de restablecimiento de contraseña.
            $table->timestamp('created_at')->nullable(); // Campo de marca de tiempo para almacenar la fecha y hora de creación del registro (puede ser nulo).
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimina la tabla 'password_resets' si existe
        Schema::dropIfExists('password_resets');
    }
};
