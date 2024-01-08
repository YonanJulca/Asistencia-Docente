<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use Carbon\Carbon;

class AsistenciaController extends Controller
{
    // Método para cargar la vista principal de asistencia
    public function index()
    {
        // Lógica para cargar la vista
        return view('asistencia');
    }

    // Método para registrar entrada y salida del usuario
    public function registrarEntradaSalida()
    {
        // Obtener la hora y fecha actual usando Carbon
        $horaActual = Carbon::now()->format('H:i:s');
        $fechaActual = Carbon::now()->toDateString();

        // Verificar si ya existe un registro de asistencia para la fecha actual
        $asistencia = Asistencia::where('fecha', $fechaActual)->first();

        // Crear un nuevo registro de asistencia si no existe
        if (!$asistencia) {
            $asistencia = new Asistencia(['fecha' => $fechaActual]);
        }

        // Registrar entrada si no está registrada
        if (!$asistencia->entrada) {
            $asistencia->entrada = $horaActual;
            // Calcular estado basado en la hora actual y límites establecidos
            $asistencia->estado = $this->calcularEstado($horaActual, '12:55:00', '13:00:00', 10);
        } elseif (!$asistencia->salida) {
            // Registrar salida si la entrada ya está registrada
            $asistencia->salida = $horaActual;
            // Calcular estado basado en la hora actual y límites establecidos
            $asistencia->estado = $this->calcularEstado($horaActual, '18:55:00', '19:00:00', 60);
        }

        // Guardar el registro de asistencia
        $asistencia->save();

        // Redirigir de nuevo con un mensaje de éxito
        return redirect()->back()->with('success', 'Asistencia registrada correctamente.');
    }

    // Método privado para calcular el estado de la asistencia
    private function calcularEstado($horaActual, $horaLimiteInferior, $horaLimiteSuperior, $tolerancia)
    {
        // Determinar si es puntual, tardanza o ausente
        if (strtotime($horaActual) <= strtotime($horaLimiteInferior)) {
            return 'Puntual';
        } elseif (strtotime($horaActual) <= strtotime($horaLimiteSuperior) + ($tolerancia * 60)) {
            return 'Tardanza';
        } else {
            return 'Ausente';
        }
    }

    // Método para ver el historial de asistencia
    public function verHistorial()
    {
        try {
            // Obtener todos los registros de asistencia
            $historial = Asistencia::all();

            // Formatear fechas y horas antes de pasarlas a la vista
            foreach ($historial as $asistencia) {
                $asistencia->fecha = Carbon::parse($asistencia->fecha)->locale('es_ES')->format('Y-m-d');

                // Formatear la entrada y salida en formato de 12 horas
                $asistencia->entrada = $asistencia->entrada
                    ? Carbon::parse($asistencia->entrada)->format('h:i:s A')
                    : 'No registrada';

                $asistencia->salida = $asistencia->salida
                    ? Carbon::parse($asistencia->salida)->format('h:i:s A')
                    : 'No registrada';
            }

            // Pasar el historial formateado a la vista
            return view('asistencia', ['historial' => $historial]);

        } catch (\Exception $e) {
            // Manejo de errores...
        }
    }
}
