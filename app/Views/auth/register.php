 <div class="container d-flex align-items-center justify-content-center" style="min-height: 70vh;">
        <div class="card shadow-lg p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <i class="fa fa-user-plus fa-3x text-primary mb-2"></i>
                <h2 class="h4 mb-0">Criar Conta</h2>
            </div>
            <form method="POST" action="/auth/register">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Seu nome completo" required value="<?php echo $old['name'] ?? "" ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required value="<?php echo $old['email'] ?? "" ?> " <?= isset($autofocus) && $autofocus === 'email' ? 'autofocus onfocus="this.select()"' : '' ;?>>
                    </div>
                </div>
                <?php if (isset($status) && isset($type)) { ?>
                    <div class="alert alert-<?= htmlspecialchars($type) ?> mb-4">
                        <i class="fa fa-exclamation-circle"></i> <?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Crie uma senha" required minlength="8">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-user-plus me-2"></i> Registrar
                </button>
            </form>

            <div class="text-center mt-3">
                <small>Já tem uma conta? <a href="/home/index">Entrar</a></small>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

