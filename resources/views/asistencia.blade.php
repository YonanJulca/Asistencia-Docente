<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <!-- Enlaces a hojas de estilo -->
    <link rel="stylesheet" href="{{ asset('css/asistencia.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/header.css') }}"> -->
</head>

<body>
    <!-- Contenedor principal -->
    <div class="body-container" id="body-container">
        <!-- Encabezado de la página -->
        <div class="title-attendance">
            <div class="content-header-attendance">
                <!-- Imagen y título -->
                <img src="{{ asset('imagenes/clipboard-list-solid.svg') }}" alt="">
                <h1>Registrar Asistencia</h1>
            </div>
            <!-- Visualización de la hora actual -->
            <div class="hour">
                <label>HORA</label>
                <p class="register-hour" id="register-hour"></p>
            </div>
        </div>

        <!-- Contenido explicativo -->
        <div class="content-text">
            <p>
                <span>ENTRADA:</span> Se podrá marcar entrada desde <b>15min </b> antes de su hora de entrada y se tendrá una tolerancia de
                <b> 5min,</b> pasado los <b>5min</b> se registrará como tardanza.
            </p>
            <hr>
            <p>
                <span>SALIDA:</span> Se podrá marcar salida desde <b>1min</b> antes de su hora de salida y se tendrá una tolerancia máxima de
                <b>60min,</b> pasado los <b>60min</b> después de la hora de salida ya no se podrá marcar salida.
            </p>
            <!-- Formulario para el botón de entrada/salida -->
            <form method="post" action="{{ route('registrar.entrada.salida') }}">
                @csrf
                <button type="submit">REGISTRAR: ENTRADA / SALIDA</button>
            </form>
        </div>

        <!-- Historial de asistencia -->
        <div class="history-content">
            <div class="content-table">
                <div class="container-table-header">
                    <label>Historial de Asistencia</label>
                    <hr>
                </div>
                <!-- Tabla para mostrar el historial de asistencia -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Fecha</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Verificación y visualización del historial -->
                        @isset($historial)
                            @forelse($historial as $asistencia)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($asistencia->fecha)->locale('es_ES')->isoFormat('dddd D/MM/YYYY') }}</td>
                                    <td>{{ $asistencia->entrada ?? 'No registrada' }}</td>
                                    <td>{{ $asistencia->salida ?? 'No registrada' }}</td>
                                    <td>{{ $asistencia->estado }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No hay registros en el historial.</td>
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                <td colspan="5">No se pudo obtener el historial de asistencia.</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script JavaScript -->
    <script src="{{ asset('js/asistencia.js') }}"></script>
</body>

</html>
