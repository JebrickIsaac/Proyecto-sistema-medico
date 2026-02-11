<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Médico Integral</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            min-height: 100vh;
            color: #fff;
        }
        .card {
            border-radius: 15px;
        }
        .icon-box {
            font-size: 3rem;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-lg-10">

        <!-- HERO -->
        <div class="text-center mb-5">
            <h1 class="fw-bold">Sistema Médico Integral</h1>
            <p class="lead mt-3">
                Plataforma digital para el registro de pacientes, consultas médicas
                y generación automática de recetas.
            </p>

            <a href="{{ route('paciente.index') }}" class="btn btn-light btn-lg mt-3">
                <i class="bi bi-heart-pulse"></i> Iniciar atención médica
            </a>
        </div>

        <!-- FEATURES -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <h5>Registro de Pacientes</h5>
                    <p class="text-muted">
                        Almacena información clínica básica y antecedentes médicos.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>
                    <h5>Consulta Médica</h5>
                    <p class="text-muted">
                        Registro detallado de enfermedades, síntomas y diagnóstico.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </div>
                    <h5>Receta Digital</h5>
                    <p class="text-muted">
                        Generación automática de tratamientos y descarga en PDF.
                    </p>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="text-center mt-5">
            <small class="text-white-50">
                © {{ date('Y') }} Sistema Médico | Proyecto académico
            </small>
        </div>

    </div>
</div>

</body>
</html>
