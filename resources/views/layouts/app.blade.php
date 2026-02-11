<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Médico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,.1);
        }
        footer {
            background: #0d6efd;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand">
            <i class="bi bi-heart-pulse"></i> Clínica Médica
        </a>
    </div>
    <div class="d-flex ms-auto">
    <a href="{{ route('farmacia.index') }}" class="btn btn-outline-light">
        Farmacia
    </a>
</div>

</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer>
    Sistema Médico © {{ date('Y') }}
</footer>

</body>
</html>
