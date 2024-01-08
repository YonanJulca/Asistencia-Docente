<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Justificacion;


class JustificacionController extends Controller
{
    public function enviarJustificacion(Request $request)
    {
        // Validación de campos (puedes personalizar las reglas de validación según tus necesidades)
        $request->validate([
            'nombre' => 'required',
            'motivo' => 'required',
            'evidencia' => 'required|mimes:pdf|max:2048', // Validación para archivos PDF
        ]);

        // Guardar la justificación en la base de datos
        $justificacion = new Justificacion();
        $justificacion->nombre = $request->input('nombre');
        $justificacion->motivo = $request->input('motivo');

        // Guardar el archivo de evidencia
        if ($request->hasFile('evidencia')) {
            $evidenciaPath = $request->file('evidencia')->store('evidencias', 'public');
            $justificacion->evidencia = $evidenciaPath;
        }

        $justificacion->save();

        // Puedes redirigir a una página de éxito o hacer cualquier otra cosa que necesites
        return redirect('/')->with('success', 'Justificación enviada con éxito');
    }

    public function verJustificaciones()
    {
        $justificaciones = Justificacion::all();
        return view('verJustificacion', ['justificaciones' => $justificaciones]);
    }
    
    public function descargarEvidencia($id)
    {
        // Buscar la justificación por su ID
        $justificacion = Justificacion::findOrFail($id);
    
        // Verificar que haya una evidencia antes de intentar descargar
        if ($justificacion->evidencia) {
            // Construir la ruta completa al archivo de evidencia en el sistema de archivos
            $rutaEvidencia = storage_path("app/public/{$justificacion->evidencia}");
    
            // Descargar el archivo de evidencia como respuesta HTTP
            return response()->download($rutaEvidencia, 'evidencia.pdf');
        } else {
            // Manejar el caso cuando no hay evidencia
            return back()->with('error', 'No hay evidencia disponible para descargar.');
        }
    }
    
    
}
