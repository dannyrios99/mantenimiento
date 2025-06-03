<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    {{--     <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="../../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Theme Styles -->
    <link href="../../assets/css/main.min.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
</head>

<div class="page-header">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div class="" id="navbarNav">
            <ul class="navbar-nav" id="leftNav">
                <li class="nav-item">
                    <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                </li>
            </ul>
        </div>
        <div class="logo">
            <a class="navbar-brand" href=""></a>
        </div>
        <div class="" id="headerNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <?php use App\Models\User; ?> 
                    <a class="nav-link profile-dropdown" href="#" id="profileDropDown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="display: flex; align-items: center;">
                        
                        @auth
                            @php
                                $usuario = Auth::user();
                                $nombreCompleto = $usuario->name;
                                $palabras = explode(' ', $nombreCompleto);
                                $nombreAbreviado = count($palabras) > 1 ? $palabras[0] . ' ' . $palabras[1] : $palabras[0];
                            @endphp

                            <span style="color: #fff; margin-right: 8px;">{{ $nombreAbreviado }}</span>
                            <div style="background-color: #ffb900; width: 40px; height: 40px; border: 2px solid white; border-radius: 50%; font-size: 18px; color: white; display: flex; align-items: center; justify-content: center; text-transform: capitalize;">
                                {{ substr($nombreAbreviado, 0, 1) }}
                            </div>
                        @endauth
                    </a>

                    <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                        <a class="dropdown-item" href="#">
                            <i data-feather="user"></i> Perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}" style="padding: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i data-feather="log-out"></i> Salir
                            </button>
                        </form>
                    </div>

                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        @if (Auth::user()->role === 'admin')
            <li class="sidebar-title">
                INICIO
            </li>
            <li @yield('dashboard')>
                <a href="{{ route('dashboard') }}"><i data-feather="home"></i>Dashboard</a>
            </li>
            <li @yield('solicitudes')>
                <a href="{{ route('solicitudes.index') }}"><i data-feather="inbox"></i>Solicitudes</a>
            </li>
            <li class="sidebar-title">
                GESTION DE USUARIOS
            </li>
            <li @yield('usuarios')>
                <a href="{{ route('usuarios.index') }}"><i data-feather="users"></i>Usuarios</a>
            </li>
        @endif

        <li class="sidebar-title">
            MANTENIMIENTO
        </li>

        <li @yield('pendientes')>
            <a href="{{ route('pendientes.index') }}">
                <i data-feather="clock"></i>
                Pendientes
            </a>
        </li>

        <li @yield('corregidos')>
            <a href="{{ route('corregidos.index') }}">
                <i data-feather="check-circle"></i>
                Corregidos
            </a>
        </li>
    </ul>
</div>


<style>
    .dropdown-menu .dropdown-item {
        display: flex;
        align-items: center;
        gap: 6px; /* espacio entre ícono y texto */
        padding: 10px 15px;
        font-size: 14px;
    }
    .dropdown-item i {
        width: 20px;
        height: 20px;
        stroke-width: 2;
    }

    .dropdown-item.active,
    .dropdown-item:active {
        color: #e06d2a !important;
        background: 0 0;
    }

    .page-sidebar .accordion-menu>li.active-page ul li a.active {
        font-weight: 500;
        color: #3d3d3d !important;
    }
</style>

<script>
    var time;
    var logoutUrl = "{{ route('login') }}";// Genera la URL dinámica desde Laravel
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    function logout() {
        location.href = logoutUrl; // Usa la URL generada
    }

    function resetTimer() {
        clearTimeout(time);
        time = setTimeout(logout, 3600000); // 1 hora en milisegundos (3600000 ms)
    }
</script>



<!-- Javascripts -->
<script src="../../assets/plugins/jquery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
{{--     <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script> --}}
<script src="https://unpkg.com/feather-icons"></script>
<script src="../../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
<script src="../../assets/js/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="../../assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="../../assets/js/pages/dashboard.js"></script>
<!--   <script src="../../assets/js/pages/dashboard.js"></> -->
