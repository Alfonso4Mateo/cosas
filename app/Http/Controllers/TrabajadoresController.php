<?php

namespace App\Http\Controllers;
use App\Models\Trabajadores;
use Illuminate\Http\Request;

class TrabajadoresController extends Controller
{
    public function index()
    {
        $trabajadores = Trabajadores::all();
        return view('trabajadores.index', compact('trabajadores'));
    }

    public function show($id)
    {
        $trabajador = Trabajadores::findOrFail($id);
        return view('trabajadores.show', compact('trabajador'));
    }

    public function create()
    {
        return view('trabajadores.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:trabajadores,email',
            'telefono' => 'nullable|string|max:20',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        Trabajadores::create($validatedData);

        return redirect()->route('trabajadores.index')->with('success', 'Trabajador creado exitosamente.');
    }

    
    public function edit($id)
    {
        $trabajador = Trabajadores::findOrFail($id);
        return view('trabajadores.edit', compact('trabajador'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:trabajadores,email,' . $id,
            'telefono' => 'nullable|string|max:20',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
        ]);

        $trabajador = Trabajadores::findOrFail($id);
        $trabajador->update($validatedData);

        return redirect()->route('trabajadores.index')->with('success', 'Trabajador actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $trabajador = Trabajadores::findOrFail($id);
        $trabajador->delete();

        return redirect()->route('trabajadores.index')->with('success', 'Trabajador eliminado exitosamente.');
    }

}
