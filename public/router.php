<?php
// Serve arquivos estáticos diretamente
if (php_sapi_name() === 'cli-server') {
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    
    // Se for um arquivo real (CSS, JS, imagem), serve o arquivo
    if (is_file($file)) {
        return false;
    }
    
    // Caso contrário, processa como rota
    $_GET['url'] = trim($_SERVER['REQUEST_URI'], '/');
}

require_once 'index.php';