    <div class="container min-vh-100 d-flex align-items-center">
  <div class="row w-100 justify-content-center">

    <!-- Coluna Login -->
    <div class="col-md-5 bg-danger text-white p-5 rounded shadow">
      <h2 class="mb-4 fw-bold">Login</h2>
      <form action="auth/login" method="POST">
        
        <!-- Email -->
        <div class="mb-3">
          <label for="loginEmail" class="form-label">E-mail</label>
          <div class="input-group">
            <span class="input-group-text">@</span>
            <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Digite seu e-mail" required>
            <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
          </div>
        </div>

        <div class="mb-3">
          <label for="loginPassword" class="form-label">Senha</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Digite sua senha" required>
            <div class="invalid-feedback">A senha é obrigatória.</div>
          </div>
        </div>

        <input type="submit" class="btn btn-light w-100 fw-bold shadow-sm" value="Logar">
      </form>
    </div>

    <!-- Coluna Registrar -->
    <div class="col-md-5 bg-success text-white p-5 rounded shadow ms-md-3 mt-4 mt-md-0">
      <h2 class="mb-4 fw-bold">Registrar</h2>
      <form action="auth/register" method="POST">

        <!-- Nome -->
        <div class="mb-3">
          <label for="regNome" class="form-label">Nome completo</label>
          <input type="text" class="form-control" id="regNome" name="nome" placeholder="Digite seu nome" required>
          <div class="invalid-feedback">O nome é obrigatório.</div>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="regEmail" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="regEmail" name="email" placeholder="Digite seu e-mail" required>
          <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
        </div>

        <!-- Senha -->
        <div class="mb-3">
          <label for="regPassword" class="form-label">Senha</label>
          <input type="password" class="form-control" id="regPassword" name="password" placeholder="Crie uma senha" required>
          <div class="invalid-feedback">A senha é obrigatória.</div>
        </div>

        <!-- Botão -->
        <input type="submit" class="btn btn-light w-100 fw-bold shadow-sm" value="Registrar">
      </form>
    </div>

  </div>
</div>

</body>
</html>