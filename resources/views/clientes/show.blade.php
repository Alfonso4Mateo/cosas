@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Detalles del Cliente</h4>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><strong>Nombre:</strong></label>
                                <p class="form-control-static">{{ $cliente->nombre }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Apellido:</strong></label>
                                <p class="form-control-static">{{ $cliente->apellido }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><strong>Email:</strong></label>
                                <p class="form-control-static"><a href="mailto:{{ $cliente->email }}">{{ $cliente->email }}</a></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Teléfono:</strong></label>
                                <p class="form-control-static">{{ $cliente->telefono ?? 'No registrado' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Dirección:</strong></label>
                        <p class="form-control-static">{{ $cliente->direccion ?? 'No registrada' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Fecha de Creación:</strong></label>
                        <p class="form-control-static">{{ $cliente->created_at ? $cliente->created_at->format('d/m/Y H:i') : 'N/A' }}</p>
                    </div>

                    <hr>

                    <div class="form-group">
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-lg" style="transition: all 0.3s ease;">
                            <i class="fas fa-edit"></i> Editar Cliente
                        </a>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('¿Está seguro de que desea eliminar este cliente?')" style="transition: all 0.3s ease;">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control-static {
        display: block;
        padding: 0.375rem 0.75rem;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }

    .btn-warning:hover, .btn-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220,53,69,0.3);
    }
</style>
@endsection
