@extends('layouts.app')


@section('content')
<h2>Nuevo Medicamento</h2>


<form action="{{ route('medicamentos.store') }}" method="POST">
@csrf
@include('medicamentos.form')
<button class="btn btn-primary">Crear</button>
<a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Volver</a>
</form>


@endsection