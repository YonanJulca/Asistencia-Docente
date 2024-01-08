<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OEARP | UNI</title>
    <link rel="icon" href="{{ asset('imagenes/UNI.png') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <img src="{{ asset('imagenes/UNI.png') }}" alt="logo de la uni">
        <label>UNIVERSIDAD NACIONAL DE INGENIERÍA <br> <span>FACULTAD DE INGENIERÍA MÉCANICA</span></label>
    </header>
    <section class="main-section">
        <h1 class="title">INTRANET EARPFIM</h1>
        <p class="login-text">Sistema de Planificación de Recursos Académicos y Empresariales</p>
        <div class="login-container">
            <!-- Formulario de inicio de sesión de Laravel -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Usuario -->
                <div class="user-container">
                    <label class="user">Usuario</label>
                    <input type="text" id="email" name="email" placeholder="Correo electrónico" required>
                </div>
                <!-- Contraseña -->
                <div class="password-container">
                    <label class="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <!-- Mostrar contraseña -->
                <div class="show-password">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label>Recordarme</label>
                </div>
                <!-- Botón de inicio de sesión -->
                <button type="submit" class="button" id="button" name="button">INICIAR SESIÓN</button>
            </form>

            <!-- Enlace a la recuperación de contraseña de Laravel -->
            <a href="{{ route('password.request') }}" class="questions">¿Olvidó su contraseña?</a>

            <div class="separation">
                <hr>
                o
                <hr>
            </div>

            <label class="info">Temporalmente solo para docentes</label>
        </div>
    </section>
    <script src="{{ asset('js/mostrar-contra.js') }}"></script>
</body>

</html>