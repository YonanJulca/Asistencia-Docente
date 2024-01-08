<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Personalizar el método authenticated para redirigir a /inicio
    protected function authenticated(Request $request, $user)
    {
        
        // Verificar si el usuario es un docente antes de redirigir a /inicio
    if ($user->esDocente()) {
        return redirect('/inicio');
    }

    // Si no es un docente, redirigir a la página de inicio de sesión
    return redirect()->route('login');
    }
}