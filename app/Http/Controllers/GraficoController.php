<?php

namespace App\Http\Controllers;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class GraficoController extends Controller
{
    // Método para obtener datos de asistencia en formato JSON para gráficos
    public function obtenerDatosGrafico(Request $request)
    {
        try {
            // Obtener todos los registros de asistencia
            $asistencias = Asistencia::all();

            // Devolver los datos en formato JSON
            return response()->json($asistencias);
        } catch (\Exception $e) {
            // Manejar errores y devolver respuesta de error
            return response()->json(['error' => 'Error al obtener datos para el gráfico'], 500);
        }
    }

    // Método para ver el reporte, incluyendo datos específicos para gráficos
    public function verReporte()
    {
        try {
            // Obtener todos los registros de asistencia
            $historial = Asistencia::all();

            // Obtener datos específicos para los gráficos
            $graficoData = $this->prepararDatosGraficos($historial);

            // Pasar datos a la vista 'reporte'
            return view('reporte', ['historial' => $historial, 'graficoData' => $graficoData]);
        } catch (\Exception $e) {
            // Manejar errores...
        }
    } 

    // Método privado para preparar datos específicos para los gráficos
    private function prepararDatosGraficos($historial)
    {
        return $historial->map(function ($asistencia) {
            return [
                'fecha' => $asistencia->fecha,
                'estado' => $asistencia->estado,
                'cantidad' => 1,
                'asistencia' => ($asistencia->estado == 'Puntual') ? 1 : 0,
                'inasistencia' => ($asistencia->estado == 'Ausente') ? 1 : 0,
                'justificaciones' => ($asistencia->estado == 'Puntual') ? 0 : 1,
                'tardanzas' => ($asistencia->estado == 'Tardanza') ? 1 : 0,
            ];
        });
    }

    // Método para descargar un informe en formato PDF
    public function descargarPDF()
    {
        // Establecer el límite de tiempo a 300 segundos (5 minutos)
        set_time_limit(300);

        // Obtener los datos de la base de datos
        $historial = Asistencia::all();

        // Generar el PDF usando la vista 'registro'
        $pdf = PDF::loadView('registro', compact('historial'));

        // Descargar el PDF con el nombre 'reporte.pdf'
        return $pdf->download('reporte.pdf');
    }

    // Método para descargar un informe en formato Excel
    public function descargarExcel()
    {
        // Obtener los datos de la base de datos
        $historial = Asistencia::all();

        // Descargar el informe en formato Excel utilizando el controlador 'ReporteController'
        return Excel::download(new ReporteController, 'reporte.xlsx');
    }
}
