@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Ver Nómina</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $nomina->id }}</dd>

                <dt class="col-sm-3">Trabajador</dt>
                <dd class="col-sm-9">{{ $nomina->trabajador->nombre }} {{ $nomina->trabajador->apellido }}</dd>

                <dt class="col-sm-3">Período</dt>
                <dd class="col-sm-9">{{ $nomina->mes }}/{{ $nomina->anio }}</dd>

                <dt class="col-sm-3">Salario Base</dt>
                <dd class="col-sm-9">${{ $nomina->salario_base }}</dd>

                <dt class="col-sm-3">Descuentos</dt>
                <dd class="col-sm-9">${{ $nomina->descuentos }}</dd>

                <dt class="col-sm-3">Bonificaciones</dt>
                <dd class="col-sm-9">${{ $nomina->bonificaciones }}</dd>

                <dt class="col-sm-3">Salario Neto</dt>
                <dd class="col-sm-9"><strong>${{ $nomina->salario_neto }}</strong></dd>
            </dl>

            <a href="{{ route('nominas.edit', $nomina->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('nominas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
