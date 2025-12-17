<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row min-vh-100">

        {{-- MENÚ LATERAL IZQUIERDO --}}
        <div class="col-12 col-md-3 col-lg-2 bg-primary text-white p-3">
            <h5 class="text-center mb-4">
                <i class="bi bi-grid"></i> Menú
            </h5>

            <div class="d-grid gap-2">
                <a href="{{ route('usuarios.index', 1) }}" class="btn btn-light text-start">
                    <i class="bi bi-person-circle"></i> Usuarios
                </a>

                <a href="{{ route('retiros.index', 1) }}" class="btn btn-light text-start">
                    <i class="bi bi-cash-coin"></i> Realizar Retiros
                </a>

                <a href="{{ route('reporte.retiros') }}" class="btn btn-light text-start">
                    <i class="bi bi-bar-chart-fill"></i> Reportes
                </a>
            </div>
        </div>

        {{-- CONTENIDO DERECHO --}}
        <div class="col-12 col-md-9 col-lg-10 p-4">

            {{-- Navbar superior --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 rounded">
                <div class="container-fluid">
                    <span class="navbar-brand fw-bold">
                        Sistema Bancario
                    </span>
                </div>
            </nav>

            {{-- Contenido dinámico --}}
            @yield('content')
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
