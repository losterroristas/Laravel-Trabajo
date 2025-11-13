@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Medicamentos</h1>
  <a href="{{ route('medicamentos.create') }}" class="btn btn-primary">Nuevo medicamento</a>
</div>

<form method="GET" action="{{ route('medicamentos.index') }}" class="mb-3 d-flex gap-2">
  <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar medicamento...">

  <select name="order" class="form-select" onchange="this.form.submit()">
      <option value="">Ordenar por...</option>
      <option value="nombre" {{ request('order') == 'nombre' ? 'selected' : '' }}>Nombre</option>
      <option value="precio" {{ request('order') == 'precio' ? 'selected' : '' }}>Precio</option>
      <option value="fecha_caducidad" {{ request('order') == 'fecha_caducidad' ? 'selected' : '' }}>Fecha de caducidad</option>
      <option value="created_at" {{ request('order') == 'created_at' ? 'selected' : '' }}>Fecha de creación</option>
  </select>

  <button class="btn btn-primary">Buscar</button>
</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Laboratorio</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($medicamentos as $m)
      <tr>
        <td>{{ $m->nombre }}</td>
        <td>${{ number_format($m->precio, 2) }}</td>
        <td>{{ $m->stock }}</td>
        <td>{{ $m->laboratorio }}</td>
        <td>
          <a href="{{ route('medicamentos.show', $m) }}" class="btn btn-sm btn-info">Ver</a>
          <a href="{{ route('medicamentos.edit', $m) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('medicamentos.destroy', $m) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Eliminar este medicamento?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="text-center text-muted">No hay medicamentos cargados.</td></tr>
    @endforelse

    @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

  </tbody>
</table>


<div class="d-flex justify-content-center mt-3">
  {{ $medicamentos->links() }}
</div>

@endsection
