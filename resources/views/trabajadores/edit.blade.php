@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Editar Trabajador</h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('trabajadores.update', $trabajador->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input name="nombre" class="form-control" value="{{ old('nombre', $trabajador->nombre) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Apellido</label>
                    <input name="apellido" class="form-control" value="{{ old('apellido', $trabajador->apellido) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" class="form-control" value="{{ old('email', $trabajador->email) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input name="telefono" class="form-control" value="{{ old('telefono', $trabajador->telefono) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Puesto</label>
                    <input name="puesto" class="form-control" value="{{ old('puesto', $trabajador->puesto) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Salario</label>
                    <input name="salario" class="form-control" value="{{ old('salario', $trabajador->salario) }}">
                </div>
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('trabajadores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
