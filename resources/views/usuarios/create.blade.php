@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="bi bi-person-plus"></i> Crear Usuario
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf

                    @include('usuarios.form')

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>

                        <button class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
