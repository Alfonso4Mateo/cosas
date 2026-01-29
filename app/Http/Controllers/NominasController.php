<?php

namespace App\Http\Controllers;
use App\Models\Nominas;
use App\Models\Trabajadores;
use Illuminate\Http\Request;

class NominasController extends Controller
{
    public function index()
    {
        $nominas = Nominas::with('trabajador')->get();
        return view('trabajadores.nominas.index', compact('nominas'));
    }

    public function show($id)
    {
        $nomina = Nominas::findOrFail($id);
        return view('trabajadores.nominas.show', compact('nomina'));
    }

    public function create()
    {
        $trabajadores = Trabajadores::all();
        return view('trabajadores.nominas.create', compact('trabajadores'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trabajador_id' => 'required|exists:trabajadores,id',
            'mes' => 'required|integer|min:1|max:12',
            'anio' => 'required|integer|min:2000',
            'salario_base' => 'required|numeric|min:0',
            'descuentos' => 'nullable|numeric|min:0',
            'bonificaciones' => 'nullable|numeric|min:0',
        ]);

        $salario_base = $validatedData['salario_base'];
        $descuentos = $validatedData['descuentos'] ?? 0;
        $bonificaciones = $validatedData['bonificaciones'] ?? 0;
        $validatedData['salario_neto'] = $salario_base - $descuentos + $bonificaciones;

        Nominas::create($validatedData);

        return redirect()->route('nominas.index')->with('success', 'Nómina creada exitosamente.');
    }

    
    public function edit($id)
    {
        $nomina = Nominas::findOrFail($id);
        $trabajadores = Trabajadores::all();
        return view('trabajadores.nominas.edit', compact('nomina', 'trabajadores'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'trabajador_id' => 'required|exists:trabajadores,id',
            'mes' => 'required|integer|min:1|max:12',
            'anio' => 'required|integer|min:2000',
            'salario_base' => 'required|numeric|min:0',
            'descuentos' => 'nullable|numeric|min:0',
            'bonificaciones' => 'nullable|numeric|min:0',
        ]);

        $salario_base = $validatedData['salario_base'];
        $descuentos = $validatedData['descuentos'] ?? 0;
        $bonificaciones = $validatedData['bonificaciones'] ?? 0;
        $validatedData['salario_neto'] = $salario_base - $descuentos + $bonificaciones;

        $nomina = Nominas::findOrFail($id);
        $nomina->update($validatedData);

        return redirect()->route('nominas.index')->with('success', 'Nómina actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $nomina = Nominas::findOrFail($id);
        $nomina->delete();

        return redirect()->route('nominas.index')->with('success', 'Nómina eliminada exitosamente.');
    }

}
