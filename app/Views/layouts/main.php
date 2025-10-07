
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['flash'])) {
    extract($_SESSION['flash']);
    unset($_SESSION['flash']);
    if (isset($status) && isset($type)) {
        echo '<div class="alert alert-' . htmlspecialchars($type) . ' mt-3" role="alert" style="max-width:500px; margin:0 auto;">';
        echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8');
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
    <body class="bg-light">
    <main>
        <?= $content ?>  <!-- Aqui entra o conteúdo da view -->
    </main>
    </body>