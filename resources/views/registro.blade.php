<div class="history-content">
    <div class="content-table">
        <div class="container-table-header">
            <label>Historial de Asistencia</label>
            <hr>
        </div>

        <!-- Tabla que muestra el historial de asistencia -->
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
                <!-- Verifica si hay historial de asistencia -->
                @isset($historial)
                    <!-- Itera sobre el historial de asistencia -->
                    @forelse($historial as $asistencia)
                        <tr>
                            <!-- Número de iteración -->
                            <td>{{ $loop->iteration }}</td>
                            <!-- Fecha formateada utilizando Carbon para mostrar el día de la semana y la fecha en formato 'dddd D/MM/YYYY' en español -->
                            <td>{{ \Carbon\Carbon::parse($asistencia->fecha)->locale('es_ES')->isoFormat('dddd D/MM/YYYY') }}</td>
                            <!-- Muestra la entrada o 'No registrada' si no hay entrada registrada -->
                            <td>{{ $asistencia->entrada ?? 'No registrada' }}</td>
                            <!-- Muestra la salida o 'No registrada' si no hay salida registrada -->
                            <td>{{ $asistencia->salida ?? 'No registrada' }}</td>
                            <!-- Muestra el estado de la asistencia -->
                            <td>{{ $asistencia->estado }}</td>
                        </tr>
                    @empty
                        <!-- Mensaje si no hay registros en el historial -->
                        <tr>
                            <td colspan="5">No hay registros en el historial.</td>
                        </tr>
                    @endforelse
                @else
                    <!-- Mensaje si no se pudo obtener el historial de asistencia -->
                    <tr>
                        <td colspan="5">No se pudo obtener el historial de asistencia.</td>
                    </tr>
                @endisset
            </tbody>
        </table>
    </div>
</div>
