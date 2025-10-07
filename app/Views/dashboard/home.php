<?php if (isset($status) && isset($type)) { ?>
  <div class="alert alert-<?= htmlspecialchars($type) ?> mt-3" role="alert" style="max-width: 500px; margin: 0 auto;">
    <i class="fa fa-info-circle me-2"></i>
    <span><?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?></span>
  </div>
<?php } ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/profile">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user/sair">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>