<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Formulario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive section which can be used to form" name="description" />
    <meta content="Techzaa" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/LogoIco.png') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    @vite('resources/css/app.css')

    <!-- Style css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-50">
<div class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/imagenes/background.webp') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <section class="py-10 px-4 flex justify-center">
        <div class="w-full max-w-md">
            <div class="rounded-lg p-3 mb-4"> 
                <div class="w-full max-w-md mx-auto rounded-lg shadow-md overflow-hidden mb-6 bg-white">
                    <img src="{{ asset('assets/imagenes/ancizar.jpg') }}" alt="Encabezado" class="w-full h-auto object-cover">
                </div>

            <!-- 🟧 Bloque del personaje -->
            <div class="p-6 bg-white rounded-xl shadow-md mb-3"> 
                <div class="bg-white text-sm leading-relaxed">
                    <p class="mb-1">En caso de emergencia, ponte en contacto con nosotros.</p>
                    <p class="font-semibold mb-1">Llamadas y Whatsapp</p>
                    <ul class="space-y-3">
                        <li class="flex items-center justify-between mb-1">
                            <div>
                                <span class="font-bold">ING. DIXON JAIMES CAPACHO</span> – 316 356 2398
                            </div>
                            <a href="https://wa.me/573163562398" target="_blank" class="btn">
                                <img src="{{ asset('assets/imagenes/whatsapp.png') }}" alt="whatsapp">
                            </a>
                        </li>
                        <li class="flex items-center justify-between">
                            <div>
                                <span class="font-bold">LID TEC. LUIS CARLOS MENDOZA</span> – 318 713 0187
                            </div>
                            <a href="https://wa.me/573187130187" target="_blank" class="btn">
                                <img src="{{ asset('assets/imagenes/whatsapp.png') }}" alt="whatsapp">                                
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- ✅ FORMULARIO ahora dentro del mismo contenedor -->
            <div class="p-6 bg-white rounded-xl shadow-lg">
            <div class="mt-5">
                <div class="form">
                <div class="gap-4">
                            <form action="{{ route('solicitudes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="gap-4">
                                    <!-- Email -->
                                    <div class="mb-6">
                                        <label class="text-sm font-semibold text-gray-700">Correo electrónico</label>
                                        <input type="email" name="email" placeholder="Correo electrónico"
                                            class="block mt-2 w-full py-1.5 px-4 rounded-lg text-sm font-medium border border-gray-200 text-gray-700 focus:border-gray-300 focus:ring-transparent"
                                            required>
                                        <p class="text-red text-xs hidden">Por favor completa este campo.</p>
                                    </div>

                                    <!-- Sucursal -->
                                    <div class="w-full flex flex-col mb-6">
                                        <label class="text-sm font-semibold text-gray-700">Sucursal:</label>
                                        <select name="sucursal"
                                            class="py-1.5 px-4 mt-2 block w-full rounded-lg text-sm font-medium text-gray-700 border border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                            required>
                                            <option value="">Seleccione uno</option>
                                            <option>Almacén</option>
                                            <option>Avenida Libertador</option>
                                            <option>Buenavista BAQ</option>
                                            <option>Buenavista Santa Marta</option>
                                            <option>Carrera 51B</option>
                                            <option>Cartagena</option>
                                            <option>CC Único</option>
                                            <option>Hot Mall Plaza</option>
                                            <option>Miramar</option>
                                            <option>Montería</option>
                                            <option>Oficinas Prado</option>
                                            <option>Parque Washington</option>
                                            <option>Prado</option>
                                            <option>producción</option>
                                            <option>Rodadero</option>
                                            <option>Umi Mall Plaza</option>
                                            <option>Umi Plaza del Parque</option>
                                            <option>Villa Campestre</option>
                                            <option>Parque Alegra</option>
                                            <option>Cocina Oculta</option>
                                            <option>Poke Buns Mall Plaza</option>
                                            <option>Poke Buns Cocina Oculta</option>
                                            <option>Poke Buns Plaza del Parque</option>
                                            <option>Umi Sushi Bar Cartagena</option>
                                        </select>
                                    </div>

                                    <!-- Solicitado por -->
                                    <div class="w-full flex flex-col mb-6">
                                        <label class="text-sm font-semibold text-gray-700">Solicitud realizada por:</label>
                                        <select name="solicitado_por"
                                            class="py-1.5 px-4 mt-2 block w-full rounded-lg text-sm font-medium text-gray-700 border border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                            required>
                                            <option value="">Seleccione uno</option>
                                            <option>Administrador/Subadministrador PDV</option>
                                            <option>Gerente Operativo</option>
                                            <option>Dirección de Calidad</option>
                                            <option>Personal Operativo</option>
                                            <option>Analista SYSO</option>
                                            <option>Gerente de Alimentos y Bebidas</option>
                                            <option>Jefes de Cocina</option>
                                            <option>Personal oficinas</option>
                                            <option>Jefe de Producción</option>
                                        </select>
                                    </div>

                                    <!-- Encargado -->
                                    <div class="w-full flex flex-col mb-6">
                                        <label class="text-sm font-semibold text-gray-700">Nombre del encargado</label>
                                        <select name="encargado"
                                            class="py-1.5 px-4 mt-2 block w-full rounded-lg text-sm font-medium text-gray-700 border border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                            required>
                                            <option value="">Seleccione uno</option>
                                            <option>Lizeth Martinez</option>
                                            <option>Milton Camacho</option>
                                            <option>Yean Ladiño</option>
                                            <option>Juan Pinilla</option>
                                            <option>Angie Maestre</option>
                                            <option>Veronica Hernandez</option>
                                            <option>Claudia Rodriguez</option>
                                            <option>Rosmery Estrada</option>
                                            <option>Victor Vargas</option>
                                            <option>Yolima Orozco</option>
                                            <option>Zuleima Bolaño</option>
                                            <option>Yorjanys Diaz</option>
                                            <option>Victoria Franco</option>
                                            <option>Jorge Arias</option>
                                            <option>Sara Gutierrez</option>
                                            <option>Bianor Pedrozo</option>
                                            <option>Judith Quintero</option>
                                            <option>Hernando Quevedo</option>
                                            <option>Biany Romero</option>
                                            <option>Dayana Ruiz</option>
                                            <option>Jose Bustamante</option>
                                            <option>Daniel</option>
                                            <option>Yiseth Bohorquez</option>
                                            <option>Daniel De La Rosa</option>
                                            <option>Yeisy Rivera</option>
                                            <option>Margie Mandoza</option>
                                            <option>Luis Rojano</option>
                                            <option>Edgardo Gutierrez</option>
                                            <option>Ulises Trujillo</option>
                                            <option>Gustavo Martinez</option>
                                            <option>Miguel Mejia</option>
                                            <option>Giovanna Segura</option>
                                            <option>Jose Ortiz</option>
                                            <option>Zornellys Guerra</option>
                                            <option>Michael Pajaro</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>

                                    <!-- Área de afectación -->
                                    <div class="w-full flex flex-col mb-6">
                                        <label class="text-sm font-semibold text-gray-700">Seleccione área de afectación:</label>
                                        <select name="area_afectacion"
                                            class="py-1.5 px-4 mt-2 block w-full rounded-lg text-sm font-medium text-gray-700 border border-gray-200 focus:border-gray-300 focus:ring-transparent"
                                            required>
                                            <option value="">Seleccione uno</option>
                                            <option>Refrigeración (ENFRIADORES, GENERADORES DE HIELO, CONGELADORES...)</option>
                                            <option>Gases (HORNO PIZZA, PLANCHA, FREIDORA, PARRILLA, GRATINADORA...)</option>
                                            <option>Locativo (ILUMINACIÓN, MESAS, SILLAS, IMPERMEABILIZACIÓN, INTERRUPTORES, BAÑOS...)</option>
                                            <option>Electrodomésticos cocina (HORNO MICROONDAS, LICUADORA, GRAMERA, SANDUCHERA, ARROCERA...)</option>
                                            <option>Electrodomésticos (TV, VENTILADORES, SISTEMA DE AUDIOVISUAL...)</option>
                                        </select>
                                    </div>

                                    <!-- Descripción -->
                                    <div class="md:col-span-2 mb-6">
                                        <label class="text-sm font-semibold text-gray-700 py-2">
                                            Descripción detallada del problema o servicio de solicitud:
                                            <br>
                                            <strong class="text-gray-600">REGISTRE UNA SOLA NOVEDAD POR SOLICITUD</strong>
                                        </label>
                                        <textarea name="descripcion" required
                                            class="w-full h-28 mt-2 block bg-grey-lighter text-gray-700 border border-gray-200 rounded-lg py-4 px-4 focus:border-gray-300 focus:ring-transparent"
                                            placeholder="Describa el problema con detalle" spellcheck="false"></textarea>
                                    </div>

                                    <!-- Archivo -->
                                    <div class="md:col-span-2 mt-">
                                        <label class="text-sm font-semibold text-gray-700">
                                            Evidencia fotográfica:
                                            <br>
                                            <strong class="text-gray-600">
                                                (Ingrese foto del sector donde se ubique el daño o novedad.  
                                                Si envía foto de otra cosa su solicitud no será tomada en cuenta.)
                                            </strong>
                                        </label>

                                        <!-- Contenedor de agregar -->
                                        <div id="agregar_foto_dano" class="py-6 flex items-center justify-center rounded-lg border-2 border-dashed mt-2">
                                            <label class="cursor-pointer text-center">
                                                <i class="ti ti-cloud-download text-2xl"></i>
                                                <input 
                                                    type="file" 
                                                    name="archivo" 
                                                    accept="image/*" 
                                                    class="hidden" 
                                                    id="foto_dano_input"
                                                    onchange="mostrarVistaPrevia(this)">
                                                <p class="text-sm font-medium text-gray-500">Agregar archivo</p>
                                            </label>
                                        </div>

                                        <!-- Vista previa -->
                                        <div id="preview_foto_dano" class="mt-4 hidden text-center relative" style="position: relative;">
                                            <p class="text-sm text-gray-600 mb-2">Imagen seleccionada:</p>
                                            
                                            <!-- Botón de eliminar (X) -->
                                            <button 
                                                type="button"
                                                onclick="quitarVistaPrevia()" 
                                                class="position-absolute top-0 end-0 btn btn-sm btn-danger"
                                                style="z-index: 10; margin: 0.5rem; border-radius: 50%; width: 30px; height: 30px; line-height: 0;">
                                                &times;
                                            </button>
                                            <img src="#" id="preview_foto_dano_img" class="max-h-40 rounded border shadow mx-auto mt-2">
                                        </div>

                                        <!-- Observaciones -->
                                        <div class="mb-6">
                                            <label class="text-sm font-semibold text-gray-700">Observaciones:</label>
                                            <input type="text" name="observaciones" placeholder="Tu respuesta"
                                                class="block mt-2 w-full py-1.5 px-4 rounded-lg text-sm font-medium border border-gray-200 text-gray-700 focus:border-gray-300 focus:ring-transparent">
                                        </div>
                                    </div>

                                    <!-- Botones -->
                                    <div class="mt-5 flex items-center justify-end gap-3">
                                        <button type="reset"
                                            class="px-5 py-2 text-sm font-medium rounded-md text-gray-600 bg-gray-50 hover:bg-gray-100 transition-all duration-500">
                                            Cancelar
                                        </button>
                                        <button type="submit"
                                            class="px-5 py-2 text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 transition-all duration-500">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap 5 JS (Opcional, solo si usas modales, tooltips, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/preline/preline.js"></script>
</body>
<script>
function mostrarVistaPrevia(input) {
    const agregarContainer = document.getElementById('agregar_foto_dano');
    const previewContainer = document.getElementById('preview_foto_dano');
    const previewImage = document.getElementById('preview_foto_dano_img');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewContainer.classList.remove('hidden');
            agregarContainer.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function quitarVistaPrevia() {
    const input = document.getElementById('foto_dano_input');
    const agregarContainer = document.getElementById('agregar_foto_dano');
    const previewContainer = document.getElementById('preview_foto_dano');
    const previewImage = document.getElementById('preview_foto_dano_img');

    // Limpiar input y ocultar vista previa
    input.value = '';
    previewImage.src = '#';
    previewContainer.classList.add('hidden');
    agregarContainer.classList.remove('hidden');
}
</script>

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