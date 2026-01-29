@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Ver Trabajador</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-2">ID</dt>
                <dd class="col-sm-10">{{ $trabajador->id }}</dd>

                <dt class="col-sm-2">Nombre</dt>
                <dd class="col-sm-10">{{ $trabajador->nombre }} {{ $trabajador->apellido }}</dd>

                <dt class="col-sm-2">Email</dt>
                <dd class="col-sm-10">{{ $trabajador->email }}</dd>

                <dt class="col-sm-2">Teléfono</dt>
                <dd class="col-sm-10">{{ $trabajador->telefono }}</dd>

                <dt class="col-sm-2">Puesto</dt>
                <dd class="col-sm-10">{{ $trabajador->puesto }}</dd>

                <dt class="col-sm-2">Salario</dt>
                <dd class="col-sm-10">{{ $trabajador->salario }}</dd>
            </dl>

            <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('trabajadores.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
