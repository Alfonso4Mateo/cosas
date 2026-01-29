@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proveedor: {{ $proveedor->nombre }}</h1>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Contacto:</strong> {{ $proveedor->contacto }}</p>
            <p><strong>Email:</strong> {{ $proveedor->email }}</p>
            <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <p><strong>Dirección:</strong><br>{{ $proveedor->direccion }}</p>
        </div>
    </div>

    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-primary">Editar</a>
</div>
@endsection
