<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Tecnico;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificarAdmin;
use App\Mail\ConfirmarAlUsuario;
use Illuminate\Support\Facades\Storage;

class SolicitudController extends Controller
{
    public function solicitudes(Request $request)
    {
        $query = Solicitud::with('usuario');

        if ($request->filled('fecha_desde')) {
        $query->whereDate('created_at', '>=', $request->fecha_desde);
        }

        if ($request->filled('fecha_hasta')) {
            $query->whereDate('created_at', '<=', $request->fecha_hasta);
        }

        if ($request->filled('sucursal')) {
            $query->where('sucursal', $request->sucursal);
        }

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->filled('prioridades')) {
            $query->whereIn('prioridad', $request->input('prioridades'));
        }


        $solicitudes = $query->orderBy('created_at', 'desc')->get();

        // Para llenar el select de sucursales
        $sucursales = Solicitud::select('sucursal')->distinct()->pluck('sucursal');

        $usuarios = User::where('role', 'tecnico')->get();

        return view('mantenimiento.admin.solicitudes', compact('solicitudes', 'usuarios', 'sucursales'));
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email'             => 'required|email',
                'sucursal'          => 'required|string',
                'solicitado_por'    => 'required|string',
                'encargado'         => 'required|string',
                'area_afectacion'   => 'required|string',
                'descripcion'       => 'required|string',
                'archivo'           => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480',
                'observaciones'     => 'nullable|string',
            ]);

            // Manejar archivo si se envió
            if ($request->hasFile('archivo')) {
                $archivoNombre = time() . '_' . $request->file('archivo')->getClientOriginalName();
                $request->file('archivo')->move(public_path('evidencias'), $archivoNombre);
                $validated['archivo'] = $archivoNombre;
            }

            // Guardar solicitud
            Solicitud::create($validated);

            // ENVIAR CORREO AL ADMIN
            Mail::to('dannybling01@gmail.com')
                ->send(new NotificarAdmin($validated));

            // ENVIAR CORREO DE CONFIRMACIÓN AL USUARIO
            Mail::to($validated['email'])
                ->send(new ConfirmarAlUsuario($validated));

            return back()->with('success', 'Solicitud registrada y correos enviados correctamente.');

        } catch (\Exception $e) {
            Log::error('Error al registrar la solicitud: ' . $e->getMessage());

            return back()->with('error', 'Ocurrió un error al registrar la solicitud. Por favor intenta nuevamente.');
        }
    }


    public function asignar(Request $request)
    {
        $request->validate([
            'solicitud_id' => 'required|exists:solicitudes,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $solicitud = Solicitud::findOrFail($request->solicitud_id);
        $solicitud->user_id = $request->user_id;
        $solicitud->estado = 'asignada';
        $solicitud->save();

        return redirect()->back()->with('success', 'Técnico asignado correctamente.');
    }


    public function pendientes()
    {
        $user = auth()->user();

        // Si es técnico, solo ve sus solicitudes asignadas
        if ($user->role === 'tecnico') {
            $solicitudes = Solicitud::where('user_id', $user->id)
                                    ->where('estado', 'asignada')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        } else {
            // Admin y Lector ven todas las solicitudes asignadas
            $solicitudes = Solicitud::with('usuario')
                                ->where('estado', 'asignada')
                                ->orderBy('created_at', 'desc')
                                ->get();
        }

        return view('mantenimiento.tecnico.pendientes', compact('solicitudes'));
    }

    public function corregidos()
    {
        $user = auth()->user();

        if ($user->role === 'tecnico') {
            $solicitudes = Solicitud::where('user_id', $user->id)
                                    ->where('estado', 'corregida')
                                    ->orderBy('fecha_corregida', 'desc')
                                    ->get();
        } else {
            $solicitudes = Solicitud::with('usuario')
                                    ->where('estado', 'corregida')
                                    ->orderBy('fecha_corregida', 'desc')
                                    ->get();
        }

        return view('mantenimiento.tecnico.corregidos', compact('solicitudes'));
    }

    public function formCorregir($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('mantenimiento.formulario.formcorregir', compact('solicitud'));
    }

    public function guardarCorregida(Request $request, $id)
    {
        $solicitud = Solicitud::where('id', $id)
                            ->where('user_id', auth()->id()) // Solo técnico asignado
                            ->firstOrFail();

        $request->validate([
            'hora_ingreso' => 'required|date_format:H:i',
            'hora_salida' => 'required|date_format:H:i|after_or_equal:hora_ingreso',
            'observaciones' => 'nullable|string',
            'requiere_repuesto' => 'required|in:si,no',
            'foto_factura' => 'nullable|image|max:2048',
            'foto_trabajo' => 'required|image|max:4096',
            'firma' => 'required|string',
        ]);

        // Guardar archivos
        if ($request->hasFile('foto_factura')) {
            $facturaPath = $request->file('foto_factura')->store('facturas', 'public');
            $solicitud->foto_factura = $facturaPath;
        }

        if ($request->hasFile('foto_trabajo')) {
            $trabajoPath = $request->file('foto_trabajo')->store('trabajos', 'public');
            $solicitud->foto_trabajo = $trabajoPath;
        }

        // Guardar firma como imagen
        $firmaBase64 = $request->firma;
        $firmaData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $firmaBase64));
        $firmaFileName = 'firmas/firma_' . time() . '.png';
        Storage::disk('public')->put($firmaFileName, $firmaData);
        $solicitud->firma = $firmaFileName;

        // Guardar datos adicionales
        $solicitud->hora_ingreso = $request->hora_ingreso;
        $solicitud->hora_salida = $request->hora_salida;
        $solicitud->observaciones = $request->observaciones;
        $solicitud->requiere_repuesto = $request->requiere_repuesto;
        $solicitud->fecha_corregida = now();
        $solicitud->estado = 'corregida';

        $solicitud->save();

        return redirect()->route('pendientes.index')->with('success', 'Solicitud corregida correctamente.');
    }

    public function rechazar(Request $request)
    {
        $request->validate([
            'solicitud_id' => 'required|exists:solicitudes,id',
            'motivo' => 'required|string',
        ]);

        $solicitud = Solicitud::findOrFail($request->solicitud_id);
        $solicitud->estado = 'rechazada';
        $solicitud->motivo_rechazo = $request->motivo;
        $solicitud->save();

        return redirect()->back()->with('success', 'Solicitud rechazada correctamente.');
    }

    public function actualizarEstado(Request $request)
    {
        $request->validate([
            'solicitud_id' => 'required|exists:solicitudes,id',
            'estado' => 'required|in:asignada,rechazada',
            'user_id' => 'required_if:estado,asignada|nullable|exists:users,id',
            'motivo' => 'required_if:estado,rechazada|nullable|string',
        ]);

        $solicitud = Solicitud::findOrFail($request->solicitud_id);
        $solicitud->estado = $request->estado;

        if ($request->estado === 'asignada') {
            $solicitud->user_id = $request->user_id;
            $solicitud->motivo_rechazo = null; // limpiar si había
        }

        if ($request->estado === 'rechazada') {
            $solicitud->motivo_rechazo = $request->motivo;
            $solicitud->user_id = null; // eliminar técnico si lo tenía
        }

        $solicitud->save();

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    public function actualizarPrioridad(Request $request)
    {
        $request->validate([
            'solicitud_id' => 'required|exists:solicitudes,id',
            'prioridad' => 'required|in:alta,media,baja',
        ]);

        $solicitud = Solicitud::find($request->solicitud_id);
        $solicitud->prioridad = $request->prioridad;
        $solicitud->save();

        return response()->json(['success' => true]);
    }

}
