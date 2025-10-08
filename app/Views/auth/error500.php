<?php
if(isset($_SESSION['flash'])) {
    unset($_SESSION['flash']);
}
$voltar = $_SESSION['ultima_rota'] ?? '/';
unset($_SESSION['ultima_rota']);
?>

<div class="container text-center mt-5">
    <h1 class="display-4 text-danger">Erro Interno</h1>
    <p class="lead">Desculpe, algo deu errado.</p>
    <a href="<?= htmlspecialchars($voltar) ?>" class="btn btn-outline-danger mt-3">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
</div>
