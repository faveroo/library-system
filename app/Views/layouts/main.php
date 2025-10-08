<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['flash'])) {
    extract($_SESSION['flash']);
    unset($_SESSION['flash']);

    if (isset($status) && isset($type)) {
        echo '<div id="flash-message" class="alert alert-' . htmlspecialchars($type) . ' mt-3" role="alert" style="max-width:500px; margin:0 auto; position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">';
        echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8');
        echo '</div>';
    }
}
?>

<script>
  // Espera 4 segundos e depois remove suavemente o alerta
  setTimeout(() => {
    const alert = document.getElementById('flash-message');
    if (alert) {
      alert.style.transition = 'opacity 0.5s ease';
      alert.style.opacity = '0';
      setTimeout(() => alert.remove(), 250);
    }
  }, 1000); // tempo em milissegundos (4 segundos)
</script>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Biblioteca' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-light">
    <main>
        <?= $content ?> <!-- Aqui entra o conteúdo da view -->
    </main>
</body>
</html>
