<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $sin_asignarCount = Solicitud::where('estado', 'sin_asignar')->count();
        $asignadasCount = Solicitud::where('estado', 'asignada')->count();
        $corregidasCount = Solicitud::where('estado', 'corregida')->count();
        $ultimasSolicitudes = Solicitud::where('estado', 'sin_asignar')
        ->where('created_at', '>=', Carbon::now()->subDay()) // últimas 24 horas
        ->orderBy('created_at', 'desc')
        ->get();

        return view('dashboard', compact('sin_asignarCount', 'asignadasCount', 'corregidasCount', 'ultimasSolicitudes'));
    }
}
