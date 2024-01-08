<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controlador de Confirmación de Contraseña
    |--------------------------------------------------------------------------
    |
    | Este controlador es responsable de manejar las confirmaciones de contraseña
    | y utiliza un trait simple para incluir el comportamiento. Puedes explorar
    | este trait y anular cualquier función que requiera personalización.
    |
    */

    use ConfirmsPasswords;

    /**
     * A dónde redirigir a los usuarios cuando la URL prevista falla.
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
        $this->middleware('auth');
    }
}
