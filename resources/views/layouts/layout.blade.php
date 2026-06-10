<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TechRepair')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top">
        <div class="container-fluid justify-content-between align-items-center d-flex">
            <a class="navbar-brand" href="{{ route('reparaciones.index') }}">
                <i class="fas fa-mobile-alt"></i> TechRepair
            </a>

            @if(session('authenticated'))
                <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                    </button>
                </form>
            @endif
        </div>
    </nav>

    <div class="container-main">
        <div class="container-lg">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
