<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
    <!-- Icono del sistema -->
    <link rel="icon" href="img/UNI.png">
    <!-- Conexión con archivos CSS -->
    <link rel="stylesheet" href="{{ asset('css/ayuda.css') }}">
    <!-- Conexión con Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- Biblioteca de gráficos Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Contenido del cuerpo de la página -->
    <div class="body-container" id="body-container">
        <h1>Guía de Usuario</h1>
        <hr>
        <div class="container-helps">
            <!-- Sección 1: Inicio de Sesión -->
            <div class="content section-login">
                <h2>1. Inicio de Sesión</h2>
                <p>Accede a tu cuenta utilizando tu nombre de usuario y contraseña.</p>
              
            </div>
            <!-- Sección 2: Panel de Control -->
            <div class="content section-dashboard">
                <h2>2. Panel de Control</h2>
                <p>Después de iniciar sesión, serás dirigido al panel de control principal.</p>
                
            </div>
            <!-- Sección 3: Registrar Asistencia -->
            <div class="content section-attendance">
                <h2>3. Registrar Asistencia</h2>
                <p>Navega a la sección de "Asistencia".</p>
                <p>Selecciona la fecha y la clase correspondiente.</p>
                <p>Marca la asistencia según sea necesario.</p>
                <p>Guarda los cambios.</p>
              
            </div>
            <!-- Sección 4: Justificar Ausencias -->
            <div class="content section-justifications">
                <h2>4. Justificar Ausencias</h2>
                <p>Accede a la sección de "Justificaciones".</p>
                <p>Visualiza la lista de estudiantes con ausencias.</p>
                <p>Selecciona un estudiante y proporciona una justificación.</p>
                <p>Guarda la justificación.</p>
               
            </div>
            <!-- Sección 5: Generar Reportes -->
            <div class="content section-reports">
                <h2>5. Generar Reportes</h2>
                <p>Dirígete a la sección de "Reportes".</p>
                <p>Selecciona el período y los parámetros deseados.</p>
                <p>Descarga el informe en formato PDF o CSV.</p>
           
            </div>
            <!-- Sección 6: Perfil del Docente -->
            <div class="content section-profile">
                <h2>6. Perfil del Docente</h2>
                <p>Accede a tu perfil para actualizar información personal.</p>
                <p>Cambia tu contraseña si es necesario.</p>
          
            </div>
            <!-- Sección 7: Preguntas Frecuentes (FAQ) -->
            <div class="content section-faq">
                <h2>7. Preguntas Frecuentes (FAQ)</h2>
                <p>Consulta las preguntas frecuentes para obtener respuestas rápidas.</p>
               
            </div>
            <!-- Sección 8: Soporte Técnico -->
            <div class="content section-support">
                <h2>8. Soporte Técnico</h2>
                <p>Si encuentras problemas o tienes preguntas, contacta a nuestro equipo de soporte técnico en [correo electrónico] o [número de teléfono].</p>
             
            </div>
            <!-- Sección 9: Cerrar Sesión -->
            <div class="content section-logout">
                <h2>9. Cerrar Sesión</h2>
                <p>Recuerda cerrar sesión cuando hayas terminado de usar la plataforma.</p>
                
            </div>
        </div>
    </div>
</body>

</html>
