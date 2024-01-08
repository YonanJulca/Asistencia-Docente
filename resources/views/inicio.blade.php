<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metaetiquetas y título -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OEARP | UNI</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('imagenes/UNI.png') }}">

    <!-- Archivos CSS externos -->
   
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
   

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <!-- Contenedor principal -->
    <!-- <div class="container"> -->
        
        <!-- Sección de encabezado -->
        <header class="header" id="header">
            <!-- Líneas del menú para navegación -->
            <div class="menu-line" id="menu-line">
                <!-- Líneas del menú en forma de spans -->
                <div class="line-span-one"></div>
                <div class="line-span-two"></div>
                <div class="line-span-three"></div>
            </div>

            <!-- Información del usuario -->
            <label class="user-name" id="user-name">Bienvenido, {{ $nombreUsuario }}</label>


            <!-- Icono de configuración -->
            <img class="settings" id="settings" src="{{ asset('imagenes/tres-puntos.png') }}" alt="ajustes">

            <!-- Contenedor de configuración -->
            <div class="settings-container" id="settings-container">
                <a href="#">Cambiar Contraseña</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            </div>
        </header>

        <!-- Contenedor del contenido principal -->
        <div class="body-container" id="body-container">
            <label>BIENVENIDO AL EARPFIM <br> <span>ZONA DE USUARIO</span></label>
            <img class="gif-nut" src="{{ asset('imagenes/tuerca.gif') }}" alt="tuerca">
        </div>

        <!-- Contenedores de contenido dinámico -->
        <div id="contenido-reporte"></div>
        <div id="contenido-asistencia"></div>
        <div id="contenido-justificacion"></div>
        <div id="contenido-verJustificacion" ></div>
        <div id="contenido-ayuda"></div>
    <!-- </div> -->

    <!-- Barra lateral -->
    <div class="sidebar" id="sidebar">
        <!-- Encabezado de la barra lateral -->
        <div class="sidebar-header">
            <img class="logo" src="{{ asset('imagenes/UNI.png') }}" alt="logo uni">
            <div class="title">
                <label class="university-name">UNI | EARPFIM</label>
                <label class="teacher">Docente</label>
            </div>
        </div>

        <!-- Navegación de la barra lateral -->
        <div class="list-nav">
            <!-- Categoría general -->
            <div class="general">
                <div class="title-general" id="title-general">
                    <!-- Icono de la categoría -->
                    <img src="{{ asset('imagenes/briefcase-solid.svg') }}" alt="">
                    <!-- Etiqueta de la categoría -->
                    <label>GENERAL</label>
                    <!-- Icono de flecha -->
                    <img id="angle" class="angle" src="{{ asset('imagenes/angle-down-solid.svg') }}" alt="">
                </div>
                <!-- Contenedor para enlaces generales -->
                <div class="container-general" id="container-general">
                    <a href="#" onclick="cargarAsistencia()" class="list-content">Asistencia</a>
                    <a href="#" onclick="cargarReporte()" class="list-content">Generar Reportes</a>
                    <a href="#" onclick="cargarJustificacion()" class="list-content">Redactar Justificación</a>
                    <a href="#" onclick="cargarVerJustificacion()" class="list-content">Ver Justificaciones</a>
                    <a href="#" onclick="cargarAyuda()" class="list-content">Ayuda</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Archivo JavaScript externo -->
    <script src="{{ asset('js/inicio.js') }}"></script>
   
    <!-- Formulario para cerrar sesión -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</body>

</html>
