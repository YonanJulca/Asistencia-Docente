<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controlador de Restablecimiento de Contraseña
    |--------------------------------------------------------------------------
    |
    | Este controlador es responsable de manejar los correos electrónicos de restablecimiento de contraseña y
    | incluye un trait que ayuda a enviar estas notificaciones desde
    | tu aplicación a tus usuarios. Siéntete libre de explorar este trait.
    |
    */

    use SendsPasswordResetEmails;
}
