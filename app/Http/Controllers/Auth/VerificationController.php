<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controlador de Verificación de Correo Electrónico
    |--------------------------------------------------------------------------
    |
    | Este controlador es responsable de manejar la verificación de correo electrónico para cualquier
    | usuario que se haya registrado recientemente en la aplicación. También se pueden reenviar
    | los correos electrónicos si el usuario no recibió el mensaje original.
    |
    */

    use VerifiesEmails;

    /**
     * A dónde redirigir a los usuarios después de la verificación.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Crea una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');  // Requiere que el usuario esté autenticado para acceder a las funciones de verificación.
        $this->middleware('signed')->only('verify');  // Requiere que la URL de verificación esté firmada antes de procesar la verificación.
        $this->middleware('throttle:6,1')->only('verify', 'resend');  // Limita la tasa de acceso a las funciones de verificación y reenvío.
    }
}
