<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/generar_reporte.css') }}">

    <!-- Fuentes de Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/0057a56781.js" crossorigin="anonymous"></script>
    <!-- Agrega la etiqueta script de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Reporte</title>
</head>
<body>
    <!-- Contenido del cuerpo de la página -->
    <div class="body-container" id="body-container">
        <h1>REPORTES ASISTENCIA</h1>
        <hr>
        
        <!-- Botones de descarga y acciones -->
        <div class="buttons">
            <div class="download">
            <a class="PDF" href="{{ route('reporte.descargar.pdf') }}"><i class="far fa-file-pdf"></i>Descargar PDF</a>
            <a class="EXEL" href="{{ route('reporte.descargar.excel') }}"><i class="fa-solid fa-file-excel"></i>Descargar EXCEL</a>
            </div>
        </div>
        
        <!-- Estadísticas y gráficos -->
        <div class="statistics">
            <div class="average-attendance">
                <h3>Promedio</h3>
                <div class="circle">
                    <label class="percentage">100%</label>
                    <label class="attendance-circle">asistencias</label>
                </div>
            </div>
            
            <div class="graphics">
                <div class="graphics-pie">
                    <canvas class="pie" id="pie"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Gráfico de barras -->
        <div class="graphics-big">
            <div class="graphics-line">
                <canvas class="line" id="line"></canvas>
            </div>
            <div class="graphics-bar">
                <canvas class="bar" id="bar"></canvas>
            </div>
        </div>
    </div>

    <script>
        
    // Asegúrate de que $historial esté definido y no esté vacío
    var historial = @json($historial ?? []);

    // Imprime los datos en la consola para verificar
    console.log(historial);

    // Asigna los datos a window.datosAsistencia
    window.datosAsistencia = historial;

    // Imprime los datos en la consola para verificar
    console.log(window.datosAsistencia);
    </script>

<script src="{{ asset('js/grafico.js') }}"></script>
</body>
</html>
