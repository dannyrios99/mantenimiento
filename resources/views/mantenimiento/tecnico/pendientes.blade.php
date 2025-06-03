<!DOCTYPE html>
<html lang="es">

<head>
    <title>Solicitudes Pendientes</title>
    <link rel="icon" href="{{ asset('assets/images/LogoIco.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="page-container">
        @section('pendientes')
            class="active-page"
        @endsection

        @include('mantenimiento.layouts.sidebar')

        <div class="page-content">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>Solicitudes Pendientes Por Corregir</h5>
                            </div>
                            <div class="card-body">
                                @if ($solicitudes->isEmpty())
                                    <div class="alert alert-info text-center">
                                        No tienes solicitudes asignadas actualmente.
                                    </div>
                                @else
                                    <div class="table-responsive mt-4">
                                        <table id="pendientesTable" class="table table-striped table-hover table-bordered align-middle" style="width:100%">
                                            <thead class="table-dark text-center">
                                                <tr>
                                                    <th>Estado</th>
                                                    @if(auth()->user()->role !== 'tecnico')
                                                        <th>Asignado a</th>
                                                    @endif
                                                    @if(auth()->user()->role === 'tecnico')
                                                        <th>Acción</th>
                                                    @endif
                                                    <th>Email</th>
                                                    <th>Sucursal</th>
                                                    <th>Solicitado por</th>
                                                    <th>Encargado</th>
                                                    <th>Área de afectación</th>
                                                    <th>Descripción</th>
                                                    <th>Evidencia fotografica</th>
                                                    <th>Observaciones</th>
                                                    <th>Fecha de solicitud</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($solicitudes as $item)
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-sm btn-secondary" disabled style="background-color: #6c757d; color: white;">
                                                                <i class="fas fa-clock"></i> Pendiente
                                                            </button>
                                                        </td>
                                                        @if(auth()->user()->role !== 'tecnico')
                                                            <td>
                                                                @if($item->usuario)
                                                                    {{ $item->usuario->name }} ({{ $item->usuario->email }})
                                                                @else
                                                                    <span class="text-muted">No asignado</span>
                                                                @endif
                                                            </td>
                                                        @endif
                                                        @if(auth()->user()->role === 'tecnico')
                                                            <td class="text-center">
                                                            <a href="{{ route('solicitudes.formCorregir', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-check-circle"></i> Marcar como corregida
                                                            </a>
                                                        </td>
                                                        @endif
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->sucursal }}</td>
                                                        <td>{{ $item->solicitado_por }}</td>
                                                        <td>{{ $item->encargado }}</td>
                                                        <td>{{ $item->area_afectacion }}</td>
                                                        <td>{{ $item->descripcion }}</td>
                                                        <td>
                                                            @if ($item->archivo)
                                                                <button 
                                                                    class="btn btn-sm btn-outline-primary"
                                                                    onclick="abrirLightbox('{{ asset('evidencias/' . $item->archivo) }}')">
                                                                    <i class="fas fa-eye"></i> Ver
                                                                </button>
                                                            @else
                                                                <span class="text-muted">Sin archivo</span>
                                                            @endif                           
                                                                
                                                        </td>
                                                        <td>{{ $item->observaciones ?? '—' }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y g:i a') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#pendientesTable').DataTable({
                    "order": [[10, 'desc']],
                    "language": {
                        "decimal": "",
                        "lengthMenu": "Mostrar _MENU_ entradas",
                        "emptyTable": "No hay solicitudes asignadas",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ solicitudes",
                        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                        "infoFiltered": "(filtrado de _MAX_ total)",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            });
        </script>
        <script>
            const corregirModal = document.getElementById('corregirModal');
            corregirModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const solicitudId = button.getAttribute('data-id');
                const form = document.getElementById('formCorregir');
                form.setAttribute('action', `/solicitudes/${solicitudId}/corregir`);
            });
        </script>
        <script>
        function abrirLightbox(src) {
            const overlay = document.createElement('div');
            overlay.classList.add('lightbox-overlay');

            const closeBtn = document.createElement('button');
            closeBtn.innerHTML = '&times;';
            closeBtn.classList.add('btn-close-lightbox');

            const img = document.createElement('img');
            img.src = src;

            // Append first (invisible)
            overlay.appendChild(closeBtn);
            overlay.appendChild(img);
            document.body.appendChild(overlay);

            // Trigger fade-in with slight delay
            setTimeout(() => {
                overlay.classList.add('active');
            }, 10);

            // Cierre con efecto
            function cerrar() {
                overlay.classList.remove('active');
                setTimeout(() => overlay.remove(), 300); // Tiempo igual al CSS transition
            }

            closeBtn.onclick = cerrar;
            overlay.onclick = (e) => {
                if (e.target === overlay) cerrar();
            };
        }
        </script>

        <style>
        .lightbox-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .lightbox-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .lightbox-overlay img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
            transform: scale(0.95);
            transition: transform 0.3s ease;
        }

        .lightbox-overlay.active img {
            transform: scale(1);
        }

        .btn-close-lightbox {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 2rem;
            color: #fff;
            background: transparent;
            border: none;
            cursor: pointer;
            z-index: 10000;
        }
        .btn-close-lightbox:hover {
            color: #e06d2a;
        }
        </style>
    </div>
</body>
</html>
