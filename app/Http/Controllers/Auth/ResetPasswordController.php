<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controlador de Restablecimiento de Contraseña
    |--------------------------------------------------------------------------
    |
    | Este controlador es responsable de manejar las solicitudes de restablecimiento de contraseña
    | y utiliza un trait simple para incluir este comportamiento. Eres libre de
    | explorar este trait y anular cualquier método que desees ajustar.
    |
    */

    use ResetsPasswords;

    /**
     * A dónde redirigir a los usuarios después de restablecer su contraseña.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
