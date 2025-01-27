<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use App\Models\Ruta;
use App\Models\Turno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Auth;

class RutasController extends Controller
{

    public function mostrarTurnos()
{
    $turnos = Turno::select('id_turno', 'nombre')->get();

    return view('usuario-pasajero.turnos', compact('turnos'));
}
public function mostrarRutas($id_turno)
{
    $turno = Turno::select('id_turno','nombre', 'hora_inicio')->find($id_turno);
    // Obtener las rutas asociadas al ID del turno
    $rutas = Ruta::where('id_turno', $id_turno)->get();

    return view('usuario-pasajero.seleccion-turno', compact('rutas','turno'));
}
public function verRuta($id_turno, $id_ruta)
{
    $ruta = Ruta::findOrFail($id_ruta);
    $paraderos = $ruta->paraderos;
    $horaInicio = Carbon::parse($ruta->turno->hora_inicio);

    // Crear una copia de la hora de inicio
    $horaFinEstimada = $horaInicio->copy()->addHours(2);

    return view('usuario-pasajero.ver-ruta', compact('ruta', 'paraderos','horaFinEstimada','horaInicio'));
}
}