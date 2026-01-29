@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Editar Producto (Proveedor)</h1>
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
            <form action="{{ route('productos.update', $productos->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input name="nombre" class="form-control" value="{{ old('nombre', $productos->nombre) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control">{{ old('descripcion', $productos->descripcion) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input name="precio" class="form-control" value="{{ old('precio', $productos->precio) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input name="stock" class="form-control" value="{{ old('stock', $productos->stock) }}">
                </div>
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
