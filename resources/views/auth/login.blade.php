<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('{{ asset('assets/imagenes/background.webp') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-wrapper {
            display: flex;
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .login-image {
            flex: 1;
            background: #ffe5b4;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-image img {
            max-width: 100%;
            height: 50%;
            height: auto;
            display: block;
        }

        .login-form {
            flex: 1;
            padding: 60px 40px;
            background-color: #fff;
        }

        .login-form h2 {
            color: #333;
            margin-bottom: 25px;
        }

        .login-form input {
            width: 100%;
            padding: 12px 16px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background: #f0f3f9;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 6px;
            line-height: 1; 
            color: #555;
            white-space: nowrap;
        }

        .checkbox-wrapper input[type="checkbox"] {
            margin: 0; /* elimina espacios adicionales */
        }

        .checkbox-wrapper label {
            font-size: 14px;
            color: #444;
        }


        .form-options a {
            color: #e7901e;
            text-decoration: none;
        }

        .login-form button {
            width: 100%;
            padding: 12px;
            background: #e7901e;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-form button:hover {
            background: #e06d2a;
        }

        .signup-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        @media (max-width: 400px) {
            .login-container {
                margin: 20px;
            }
        }
    </style>
</head>
<body>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ $errors->first() }}',
                toast: true,
                position: 'top-end',
                timer: 4000,
                showConfirmButton: false
            });
        </script>
    @endif

    <div class="login-wrapper">
        <!-- Columna izquierda: Imagen -->
        <div class="login-image">
            <img src="{{ asset('assets/imagenes/login.webp') }}" loading="eager" alt="Imagen de login">
        </div>

        <!-- Columna derecha: Formulario -->
        <div class="login-form">
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="name" name="name" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>

                <div class="form-options">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="showPassword">
                        <label for="showPassword">Mostrar Contraseña</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-link">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>
<script>
    document.getElementById('showPassword').addEventListener('change', function () {
        const passwordInput = document.querySelector('input[name="password"]');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
</script>
</body>
</html>
