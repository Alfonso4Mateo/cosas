@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Ver Producto</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-2">ID</dt>
                <dd class="col-sm-10">{{ $productos->id }}</dd>

                <dt class="col-sm-2">Nombre</dt>
                <dd class="col-sm-10">{{ $productos->nombre }}</dd>

                <dt class="col-sm-2">Descripción</dt>
                <dd class="col-sm-10">{{ $productos->descripcion }}</dd>

                <dt class="col-sm-2">Precio</dt>
                <dd class="col-sm-10">{{ $productos->precio }}</dd>

                <dt class="col-sm-2">Stock</dt>
                <dd class="col-sm-10">{{ $productos->stock }}</dd>
            </dl>

            <a href="{{ route('productos.edit', $productos->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
