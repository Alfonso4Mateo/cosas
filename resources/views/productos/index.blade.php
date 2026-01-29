@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1><i class="fas fa-box me-2"></i>Productos</h1>
            <p class="text-muted">Gestión de productos disponibles</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('productos.create') }}" class="btn btn-primary btn-lg shadow-sm">
                <i class="fas fa-plus me-2"></i> Nuevo Producto
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
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Listado de Productos</h5>
        </div>
        <div class="card-body">
            @if($productos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                <th><i class="fas fa-tag me-2"></i>Nombre</th>
                                <th><i class="fas fa-list me-2"></i>Descripción</th>
                                <th><i class="fas fa-dollar-sign me-2"></i>Precio</th>
                                <th><i class="fas fa-warehouse me-2"></i>Stock</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $p)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $p->id }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $p->nombre }}</strong>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ Str::limit($p->descripcion, 50) }}</small>
                                    </td>
                                    <td>
                                        <strong class="text-success">${{ number_format($p->precio, 2) }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge {{ $p->stock > 10 ? 'bg-success' : ($p->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                                            {{ $p->stock }} unidades
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('productos.show', $p->id) }}" class="btn btn-sm btn-info" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('productos.edit', $p->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('productos.destroy', $p->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox" style="font-size: 3rem; color: #cbd5e1;"></i>
                    <p class="text-muted mt-3">No hay productos registrados</p>
                    <a href="{{ route('productos.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus me-2"></i>Crear primer producto
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

