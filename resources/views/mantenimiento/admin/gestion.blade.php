<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestionar Usuarios</title>
    <link rel="icon" href="{{ asset('assets/images/LogoIco.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
</head>
<body>

<div class="page-container">
    @section('usuarios')
        class="active-page"
    @endsection

    @include('mantenimiento.layouts.sidebar')

    <div class="page-content">
        <div class="main-wrapper">
            <div class="row">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Gestión de Usuarios</h4>
                                    <button type="button" style="background-color: #e06d2a;  color: #fff;" class="btn mb-3" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">
                                        <i class="fas fa-user-plus"></i> Nuevo Usuario
                                    </button>
                                </div>
                                <div class="table-responsive mt-4">
                                    <table id="usuariosTable" class="table table-hover table-bordered align-middle" style="width:100%">
                                        <thead class="table-dark text-center">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Rol</th>
                                                <th>Fecha de creación</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($usuarios as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ $user->created_at->format('d/m/Y g:i a') }}</td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-start gap-2">
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal{{ $user->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $user->id }}">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </td>
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
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md"> <!-- Tamaño mediano -->
            <div class="modal-content">
                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-semibold" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body px-4">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nombre</label>
                            <input type="text" name="name" class="form-control rounded-3" required placeholder="Ej. Juan Pérez">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label fw-semibold">Rol</label>
                            <select name="role" class="form-select rounded-3" required>
                                <option value="">Seleccione un rol</option>
                                <option value="admin">Administrador</option>
                                <option value="mantenimiento">Tecnico</option>
                                <option value="lector">Lector</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Correo electrónico</label>
                            <input type="email" name="email" class="form-control rounded-3" required placeholder="ejemplo@correo.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Contraseña</label>
                            <input type="password" name="password" class="form-control rounded-3" required placeholder="********">
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-semibold">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control rounded-3" required placeholder="********">
                        </div>
                    </div>
                    <div class="modal-footer border-top px-4">
                        <button type="submit" style="background-color: #e06d2a;  color: #fff;" class="btn">Crear Usuario</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($usuarios as $user)
    <!-- Modal Editar Usuario -->
    <div class="modal fade" id="editarUsuarioModal{{ $user->id }}" tabindex="-1" aria-labelledby="editarUsuarioModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-semibold" id="editarUsuarioModalLabel{{ $user->id }}">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body px-4">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nombre</label>
                            <input type="text" name="name" class="form-control rounded-3" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label fw-semibold">Rol</label>
                            <select name="role" class="form-select rounded-3" required>
                                <option value="">Seleccione un rol</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                                <option value="mantenimiento" {{ $user->role === 'mantenimiento' ? 'selected' : '' }}>Técnico</option>
                                <option value="lector" {{ $user->role === 'lector' ? 'selected' : '' }}>Lector</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                            <input type="email" name="email" class="form-control rounded-3" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Contraseña (opcional)</label>
                            <input type="password" name="password" class="form-control rounded-3" placeholder="Dejar en blanco para no cambiar">
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-semibold">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control rounded-3" placeholder="********">
                        </div>
                    </div>
                    <div class="modal-footer border-top px-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" style="background-color: #e06d2a;  color: #fff;" class="btn">Actualizar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminar{{ $user->id }}" tabindex="-1" aria-labelledby="modalEliminarLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
                @csrf
                @method('DELETE')
                <div class="modal-content border-0 shadow-sm">
                    <div class="modal-header p-2">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i data-feather="alert-triangle" class="text-danger" style="width: 48px; height: 48px;"></i>
                        <p class="mt-2 mb-0">¿Estás seguro que deseas eliminar el usuario <strong>{{ $user->name }}</strong>?</p>
                        <small class="text-muted">Esta acción no se puede deshacer.</small>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#usuariosTable').DataTable({
                "order": [[2, 'desc']],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ entradas",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "search": "Buscar:",
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
        function confirmarEliminacion(userId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formEliminar' + userId).submit();
                }
            });
        }
    </script>

    @if (Session::has('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif

</body>
</html>
