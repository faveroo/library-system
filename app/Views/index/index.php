<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-light">
    <div class="alert alert-success d-flex align-items-center justify-content-center mt-3 shadow-sm rounded-pill" role="alert" style="max-width: 500px; margin: 0 auto;">
        <i class="bi bi-check-circle-fill me-2 fs-4"></i>
        <span><?= htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8') ?></span>
    </div>

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 60vh;">
        <div class="card shadow-lg p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <i class="fa fa-user-plus fa-3x text-primary mb-2"></i>
                <h2 class="h4 mb-0">Login</h2>
            </div>
            <form method="POST" action="/user/login">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Crie uma senha" required minlength="6">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-user-plus me-2"></i> Login
                </button>
            </form>
            <div class="text-center mt-3">
                <small>Não tem uma conta? <a href="/auth/register">Registre-se</a></small>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
