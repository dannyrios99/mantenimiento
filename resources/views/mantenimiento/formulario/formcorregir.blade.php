<!DOCTYPE html>
<html lang="es">
<head>
    <title>Corregir Solicitud</title>
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
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @elseif (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5>Corregir Solicitud</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('solicitudes.guardarCorregida', $solicitud->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Hora de ingreso</label>
                                        <input type="time" name="hora_ingreso" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Hora de salida</label>
                                        <input type="time" name="hora_salida" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Observaciones</label>
                                        <textarea name="observaciones" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">¿Requirió repuesto?</label>
                                        <select class="form-select" name="requiere_repuesto" id="requiereRepuesto" required>
                                            <option value="no">No</option>
                                            <option value="si">Sí</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="facturaRepuestoGroup">
                                        <label class="form-label">Foto de la factura</label>
                                        <input type="file" name="foto_factura" class="form-control" accept="image/*">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Foto del trabajo realizado</label>
                                        <input type="file" name="foto_trabajo" class="form-control" accept="image/*" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Firma del encargado</label><br>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#firmaModal">Firmar</button>
                                        <input type="hidden" name="firma" id="firmaInput">
                                        <div id="firmaPreview" class="mt-2"></div>
                                    </div>

                                    <button type="submit" class="btn mt-3" style="background-color: #e06d2a; color: #fff;">Guardar corrección</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal firma -->
        <div class="modal fade" id="firmaModal" tabindex="-1" aria-labelledby="firmaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Firma del encargado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-center mb-3">
                        <canvas id="firmaCanvas" width="500" height="200" style="border:1px solid #ccc;"></canvas>
                        <div class="mt-3">
                            <button type="button" class="btn btn-danger btn-sm" onclick="limpiarFirma()">Limpiar</button>
                            <button type="button" class="btn btn-success btn-sm" onclick="guardarFirma()">Guardar Firma</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- /.page-container -->

    <script>
        // Mostrar factura si elige "Sí"
        document.getElementById('requiereRepuesto').addEventListener('change', function () {
            const group = document.getElementById('facturaRepuestoGroup');
            group.classList.toggle('d-none', this.value !== 'si');
        });

        // Firma canvas
        let canvas = document.getElementById("firmaCanvas");
        let ctx = canvas.getContext("2d");
        let isDrawing = false;

        canvas.onmousedown = e => {
            isDrawing = true;
            ctx.beginPath();
            ctx.moveTo(e.offsetX, e.offsetY);
        };
        canvas.onmousemove = e => {
            if (isDrawing) {
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.stroke();
            }
        };
        canvas.onmouseup = () => isDrawing = false;
        canvas.onmouseleave = () => isDrawing = false;

        function limpiarFirma() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        function guardarFirma() {
            const dataURL = canvas.toDataURL();
            document.getElementById('firmaInput').value = dataURL;
            document.getElementById('firmaPreview').innerHTML = `<img src="${dataURL}" style="max-width:200px;">`;
            bootstrap.Modal.getInstance(document.getElementById('firmaModal')).hide();
        }
    </script>
</body>
</html>
