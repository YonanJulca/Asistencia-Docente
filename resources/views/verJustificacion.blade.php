<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver | Justificaciones</title>
    <!-- Conexión con archivos CSS -->
    <link rel="stylesheet" href="{{ asset('css/ver.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Contenido del cuerpo de la página -->
    <div class="body-container" id="body-container">
        <h1>Historial de justificaciones</h1>
        <div class="content-history-j">
            <!-- Tabla que muestra el historial de justificaciones -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Evidencia</th>
                        <th scope="col">Día y fecha</th>
                        <th scope="col">Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Itera sobre las justificaciones y muestra la información en la tabla -->
                    @foreach($justificaciones as $key => $justificacion)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <!-- Muestra el motivo de la justificación -->
                        <td>{{ $justificacion->motivo }}</td>
                        <td>
                            <!-- Verifica si hay evidencia adjunta y muestra un enlace para descargarla -->
                            @if($justificacion->evidencia)
                            <a href="{{ route('descargar.evidencia', $justificacion->id) }}" target="_blank">Descargar evidencia</a>
                            @else
                            Ninguna
                            @endif
                        </td>
                        <!-- Muestra la fecha de creación de la justificación en formato 'd/m/y' -->
                        <td>{{ $justificacion->created_at->format('d/m/y') }}</td>
                        <!-- Muestra la hora de creación de la justificación en formato 'H:i:s' -->
                        <td>{{ $justificacion->created_at->format('H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>