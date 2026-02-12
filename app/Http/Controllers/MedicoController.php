<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Consulta;
use Barryvdh\DomPDF\Facade\Pdf;

class MedicoController extends Controller
{
    public function index() {
        return view('paciente.create');
    }

    public function storePaciente(Request $request)
{
    $paciente = Paciente::create([
        'nombres' => $request->nombres,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'estado_civil' => $request->estado_civil,
        'telefono' => $request->telefono,
        'correo' => $request->correo,
        'direccion' => $request->direccion,
        'tipo_sangre' => $request->tipo_sangre,
        'alergias' => $request->alergias,
        'diabetes' => $request->diabetes,
        'hipertension' => $request->hipertension,
    ]);

    return redirect()->route('consulta.create', $paciente->id);
}


    public function createConsulta($id) {
        $paciente = Paciente::findOrFail($id);
        return view('consulta.create', compact('paciente'));
    }

    public function storeConsulta(Request $request, $id) {

                $enfermedades = [
            'Gripe' => [
                'tratamiento' => 'Reposo, hidratación y control de fiebre',
                'medicamentos' => 'Paracetamol, Vitamina C'
            ],
            'Covid-19' => [
                'tratamiento' => 'Aislamiento, reposo y control médico',
                'medicamentos' => 'Paracetamol, Zinc, Vitamina D'
            ],
            'Hipertensión' => [
                'tratamiento' => 'Control de presión y dieta baja en sodio',
                'medicamentos' => 'Losartán, Enalapril'
            ],
            'Diabetes' => [
                'tratamiento' => 'Control glucémico y dieta',
                'medicamentos' => 'Metformina, Insulina'
            ],
            'Gastritis' => [
                'tratamiento' => 'Evitar irritantes y control gástrico',
                'medicamentos' => 'Omeprazol, Antiácidos'
            ],
            'Migraña' => [
                'tratamiento' => 'Reposo y control del estrés',
                'medicamentos' => 'Ibuprofeno, Sumatriptán'
            ],
            'Infección Respiratoria' => [
                'tratamiento' => 'Reposo e hidratación',
                'medicamentos' => 'Amoxicilina, Paracetamol'
            ],
            'Bronquitis' => [
                'tratamiento' => 'Reposo y evitar humo',
                'medicamentos' => 'Broncodilatadores, Antiinflamatorios'
            ],
            'Alergia' => [
                'tratamiento' => 'Evitar alérgeno',
                'medicamentos' => 'Loratadina, Cetirizina'
            ],
        ];

        
        $data = $enfermedades[$request->enfermedad];

        $consulta = Consulta::create([
            'paciente_id' => $id,
            'enfermedad' => $request->enfermedad,
            'descripcion' => $request->descripcion,
            'tratamiento' => $data['tratamiento'],
            'medicamentos' => $data['medicamentos']
        ]);

        $consulta->load('paciente');
        return view('receta.show', compact('consulta'));
    }
    public function historial()
    {
        $pacientes = Paciente::latest()->get();
        return view('paciente.historial', compact('pacientes'));
    }

    public function pdf($id)
    {
        $consulta = Consulta::with('paciente')->findOrFail($id);

        $pdf = Pdf::loadView('receta.pdf', compact('consulta'));

        return $pdf->download('receta_medica.pdf');
    }
}

