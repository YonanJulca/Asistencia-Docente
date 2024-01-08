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
        // Crea la tabla 'users' con los siguientes campos
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Campo de identificación único.
            $table->string('name'); // Campo de cadena para almacenar el nombre.
            $table->string('email')->unique(); // Campo de cadena único para almacenar la dirección de correo electrónico.
            $table->timestamp('email_verified_at')->nullable(); // Campo de marca de tiempo para almacenar la fecha y hora de verificación del correo electrónico (puede ser nulo).
            $table->string('password'); // Campo de cadena para almacenar la contraseña.
            $table->rememberToken(); // Campo de cadena para almacenar el "remember me" token.
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
        // Elimina la tabla 'users' si existe
        Schema::dropIfExists('users');
    }
};
