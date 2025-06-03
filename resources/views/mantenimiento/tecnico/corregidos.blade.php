<!DOCTYPE html>
<html lang="es">
<head>
    <title>Solicitudes Corregidas</title>
    <link rel="icon" href="{{ asset('assets/images/LogoIco.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="page-container">
        @section('corregidos')
            class="active-page"
        @endsection

        @include('mantenimiento.layouts.sidebar')

        <div class="page-content">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        @if(auth()->user()->role === 'tecnico')
                                            Mis Solicitudes Corregidas
                                        @else
                                            Solicitudes Corregidas
                                        @endif
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                @if ($solicitudes->isEmpty())
                                    <div class="alert alert-info text-center">
                                        No hay solicitudes corregidas para mostrar.
                                    </div>
                                @else
                                    <div class="table-responsive mt-4">
                                        <table id="corregidasTable" class="table table-striped table-hover table-bordered align-middle" style="width:100%">
                                            <thead class="table-dark text-center">
                                                <tr>
                                                    @if(auth()->user()->role !== 'tecnico')
                                                        <th>Corregido por</th>
                                                    @endif
                                                    <th>Estado</th>
                                                    <th>Email</th>
                                                    <th>Sucursal</th>
                                                    <th>Solicitado por</th>
                                                    <th>Encargado</th>
                                                    <th>Área de afectación</th>
                                                    <th>Descripción</th>
                                                    <th>Observaciones</th>
                                                    <th>Fecha de solicitud</th>
                                                    <th>Fecha de corrección</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($solicitudes as $item)
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-sm btn-success" disabled style="background-color: #28a745; color: white;">
                                                                <i class="fas fa-check-circle"></i> Corregida
                                                            </button>
                                                        </td>
                                                        @if(auth()->user()->role !== 'tecnico')
                                                            <td>
                                                                @if($item->usuario)
                                                                    {{ $item->usuario->name }} ({{ $item->usuario->email }})
                                                                @else
                                                                    <span class="text-muted">—</span>
                                                                @endif
                                                            </td>
                                                        @endif                                                      
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->sucursal }}</td>
                                                        <td>{{ $item->solicitado_por }}</td>
                                                        <td>{{ $item->encargado }}</td>
                                                        <td>{{ $item->area_afectacion }}</td>
                                                        <td>{{ $item->descripcion }}</td>
                                                        <td>{{ $item->observaciones ?? '—' }}</td>
                                                        <td>
                                                            {{ $item->fecha_corregida ? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y g:i a') : '—' }}
                                                        </td>
                                                        <td>
                                                            {{ $item->fecha_corregida ? \Carbon\Carbon::parse($item->fecha_corregida)->format('d/m/Y g:i a') : '—' }}
                                                        </td>
                                                        <td>
                                                            <button 
                                                                class="btn btn-sm btn-outline-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#detalleModal{{ $item->id }}">
                                                                <i class="fas fa-eye"></i> Ver detalles
                                                            </button>
                                                        </td>
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

        @foreach ($solicitudes as $item)
            <div class="modal fade" id="detalleModal{{ $item->id }}" tabindex="-1" aria-labelledby="detalleModalLabel{{ $item->id }}" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header mb-3" style="background-color: #e06d2a; color: #fff;">
                            <h5 class="modal-title">
                                <i class="fas fa-tools me-2"></i> Detalles de la corrección
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="fw-semibold"><i class="fas fa-sign-in-alt text-secondary me-1"></i> Hora de ingreso:</label>
                                    <div class="text-muted">{{ $item->hora_ingreso ?? '—' }}</div>
                                    <label class="fw-semibold"><i class="fas fa-tools text-secondary me-1"></i> ¿Requirió repuesto?</label>
                                    <div class="text-muted">{{ $item->requiere_repuesto === 'si' ? 'Sí' : 'No' }}</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="fw-semibold"><i class="fas fa-sign-out-alt text-secondary me-1"></i> Hora de salida:</label>
                                    <div class="text-muted">{{ $item->hora_salida ?? '—' }}</div>
                                    <label class="fw-semibold"><i class="fas fa-comment-dots text-secondary me-1"></i> Observaciones del técnico:</label>
                                    <div class="text-muted">{{ $item->observaciones_tecnico ?? '—' }}</div>
                                </div>

                                @if ($item->foto_factura)
                                    <div class="col-md-6">
                                        <label class="fw-semibold">
                                            <i class="fas fa-receipt text-secondary me-1"></i> Factura del repuesto:
                                        </label>
                                        <div class="border p-2 rounded shadow-sm">
                                            <img 
                                                src="{{ asset('storage/' . $item->foto_factura) }}" 
                                                class="img-fluid rounded" style="max-height: 250px; cursor: zoom-in;" 
                                                onclick="abrirLightbox('{{ asset('storage/' . $item->foto_factura) }}')">
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-6">
                                    <label class="fw-semibold">
                                        <i class="fas fa-camera text-secondary me-1"></i> Foto del trabajo realizado:
                                    </label>
                                    <div class="border p-2 rounded shadow-sm">
                                        <img 
                                            src="{{ asset('storage/' . $item->foto_trabajo) }}" 
                                            class="img-fluid rounded" 
                                            style="max-height: 250px; cursor: zoom-in;" 
                                            onclick="abrirLightbox('{{ asset('storage/' . $item->foto_trabajo) }}')">
                                    </div>
                                </div>
                                @if ($item->firma)
                                    <div class="col-12">
                                        <label class="fw-semibold"><i class="fas fa-pen-nib text-secondary me-1"></i> Firma del encargado:</label>
                                        <div class="border p-2 rounded shadow-sm text-center">
                                            <img src="{{ asset('storage/' . $item->firma) }}" class="img-fluid" alt="Firma" style="max-height: 200px;">
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i> Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#corregidasTable').DataTable({
                    "order": [[ @if(auth()->user()->role !== 'tecnico') 10 @else 10 @endif, 'desc' ]],
                    "language": {
                        "decimal": "",
                        "lengthMenu": "Mostrar _MENU_ entradas",
                        "emptyTable": "No hay solicitudes corregidas",
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
        function abrirLightbox(src) {
            const overlay = document.createElement('div');
            overlay.classList.add('lightbox-overlay');

            const closeBtn = document.createElement('button');
            closeBtn.innerHTML = '&times;';
            closeBtn.classList.add('btn-close-lightbox');
            closeBtn.onclick = () => overlay.remove();

            const img = document.createElement('img');
            img.src = src;

            overlay.appendChild(closeBtn);
            overlay.appendChild(img);
            overlay.onclick = (e) => {
                if (e.target === overlay) overlay.remove(); // solo si toca el fondo
            };

            document.body.appendChild(overlay);
        }
        </script>


        <style>
        .lightbox-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .lightbox-overlay img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
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
