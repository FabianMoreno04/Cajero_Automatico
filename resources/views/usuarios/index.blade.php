@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="bi bi-people-fill"></i> Lista de Usuarios
                </h4>

                <a href="{{ route('usuarios.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-person-plus"></i> Crear Usuario
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Saldo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $usuario)
                                <tr class="text-center">
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellido }}</td>
                                    <td class="fw-bold text-success">
                                        ${{ number_format($usuario->saldo, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('usuarios.show', $usuario->id) }}"
                                        class="btn btn-sm btn-secondary">
                                            <i class="bi bi-clock-history"></i> Historial
                                        </a>

                                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                        class="btn btn-sm btn-primary ms-1">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>

                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('¿Seguro que desea eliminar este usuario?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger ms-1">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        No hay usuarios registrados
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
