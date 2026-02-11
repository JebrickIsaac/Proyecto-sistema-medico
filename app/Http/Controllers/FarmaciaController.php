<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    private function listaMedicamentos()
    {
        return [
            ['nombre' => 'Paracetamol', 'precio' => 3.50, 'descripcion' => 'Analgésico y antipirético'],
            ['nombre' => 'Vitamina C', 'precio' => 6.00, 'descripcion' => 'Refuerza el sistema inmune'],
            ['nombre' => 'Zinc', 'precio' => 5.00, 'descripcion' => 'Suplemento mineral'],
            ['nombre' => 'Vitamina D', 'precio' => 7.00, 'descripcion' => 'Fortalece huesos y defensas'],
            ['nombre' => 'Losartán', 'precio' => 9.50, 'descripcion' => 'Control de presión arterial'],
            ['nombre' => 'Enalapril', 'precio' => 8.75, 'descripcion' => 'Tratamiento para hipertensión'],
            ['nombre' => 'Metformina', 'precio' => 10.00, 'descripcion' => 'Control de diabetes tipo 2'],
            ['nombre' => 'Insulina', 'precio' => 25.00, 'descripcion' => 'Regulación de glucosa'],
            ['nombre' => 'Omeprazol', 'precio' => 6.80, 'descripcion' => 'Protector gástrico'],
            ['nombre' => 'Antiácidos', 'precio' => 4.25, 'descripcion' => 'Alivio de acidez'],
            ['nombre' => 'Ibuprofeno', 'precio' => 4.00, 'descripcion' => 'Antiinflamatorio'],
            ['nombre' => 'Sumatriptán', 'precio' => 12.00, 'descripcion' => 'Tratamiento para migraña'],
            ['nombre' => 'Amoxicilina', 'precio' => 8.75, 'descripcion' => 'Antibiótico'],
            ['nombre' => 'Broncodilatadores', 'precio' => 15.00, 'descripcion' => 'Tratamiento respiratorio'],
            ['nombre' => 'Antiinflamatorios', 'precio' => 7.50, 'descripcion' => 'Reducción de inflamación'],
            ['nombre' => 'Loratadina', 'precio' => 5.25, 'descripcion' => 'Antialérgico'],
            ['nombre' => 'Cetirizina', 'precio' => 5.75, 'descripcion' => 'Tratamiento para alergias']
        ];
    }

    public function index(Request $request)
    {
        $medicamentos = $this->listaMedicamentos();

        return view('farmacia.index', compact('medicamentos'));
    }

    public function agregar(Request $request)
    {
        $carrito = session()->get('carrito', []);

        $med = $request->medicamento;

        if(isset($carrito[$med])) {
            $carrito[$med]++;
        } else {
            $carrito[$med] = 1;
        }

        session()->put('carrito', $carrito);

        return back()->with('success', 'Medicamento agregado al carrito');
    }
}
