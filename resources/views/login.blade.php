<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Centro Dent</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('../../public/vendor/bootstrap/css/bootstrap.min.css') }}" />
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../images/logos/logo_s.png" width="180" alt="">
                                </a>
                                <!-- Formulario de Inicio de Sesión -->
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf <!-- Agrega el token CSRF -->

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            name="email" aria-describedby="emailHelp">
                                    </div>

                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            name="password">
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="true"
                                                name="remember">
                                            <label class="form-check-label text-dark">
                                                Recuerda este usuario
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5 mb-3 rounded-2">Sign
                                        In</button>

                                </form>

                                <!-- Enlace para alternar entre formularios -->
                                <p class="text-center mb-0">
                                    ¿No tienes una cuenta? <a href="#" id="toggleForm">Regístrate</a> </br>
                                    <a href="{{ route('landing') }}">Volver a la pagina de inicio</a>


                                </p>
                            </div>
                        </div>

                        <!-- Formulario de Registro (oculto inicialmente) -->
                        <div class="card mb-0" id="registerForm" style="display: none;">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">Registro</h5>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                    <!-- Campo de Usuario -->
                                    <div class="mb-3">
                                        <label for="exampleInputUsername" class="form-label">Usuario</label>
                                        <input type="text" class="form-control" id="exampleInputUsername"
                                            name="username">
                                    </div>

                                    <!-- Campo de Correo Electrónico -->
                                    <div class="mb-3">
                                        <label for="exampleInputEmail" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="exampleInputEmail"
                                            name="email">
                                    </div>

                                    <!-- Campo de Contraseña -->
                                    <div class="mb-3">
                                        <label for="exampleInputPassword" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="exampleInputPassword"
                                            name="password">
                                    </div>

                                    <!-- Campo de Confirmación de Contraseña -->
                                    <div class="mb-3">
                                        <label for="exampleInputPasswordConfirmation" class="form-label">Confirmar
                                            Contraseña</label>
                                        <input type="password" class="form-control"
                                            id="exampleInputPasswordConfirmation" name="password_confirmation">
                                    </div>

                                    <!-- Botón de Registro -->
                                    <button type="submit"
                                        class="btn btn-success w-100 py-2 fs-5 mb-3 rounded-2">Registrarse</button>
                                </form>

                                <!-- Enlace para alternar entre formularios -->
                                <p class="text-center mb-0">
                                    ¿Ya tienes una cuenta? <a href="#" id="toggleForm">Inicia Sesión</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para alternar entre formularios -->
    <script src="../libs/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle entre formularios
            $("#toggleForm").click(function() {
                $("#registerForm").toggle();
            });
        });
    </script>

    <!-- Otros scripts y enlaces -->
    <!-- ... -->

</body>

</html>
