<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Servicio</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            max-width: 700px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 30px 40px;
        }

        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .field-label {
            font-weight: bold;
            color: #2c3e50;
            margin-top: 20px;
        }

        .field-content {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .evidence-img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin-top: 10px;
        }

        .footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🛠 Nueva Solicitud Registrada</h2>

        <div class="field-label">Correo electrónico:</div>
        <div class="field-content">{{ $data['email'] }}</div>

        <div class="field-label">Sucursal:</div>
        <div class="field-content">{{ $data['sucursal'] }}</div>

        <div class="field-label">Solicitud realizada por:</div>
        <div class="field-content">{{ $data['solicitado_por'] }}</div>

        <div class="field-label">Nombre del encargado:</div>
        <div class="field-content">{{ $data['encargado'] }}</div>

        <div class="field-label">Área de afectación:</div>
        <div class="field-content">{{ $data['area_afectacion'] }}</div>

        <div class="field-label">Descripción del problema:</div>
        <div class="field-content">{{ $data['descripcion'] }}</div>

        @if(!empty($data['archivo']))
            <div class="field-label">Evidencia fotográfica:</div>
            <div class="field-content">
                <a href="{{ asset('evidencias/' . $data['archivo']) }}" target="_blank">
                    <img src="{{ asset('evidencias/' . $data['archivo']) }}" alt="Dar clic para ver evidencia" class="evidence-img">
                </a>
            </div>
        @endif

        @if(!empty($data['observaciones']))
            <div class="field-label">🔍 Observaciones adicionales:</div>
            <div class="field-content">{{ $data['observaciones'] }}</div>
        @endif

        <div class="footer">

        </div>
    </div>
</body>
</html>
