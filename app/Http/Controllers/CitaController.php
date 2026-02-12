<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
    {
        Cita::create($request->all());

        return redirect()->route('citas.index')
            ->with('success', 'Cita registrada correctamente');
    }

    public function index()
    {
        $citas = Cita::orderBy('fecha')->get();
        return view('citas.index', compact('citas'));
    }

    public function atender($id)
{
    $cita = Cita::findOrFail($id);

    $cita->estado = 'Atendida';
    $cita->save();

    return view('paciente.create', compact('cita'));
}


}
