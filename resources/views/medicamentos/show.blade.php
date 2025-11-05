@extends('layouts.app')

@section('content')
    <h2>Detalle del Medicamento</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $medicamento->nombre }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $medicamento->descripcion }}</p>
            <p class="card-text"><strong>Precio:</strong> ${{ number_format($medicamento->precio, 2) }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $medicamento->stock }}</p>
            <p class="card-text"><strong>Laboratorio:</strong> {{ $medicamento->laboratorio }}</p>
            <p class="card-text"><strong>Fecha de caducidad:</strong> {{ \Carbon\Carbon::parse($medicamento->fecha_caducidad)->format('d/m/Y') }}</p>
        </div>
    </div>

    <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
