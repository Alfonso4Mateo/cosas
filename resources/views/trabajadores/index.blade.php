@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1><i class="fas fa-users me-2"></i>Trabajadores</h1>
            <p class="text-muted">Gestión del personal de la empresa</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('trabajadores.create') }}" class="btn btn-primary btn-lg shadow-sm">
                <i class="fas fa-plus me-2"></i> Nuevo Trabajador
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
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Listado de Trabajadores</h5>
        </div>
        <div class="card-body">
            @if($trabajadores->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                <th><i class="fas fa-user me-2"></i>Nombre</th>
                                <th><i class="fas fa-envelope me-2"></i>Email</th>
                                <th><i class="fas fa-briefcase me-2"></i>Puesto</th>
                                <th><i class="fas fa-dollar-sign me-2"></i>Salario</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trabajadores as $trabajador)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $trabajador->id }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $trabajador->nombre }} {{ $trabajador->apellido }}</strong>
                                    </td>
                                    <td>
                                        <i class="fas fa-envelope me-2 text-primary"></i>{{ $trabajador->email }}
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $trabajador->puesto }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-success">${{ number_format($trabajador->salario, 2) }}</strong>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('trabajadores.show', $trabajador->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('trabajadores.destroy', $trabajador->id) }}" method="POST" style="display:inline;">
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
                                    <td colspan="6" class="text-center">No hay trabajadores registrados</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-user-slash" style="font-size: 3rem; color: #cbd5e1;"></i>
                    <p class="text-muted mt-3">No hay trabajadores registrados</p>
                    <a href="{{ route('trabajadores.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus me-2"></i>Registrar primer trabajador
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

