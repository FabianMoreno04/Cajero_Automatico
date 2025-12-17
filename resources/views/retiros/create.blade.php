@extends('layouts.app')

@section('title', 'Nuevo Retiro')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-cash-coin"></i> Realizar Retiro
                </h4>
            </div>

            <div class="card-body">

                {{-- Información del usuario --}}
                <div class="alert alert-info">
                    <p class="mb-1">
                        <strong>Usuario:</strong> {{ $usuario->nombre }} {{ $usuario->apellido }}
                    </p>
                    <p class="mb-0">
                        <strong>Saldo Disponible:</strong>
                        <span class="fw-bold text-success">
                            ${{ number_format($usuario->saldo, 0, ',', '.') }}
                        </span>
                    </p>
                </div>

                {{-- Errores de validación --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('retiros.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

                    <div class="mb-3">
                        <label class="form-label">Monto a retirar</label>
                        <input 
                            type="number" 
                            name="monto" 
                            class="form-control"
                            min="1000" 
                            max="2000000" 
                            required
                            placeholder="Ingrese el monto a retirar"
                        >
                        <small class="text-muted">
                            Monto permitido entre $1.000 y $2.000.000
                        </small>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Confirmar Retiro
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
