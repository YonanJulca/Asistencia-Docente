<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // El constructor del controlador establece un middleware de autenticación.
        // Esto significa que solo los usuarios autenticados pueden acceder a las rutas manejadas por este controlador.
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // El método index() devuelve la vista 'home'.
        // Esta vista suele ser la página principal después de que un usuario se autentica.
        return view('home');
    }

    public function mostrarPaginaPrincipal()
    {
        // Obtén el usuario actualmente autenticado
        $usuario = Auth::user();

        // Pasa el nombre de usuario a la vista
        return view('inicio', ['nombreUsuario' => $usuario->name]);

    }
}
