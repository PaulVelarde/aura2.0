<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #112541, #8a9cba);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-card .btn-primary {
            background-color: #26177a;
            border-color: #6a11cb;
        }

        .login-card .btn-primary:hover {
            background-color: #2575fc;
            border-color: #2575fc;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h2 class="text-center mb-4">Inicio de Sesión</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control"
                    placeholder="example@domain.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••"
                    required>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recordarme</label>
                </div>
                <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Iniciar Sesión</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
