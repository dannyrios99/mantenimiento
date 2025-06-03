<!DOCTYPE html>
<html lang="es">
<head>
    <title>Técnicos</title>
    <link rel="icon" href="{{ asset('assets/images/LogoIco.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="page-container">
        @section('tecnicos')
            class="active-page"
        @endsection

        @include('mantenimiento.layouts.sidebar')

        <div class="page-content">
            <div class="main-wrapper">
                <div class="row">

                    {{-- Tabla de técnicos existentes --}}
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Listado de Técnicos</h5>
                                    <button class="btn" style="background-color: #e06d2a;  color: #fff;" data-bs-toggle="modal" data-bs-target="#crearTecnicoModal">
                                        <i class="fas fa-plus"></i> Registrar Técnico
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tecnicosTable" class="table table-striped table-hover table-bordered align-middle" style="width:100%">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cédula</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tecnicos as $tecnico)
                                            <tr>
                                                <td>{{ $tecnico->nombre }}</td>
                                                <td>{{ $tecnico->cedula }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Registrar Técnico -->
        <div class="modal fade" id="crearTecnicoModal" tabindex="-1" aria-labelledby="crearTecnicoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('tecnicos.store') }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registrar Técnico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre completo</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" name="cedula" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn" style="background-color: #e06d2a;  color: #fff;">Guardar Técnico</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
</body>

<script>
    $(document).ready(function () {
        $('#tecnicosTable').DataTable({
            "order": [[0, 'asc']],
            "language": {
                "decimal": "",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "emptyTable": "No hay técnicos registrados",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ técnicos",
                "infoEmpty": "Mostrando 0 a 0 de 0 técnicos",
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

@if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            text: "{{ session('error') }}",
            toast: true,
            position: 'top-end',
            timer: 5000,
            showConfirmButton: false,
        });
    </script>
@endif
</html>
