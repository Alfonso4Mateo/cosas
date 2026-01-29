@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Editar Nómina</h1>
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
            <form action="{{ route('nominas.update', $nomina->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Trabajador</label>
                    <select name="trabajador_id" class="form-control" required>
                        @foreach($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}" {{ $nomina->trabajador_id == $trabajador->id ? 'selected' : '' }}>{{ $trabajador->nombre }} {{ $trabajador->apellido }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Mes</label>
                            <input type="number" name="mes" class="form-control" min="1" max="12" value="{{ old('mes', $nomina->mes) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Año</label>
                            <input type="number" name="anio" class="form-control" min="2000" value="{{ old('anio', $nomina->anio) }}" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Salario Base</label>
                    <input type="number" name="salario_base" class="form-control" step="0.01" value="{{ old('salario_base', $nomina->salario_base) }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Descuentos</label>
                            <input type="number" name="descuentos" class="form-control" step="0.01" value="{{ old('descuentos', $nomina->descuentos) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bonificaciones</label>
                            <input type="number" name="bonificaciones" class="form-control" step="0.01" value="{{ old('bonificaciones', $nomina->bonificaciones) }}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('nominas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
