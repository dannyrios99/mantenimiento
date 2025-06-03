<!DOCTYPE html>
<html lang="es">

<head>
    <title>Solicitudes</title>
    <link rel="icon" href="{{ asset('assets/images/LogoIco.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <div class="page-container">

         @section('solicitudes')
            class="active-page"
        @endsection
        
        @include('mantenimiento.layouts.sidebar')

        <div class="page-content">
            <div class="main-wrapper">
                <div class="row">
                    @if (session('error'))
                        {{ session('error') }}
                    @else
                        {{ session('error') }}
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="dropdown-container">
                                                <button class="dropdown-toggle" onclick="toggleFilters(this)">
                                                    <strong>Filtros</strong> <span class="arrow">&#9660;</span>
                                                </button>

                                                <div id="filtersDropdown" class="filters-dropdown">
                                                    <form method="GET" action="{{ route('solicitudes.index') }}">
                                                        <div class="filters-grid">

                                                            <div class="filter-section">
                                                                <strong>Fechas</strong>
                                                                <label>Desde:
                                                                    <input type="date" name="fecha_desde" value="{{ request('fecha_desde') }}">
                                                                </label>
                                                                <label>Hasta:
                                                                    <input type="date" name="fecha_hasta" value="{{ request('fecha_hasta') }}">
                                                                </label>
                                                            </div>

                                                            <div class="filter-section">
                                                                <strong>Sucursal</strong>
                                                                <select name="sucursal" style="width: 100%;">
                                                                    <option value="">Todas</option>
                                                                    @foreach($sucursales as $sucursal)
                                                                        <option value="{{ $sucursal }}" {{ request('sucursal') == $sucursal ? 'selected' : '' }}>
                                                                            {{ $sucursal }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="filter-section">
                                                                <strong>Estado</strong>
                                                                <select name="estado" style="width: 100%;">
                                                                    <option value="">Todos</option>
                                                                    <option value="sin_asignar" {{ request('estado') == 'sin_asignar' ? 'selected' : '' }}>No asignada</option>
                                                                    <option value="asignada" {{ request('estado') == 'asignada' ? 'selected' : '' }}>Asignada</option>
                                                                    <option value="corregida" {{ request('estado') == 'corregida' ? 'selected' : '' }}>Corregida</option>
                                                                    <option value="rechazada" {{ request('estado') == 'rechazada' ? 'selected' : '' }}>Rechazada</option>
                                                                </select>
                                                            </div>

                                                            <div class="filter-section">
                                                                <strong>Prioridad</strong>
                                                                <div class="form-check prioridad-check">
                                                                    <input type="checkbox" name="prioridades[]" value="alta" id="prioridadAlta"
                                                                        {{ in_array('alta', request()->input('prioridades', [])) ? 'checked' : '' }}>
                                                                    <label for="prioridadAlta">Alta</label>
                                                                </div>
                                                                <div class="form-check prioridad-check">
                                                                    <input type="checkbox" name="prioridades[]" value="media" id="prioridadMedia"
                                                                        {{ in_array('media', request()->input('prioridades', [])) ? 'checked' : '' }}>
                                                                    <label for="prioridadMedia">Media</label>
                                                                </div>
                                                                <div class="form-check prioridad-check">
                                                                    <input type="checkbox" name="prioridades[]" value="baja" id="prioridadBaja"
                                                                        {{ in_array('baja', request()->input('prioridades', [])) ? 'checked' : '' }}>
                                                                    <label for="prioridadBaja">Baja</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="filter-actions">
                                                            <button type="submit" class="apply-btn">Aplicar filtros</button>
                                                            <a href="{{ route('solicitudes.index') }}" class="clear-btn">Limpiar filtros</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="d-flex justify-content-between gap-2 align-items-center">  
                                        </div>                       
                                    </div>                                                                
                                    <div class="table-responsive mt-4">
                                        <table id="solicitudesTable" class="table table-striped table-hover table-bordered nowrap" style="width:100%">
                                            <thead class="text-center">
                                                <tr>
                                                    <th class="table-dark">Acciones</th>
                                                    <th class="table-dark">Prioridad</th>
                                                    <th class="table-dark">Sucursal</th>
                                                    <th class="table-dark">Área de afectación</th>
                                                    <th class="table-dark">Descripción</th>
                                                    <th class="table-dark">Evidencia fotográfica</th>
                                                    <th class="table-dark">Observaciones</th>
                                                    <th class="table-dark">Fecha</th>
                                                    <th class="table-dark">Solicitado por</th>
                                                    <th class="table-dark">Encargado</th>
                                                    <th class="table-dark">Asignado a</th>
                                                    <th class="table-dark">Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($solicitudes as $item)
                                                    <tr>                                    
                                                        <td class="text-center">
                                                            @php
                                                                $btnStyle = '';
                                                                $btnIcon = '';
                                                                $btnText = '';

                                                                switch ($item->estado) {
                                                                    case 'sin_asignar':
                                                                        $btnStyle = 'background-color: #6c757d; color: white;';
                                                                        $btnIcon = 'fas fa-clock';
                                                                        $btnText = 'No asignada';
                                                                        break;
                                                                    case 'asignada':
                                                                        $btnStyle = 'background-color: #ffc107; color: #212529;';
                                                                        $btnIcon = 'fas fa-user-check';
                                                                        $btnText = 'Asignada';
                                                                        break;
                                                                    case 'corregida':
                                                                        $btnStyle = 'background-color: #28a745; color: white;';
                                                                        $btnIcon = 'fas fa-check-circle';
                                                                        $btnText = 'Corregida';
                                                                        break;
                                                                    case 'rechazada':
                                                                        $btnStyle = 'background-color: #dc3545; color: white;';
                                                                        $btnIcon = 'fas fa-ban';
                                                                        $btnText = 'Rechazada';
                                                                        break;
                                                                }
                                                            @endphp
                                                                <button class="btn btn-sm w-100"
                                                                        style="{{ $btnStyle }}"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#estadoModal"
                                                                        data-id="{{ $item->id }}"
                                                                        data-estado="{{ $item->estado }}"
                                                                        data-user="{{ $item->user_id }}"
                                                                        data-motivo="{{ $item->motivo_rechazo }}">
                                                                    <i class="{{ $btnIcon }}"></i> {{ $btnText }}
                                                                </button>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $prioridad = $item->prioridad;
                                                                $btnText = $prioridad ? ucfirst($prioridad) : 'Asignar prioridad';

                                                                $style = match($prioridad) {
                                                                    'alta' => 'background-color: #dc3545; color: white;',       // Rojo vivo
                                                                    'media' => 'background-color: #ffc107; color: white;',    // Amarillo fuerte
                                                                    'baja' => 'background-color: #17a2b8; color: white;',        // Azul verdoso
                                                                    default => 'background-color: #6c757d; color: white;'        // Gris oscuro
                                                                };
                                                            @endphp

                                                            <button id="prioridadBtn{{ $item->id }}"
                                                                    class="btn btn-sm"
                                                                    style="{{ $style }} border: none; border-radius: 6px;"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#prioridadModal"
                                                                    onclick="document.getElementById('modalSolicitudId').value = '{{ $item->id }}'">
                                                                <i class="fas fa-flag me-1"></i> {{ $btnText }}
                                                            </button>
                                                        </td>
                                                        <td>{{ $item->sucursal }}</td>
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
                                                        <td>{{ $item->created_at}}</td>
                                                        <td>{{ $item->solicitado_por }}</td>
                                                        <td>{{ $item->encargado }}</td>
                                                        <td>
                                                            @if ($item->usuario)
                                                                <i class="fas fa-user text-primary"></i> {{ $item->usuario->name }}
                                                            @else
                                                                <span class="text-muted">Sin asignar</span>
                                                            @endif
                                                        </td>                                       
                                                        <td>{{ $item->email }}</td>                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                                                                          
                </div>
            </div>
        </div>

        <div class="modal fade" id="estadoModal" tabindex="-1" aria-labelledby="estadoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('solicitudes.estado') }}">
                    @csrf
                    <input type="hidden" name="solicitud_id" id="estado_solicitud_id">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar estado de la solicitud</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Selección del nuevo estado -->
                            <div class="mb-3">
                                <label class="form-label">Nuevo estado:</label>
                                <select class="form-select" name="estado" id="estado_select" required>
                                    <option value="" selected disabled>Seleccione uno</option>
                                    <option value="asignada">Asignar a técnico</option>
                                    <option value="rechazada">Rechazar</option>
                                </select>
                            </div>

                            <!-- Técnico -->
                            <div class="mb-3" id="tecnico_field" style="display: none;">
                                <label class="form-label">Seleccionar técnico:</label>
                                <select name="user_id" class="form-select">
                                    <option value="">Seleccione</option>
                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->role === 'tecnico')
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Motivo de rechazo -->
                            <div class="mb-3" id="motivo_field" style="display: none;">
                                <label class="form-label">Motivo del rechazo:</label>
                                <textarea name="motivo" class="form-control" id="motivo_textarea" rows="3"></textarea>
                                <div class="invalid-feedback" id="motivo_error">Este campo es obligatorio.</div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn" style="background-color: #e06d2a;  color: #fff;">Actualizar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="prioridadModal" tabindex="-1" aria-labelledby="prioridadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambiar prioridad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="modalSolicitudId">
                        <select id="modalPrioridad" class="form-select" required>
                            <option value="">Seleccione una prioridad</option>
                            <option value="alta">Alta</option>
                            <option value="media">Media</option>
                            <option value="baja">Baja</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button id="guardarPrioridad" class="btn btn-primary" type="button">Guardar</button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>



        @foreach ($solicitudes as $item)
            @if ($item->estado === 'rechazada' && $item->motivo_rechazo)
                <div class="modal fade" id="motivoModal{{ $item->id }}" tabindex="-1" aria-labelledby="motivoModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title"><i class="fas fa-ban me-2"></i>Motivo del rechazo</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0 text-dark">{{ $item->motivo_rechazo }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
</body>
<script>
    $(document).ready(function () {
        // Inicializar DataTable
        var table = $('#solicitudesTable').DataTable({
            "order": [[9, 'desc']],
            "language": {
                "decimal": "",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });

        // Capturar ID de solicitud y pasarlo al modal
        $('#asignarModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var solicitudId = button.data('id');
            var userId = button.data('user');

            var modal = $(this);
            modal.find('#solicitud_id').val(solicitudId);

            var select = modal.find('select[name="user_id"]');
            if (userId) {
                select.val(userId);
            } else {
                select.prop('selectedIndex', 0); // reset a "Seleccione un técnico"
            }
        });
    });
</script>
<script>
    function toggleFilters(button) {
        const dropdown = document.getElementById("filtersDropdown");

        dropdown.classList.toggle("show");
        button.classList.toggle("active");
    }
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const estadoModal = document.getElementById('estadoModal');

    estadoModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const solicitudId = button.getAttribute('data-id');
        const estado = button.getAttribute('data-estado');
        const userId = button.getAttribute('data-user');
        const motivo = button.getAttribute('data-motivo');

        // Campos del modal
        const estadoSelect = estadoModal.querySelector('#estado_select');
        const tecnicoField = estadoModal.querySelector('#tecnico_field');
        const tecnicoSelect = tecnicoField.querySelector('select');
        const motivoField = estadoModal.querySelector('#motivo_field');
        const motivoTextarea = estadoModal.querySelector('#motivo_textarea');

        // Reset
        estadoSelect.value = '';
        tecnicoSelect.value = '';
        motivoTextarea.value = '';
        tecnicoField.style.display = 'none';
        motivoField.style.display = 'none';

        // Set values
        estadoModal.querySelector('#estado_solicitud_id').value = solicitudId;
        if (estado === 'asignada' || estado === 'rechazada') {
            estadoSelect.value = estado;
        }

        if (estado === 'asignada') {
            tecnicoField.style.display = 'block';
            if (userId) tecnicoSelect.value = userId;
        }

        if (estado === 'rechazada') {
            motivoField.style.display = 'block';
            if (motivo) motivoTextarea.value = motivo;
        }
    });

    // Mostrar campos dinámicos al cambiar el estado
    document.getElementById('estado_select').addEventListener('change', function () {
        const selected = this.value;
        const tecnicoField = document.getElementById('tecnico_field');
        const motivoField = document.getElementById('motivo_field');

        tecnicoField.style.display = selected === 'asignada' ? 'block' : 'none';
        motivoField.style.display = selected === 'rechazada' ? 'block' : 'none';
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const guardarBtn = document.getElementById('guardarPrioridad');

        guardarBtn.addEventListener('click', function () {
            const solicitudId = document.getElementById('modalSolicitudId').value;
            const prioridad = document.getElementById('modalPrioridad').value;

            if (!prioridad || !solicitudId) {
                alert('Debe seleccionar una prioridad.');
                return;
            }

            fetch("{{ route('solicitudes.prioridad') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    solicitud_id: solicitudId,
                    prioridad: prioridad
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('prioridadModal'));
                    modal.hide();
                    location.reload(); // o actualiza dinámicamente si prefieres
                } else {
                    alert('No se pudo actualizar la prioridad.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error.');
            });
        });
    });
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
/* Botón personalizado */
.dropdown-container {
    position: relative;
    display: inline-block;
}

.filters-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 360px;
    padding: 16px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    z-index: 1000;
}

.filters-dropdown.show {
    display: block;
}

.filters-grid {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.filter-section label {
    font-weight: 600;
    display: block;
    margin-bottom: 0.5rem;
    color: #444;
}

.filter-section input,
.filter-section select {
    width: 100%;
    padding: 6px 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.filter-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
    margin-top: 1rem;
}

.apply-btn {
    background-color: #e06d2a;
    color: white;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    font-weight: 600;
}

.clear-btn {
    background-color: #f1f1f1;
    color: #444;
    padding: 6px 14px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    border: 1px solid #ccc;
}

.clear-btn:hover,
.apply-btn:hover {
    opacity: 0.9;
}
.dropdown-toggle {
    background-color: #e06d2a;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 6px 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;

    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: none;
}

.arrow {
    display: inline-block;
    margin-left: 6px;
    transition: transform 0.3s ease;
}

.dropdown-toggle.active .arrow {
    transform: rotate(180deg); /* flechita hacia arriba */
}


.dropdown-toggle:hover {
    background-color: #c75e20;
}
.dropdown-toggle::after {
    display: none !important;
    content: none !important;
}
.prioridad-check {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 6px;
}

.prioridad-check input[type="checkbox"] {
    width: 16px;
    height: 16px;
    accent-color: #e06d2a; /* Color principal */
    cursor: pointer;
}

.prioridad-check label {
    font-weight: 500;
    color: #444;
    margin: 0;
    cursor: pointer;
}
</style>


@if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            text: "{{ session('error') }}",
            toast: true,
            position: 'top-end',
            timer: 13000,
            showConfirmButton: false,
        });
    </script>
@endif

@if (Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            text: "{{ session('success') }}",
            toast: true,
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    </script>
@endif
</html>
