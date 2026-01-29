@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1><i class="fas fa-file-invoice-dollar me-2"></i>Nóminas</h1>
            <p class="text-muted">Gestión de nóminas y pagos de empleados</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('nominas.create') }}" class="btn btn-primary btn-lg shadow-sm">
                <i class="fas fa-plus me-2"></i> Nueva Nómina
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
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Listado de Nóminas</h5>
        </div>
        <div class="card-body">
            @if($nominas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                <th><i class="fas fa-user me-2"></i>Trabajador</th>
                                <th><i class="fas fa-calendar me-2"></i>Período</th>
                                <th><i class="fas fa-dollar-sign me-2"></i>Salario Base</th>
                                <th><i class="fas fa-minus-circle me-2"></i>Descuentos</th>
                                <th><i class="fas fa-plus-circle me-2"></i>Bonificaciones</th>
                                <th class="text-end"><i class="fas fa-money-bill me-2"></i>Salario Neto</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($nominas as $nomina)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $nomina->id }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $nomina->trabajador->nombre }} {{ $nomina->trabajador->apellido }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ str_pad($nomina->mes, 2, '0', STR_PAD_LEFT) }}/{{ $nomina->anio }}</span>
                                    </td>
                                    <td>${{ number_format($nomina->salario_base, 2) }}</td>
                                    <td class="text-danger">-${{ number_format($nomina->descuentos, 2) }}</td>
                                    <td class="text-success">+${{ number_format($nomina->bonificaciones, 2) }}</td>
                                    <td class="text-end">
                                        <strong class="text-success" style="font-size: 1.1rem;">${{ number_format($nomina->salario_neto, 2) }}</strong>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('nominas.show', $nomina->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('nominas.edit', $nomina->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('nominas.destroy', $nomina->id) }}" method="POST" style="display:inline;">
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
                                    <td colspan="8" class="text-center">No hay nóminas registradas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-file-invoice-dollar" style="font-size: 3rem; color: #cbd5e1;"></i>
                    <p class="text-muted mt-3">No hay nóminas registradas</p>
                    <a href="{{ route('nominas.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus me-2"></i>Crear primera nómina
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

