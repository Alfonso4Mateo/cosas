<?php

namespace App\Http\Controllers;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        return view('proveedores.productos.index', compact('productos'));
    }

    public function show($id)
    {
        $productos = Productos::findOrFail($id);
        return view('proveedores.productos.show', compact('productos'));
    }

    public function create()
    {
        return view('proveedores.productos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Productos::create($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    
    public function edit($id)
    {
        $productos = Productos::findOrFail($id);
        return view('proveedores.productos.edit', compact('productos'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $productos = Productos::findOrFail($id);
        $productos->update($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $productos = Productos::findOrFail($id);
        $productos->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

}
