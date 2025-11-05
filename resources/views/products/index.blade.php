@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <form method="GET" action="{{ route('products.index') }}" class="mb-3 d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar producto...">
        <select name="order" class="form-select" onchange="this.form.submit()">
            <option value="">Ordenar por...</option>
            <option value="name">Nombre</option>
            <option value="price">Precio</option>
        </select>
        <button class="btn btn-primary">Buscar</button>
    </form>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Nuevo producto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>${{ $p->price }}</td>
                <td>{{ $p->category->name }}</td>
                <td>
                    <a href="{{ route('products.edit', $p) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection
