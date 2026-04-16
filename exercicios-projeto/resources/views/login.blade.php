<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .login-card {
        border: none;
        border-radius: 1rem;
    }
</style>

</head>
<body>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-5 col-lg-4">

    <div class="card login-card shadow-lg p-4">
        <div class="card-body">
            
            <h3 class="text-center mb-4 fw-bold">Login</h3>

            <form method="POST" action="/login">
                @csrf

                <!-- Email -->
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">E-mail</label>
                </div>

                <!-- Password -->
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Senha" required>
                    <label for="password">Senha</label>
                </div>

                <!-- Remember -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Lembrar-me</label>
                </div>

                <!-- Button -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Entrar
                    </button>
                </div>

                <!-- Links -->
                <div class="text-center">
                    <a href="#" class="text-decoration-none small">Esqueceu a senha?</a>
                </div>

            </form>

        </div>
    </div>

    <div class="text-center mt-3 text-white">
        <small>© 2026 Sistema</small>
    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
