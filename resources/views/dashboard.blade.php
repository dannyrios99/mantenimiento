<!DOCTYPE html>
<html lang="es">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card-summary:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="page-container">
        @section('dashboard')
            class="active-page"
        @endsection
        @include('mantenimiento.layouts.sidebar')

        <div class="page-content">
            <div class="main-wrapper">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <a href="{{ route('solicitudes.index') }}" class="text-decoration-none">
                            <div class="card border shadow-sm card-summary">
                                <div class="card-body text-center">
                                    <i class="fas fa-clock fa-2x mb-2 text-muted"></i>
                                    <h6 class="text-muted mb-1">No asignado</h6>
                                    <h3 class="fw-bold">{{ $sin_asignarCount }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('pendientes.index') }}" class="text-decoration-none">
                            <div class="card border shadow-sm card-summary">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-check fa-2x mb-2 text-muted"></i>
                                    <h6 class="text-muted mb-1">Asignadas</h6>
                                    <h3 class="fw-bold">{{ $asignadasCount }}</h3>
                                </div>
                            </div>
                        </a>    
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('corregidos.index') }}" class="text-decoration-none">
                            <div class="card border shadow-sm card-summary">
                                <div class="card-body text-center">
                                    <i class="fas fa-check-circle fa-2x mb-2 text-muted"></i>
                                    <h6 class="text-muted mb-1">Corregidas</h6>
                                    <h3 class="fw-bold">{{ $corregidasCount }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0">Solicitudes recibidas en las ultimas 24 horas</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sucursal</th>
                                    <th>Área</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ultimasSolicitudes as $sol)
                                    <tr>
                                        <td>{{ $sol->sucursal }}</td>
                                        <td>{{ $sol->area_afectacion }}</td>
                                        <td>
                                            @if ($sol->estado === 'sin_asignar')
                                                <span class="badge" style="background-color: #6c757d; color: white;">No asignado</span>
                                            @elseif ($sol->estado === 'asignada')
                                                <span class="badge" style="background-color: #ffc107; color: #212529;">Asignada</span>
                                            @elseif ($sol->estado === 'corregida')
                                                <span class="badge" style="background-color: #28a745; color: white;">Corregida</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($sol->created_at)->format('d/m/Y g:i a') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No hay solicitudes recientes</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
