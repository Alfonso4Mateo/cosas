@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1><i class="fas fa-users me-2"></i>Clientes</h1>
            <p class="text-muted">Gestión de clientes registrados</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-lg shadow-sm">
                <i class="fas fa-plus me-2"></i> Nuevo Cliente
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-gradient">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Listado de Clientes</h5>
        </div>
        <div class="card-body">
            @if($clientes->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                <th><i class="fas fa-user me-2"></i>Nombre</th>
                                <th><i class="fas fa-envelope me-2"></i>Email</th>
                                <th><i class="fas fa-phone me-2"></i>Teléfono</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clientes as $cliente)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $cliente->id }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong>
                                    </td>
                                    <td>
                                        <i class="fas fa-envelope me-2 text-primary"></i>{{ $cliente->email }}
                                    </td>
                                    <td>
                                        <i class="fas fa-phone me-2 text-success"></i>{{ $cliente->telefono ?? 'N/A' }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay clientes registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-user-slash" style="font-size: 3rem; color: #cbd5e1;"></i>
                    <p class="text-muted mt-3">No hay clientes registrados</p>
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus me-2"></i>Crear primer cliente
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
