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
        // Crea la tabla 'personal_access_tokens' con los siguientes campos
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Campo de clave primaria autoincremental.
            $table->morphs('tokenable'); // Crea columnas 'tokenable_id' y 'tokenable_type' para admitir la relación morfomórfica.
            $table->string('name'); // Campo de cadena para almacenar el nombre del token.
            $table->string('token', 64)->unique(); // Campo de cadena para almacenar el token, con índice único.
            $table->text('abilities')->nullable(); // Campo de texto para almacenar habilidades del token (puede ser nulo).
            $table->timestamp('last_used_at')->nullable(); // Campo de marca de tiempo para almacenar la última vez que se utilizó el token (puede ser nulo).
            $table->timestamp('expires_at')->nullable(); // Campo de marca de tiempo para almacenar la fecha y hora de caducidad del token (puede ser nulo).
            $table->timestamps(); // Campos de marca de tiempo 'created_at' y 'updated_at'.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Elimina la tabla 'personal_access_tokens' si existe
        Schema::dropIfExists('personal_access_tokens');
    }
};
