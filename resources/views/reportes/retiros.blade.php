@extends('layouts.app')

@section('title', 'Reporte de Retiros')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-cash-stack"></i> Reporte General de Retiros
                </h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Usuario</th>
                                <th>Total Retiros</th>
                                <th>Promedio</th>
                                <th>Suma Total</th>
                                <th>Último Retiro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reporte as $item)
                                <tr class="text-center">
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->total_retiros }}</td>
                                    <td>${{ number_format($item->promedio_retiros, 0, ',', '.') }}</td>
                                    <td>${{ number_format($item->suma_retiros, 0, ',', '.') }}</td>
                                    <td>{{ $item->ultimo_retiro }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
