@extends('layouts.app')


@section('content')
<h2>Editar Medicamento</h2>


<form action="{{ route('medicamentos.update', $medicamento) }}" method="POST">
@csrf
@method('PUT')
@include('medicamentos.form')
<button class="btn btn-primary">Actualizar</button>
<a href="{{ route('medicamentos.show', $medicamento) }}" class="btn btn-secondary">Cancelar</a>
</form>


@endsection