@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col">
            <h1><i class="fas fa-plus-circle me-2"></i>Crear Nómina</h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle me-2"></i><strong>Errores en el formulario:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-gradient">
            <h5 class="mb-0">Información de la Nómina</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('nominas.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Trabajador *</label>
                        <select name="trabajador_id" class="form-select @error('trabajador_id') is-invalid @enderror" required>
                            <option value="">Seleccionar trabajador</option>
                            @foreach($trabajadores as $trabajador)
                                <option value="{{ $trabajador->id }}" {{ old('trabajador_id') == $trabajador->id ? 'selected' : '' }}>
                                    {{ $trabajador->nombre }} {{ $trabajador->apellido }} - {{ $trabajador->puesto }}
                                </option>
                            @endforeach
                        </select>
                        @error('trabajador_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Mes *</label>
                        <input type="number" name="mes" class="form-control @error('mes') is-invalid @enderror" 
                               min="1" max="12" value="{{ old('mes') }}" placeholder="1-12" required>
                        @error('mes') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Año *</label>
                        <input type="number" name="anio" class="form-control @error('anio') is-invalid @enderror" 
                               min="2000" value="{{ old('anio', date('Y')) }}" required>
                        @error('anio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <hr>

                <h6 class="mb-3 font-weight-bold">Detalles Salariales</h6>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Salario Base *</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="salario_base" class="form-control @error('salario_base') is-invalid @enderror" 
                                   step="0.01" value="{{ old('salario_base') }}" placeholder="0.00" required>
                        </div>
                        @error('salario_base') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Descuentos (Impuestos, AFP, etc.)</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="descuentos" class="form-control @error('descuentos') is-invalid @enderror" 
                                   step="0.01" value="{{ old('descuentos', 0) }}" placeholder="0.00">
                        </div>
                        @error('descuentos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bonificaciones (Bono, Incentivo, etc.)</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="bonificaciones" class="form-control @error('bonificaciones') is-invalid @enderror" 
                                   step="0.01" value="{{ old('bonificaciones', 0) }}" placeholder="0.00">
                        </div>
                        @error('bonificaciones') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <hr>

                <div class="alert alert-info">
                    <strong>Salario Neto:</strong> Se calculará automáticamente como: Salario Base - Descuentos + Bonificaciones
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <a href="{{ route('nominas.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>Guardar Nómina
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

