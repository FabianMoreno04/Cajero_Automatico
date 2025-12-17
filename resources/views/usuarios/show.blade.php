@extends('layouts.app')

@section('title', 'Saldo del Usuario')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card información del usuario --}}
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-person-circle"></i> Información del Usuario
                </h4>
            </div>

            <div class="card-body">
                <p class="mb-2">
                    <strong>Nombre:</strong>
                    {{ $usuario->nombre }} {{ $usuario->apellido }}
                </p>

                <p class="mb-3">
                    <strong>Saldo Actual:</strong>
                    <span class="fw-bold text-success">
                        ${{ number_format($usuario->saldo, 0, ',', '.') }}
                    </span>
                </p>

            </div>
        </div>

        {{-- Card historial de retiros --}}
        <div class="card shadow">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-clock-history"></i> Historial de Retiros
                </h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuario->retiros as $retiro)
                                <tr class="text-center">
                                    <td>
                                        ${{ number_format($retiro->monto, 0, ',', '.') }}
                                    </td>
                                    <td>{{ $retiro->fecha_retiro }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">
                                        No hay retiros registrados
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
