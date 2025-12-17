@extends('layouts.app')

@section('title', 'Seleccionar Usuario')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">
            <i class="bi bi-people"></i> Seleccione un Usuario
        </h4>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Saldo</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                    <td class="text-success fw-bold">
                        ${{ number_format($usuario->saldo, 0, ',', '.') }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('retiros.create', $usuario->id) }}"
                           class="btn btn-primary btn-sm">
                            <i class="bi bi-cash-coin"></i> Retirar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
