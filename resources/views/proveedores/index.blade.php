@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Nuevo Proveedor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            @if($proveedores->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $prov)
                        <tr>
                            <td>{{ $prov->nombre }}</td>
                            <td>{{ $prov->contacto }}</td>
                            <td>{{ $prov->email }}</td>
                            <td>{{ $prov->telefono }}</td>
                            <td>
                                <a href="{{ route('proveedores.show', $prov->id) }}" class="btn btn-sm btn-secondary">Ver</a>
                                <a href="{{ route('proveedores.edit', $prov->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('proveedores.destroy', $prov->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar proveedor?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No hay proveedores registrados.</p>
            @endif
        </div>
    </div>
</div>
@endsection
