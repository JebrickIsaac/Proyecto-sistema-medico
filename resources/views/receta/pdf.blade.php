<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receta Médica</title>
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #0d6efd;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 15px;
        }
        .box {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Clínica Médica San José</h2>
    <p>Receta Médica Oficial</p>
</div>

<div class="section">
    <strong>Paciente:</strong> {{ $consulta->paciente->nombres }} <br>
    <strong>Edad:</strong> {{ $consulta->paciente->edad }} <br>
    <strong>Sexo:</strong> {{ $consulta->paciente->sexo }} <br>
    <strong>Tipo de Sangre:</strong> {{ $consulta->paciente->tipo_sangre }}
</div>

<div class="section">
    <strong>Diagnóstico:</strong>
    <div class="box">{{ $consulta->enfermedad }}</div>
</div>

<div class="section">
    <strong>Descripción:</strong>
    <div class="box">{{ $consulta->descripcion }}</div>
</div>

<div class="section">
    <strong>Tratamiento:</strong>
    <div class="box">{{ $consulta->tratamiento }}</div>
</div>

<div class="section">
    <strong>Medicamentos:</strong>
    <div class="box">{{ $consulta->medicamentos }}</div>
</div>

<div class="footer">
    <p>______________________________</p>
    <p>Firma y sello médico</p>
</div>

</body>
</html>
