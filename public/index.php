<?php

require_once '../config/database.php';

date_default_timezone_set(Config::TIMEZONE);

if(session_status() === PHP_SESSION_NONE) {
    
    // Configurações de segurança da sessão
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_lifetime', Config::SESSION_LIFETIME);
    session_start();
    
    // Regenera ID da sessão periodicamente para segurança
    if(!isset($_SESSION['initiated'])) {
        session_regenerate_id(true);
        $_SESSION['initiated'] = true;
        $_SESSION['created_at'] = time();
    }
    
    // Verifica timeout da sessão
    if(isset($_SESSION['created_at']) && 
       (time() - $_SESSION['created_at'] > Config::SESSION_LIFETIME)) {
        session_unset();
        session_destroy();
        session_start();
    }
}


// Carrega o core
require_once '../core/Router.php';
require_once '../core/Controller.php';
require_once '../core/Model.php';

function url($path = '') {
    return Config::url($path);
}

function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function redirect($path = '') {
    header('Location: ' . url($path));
    exit;
}

function isAuthenticated() {
    return isset($_SESSION['user_id']);
}

try {
    // Cria instância do Router e processa a requisição
    $app = new Router();
    
} catch(Exception $e) {
    // Captura erros não tratados
    if(Config::DEBUG_MODE) {
        die("<h1>Erro Fatal</h1>
             <p><strong>Mensagem:</strong> {$e->getMessage()}</p>
             <p><strong>Arquivo:</strong> {$e->getFile()}</p>
             <p><strong>Linha:</strong> {$e->getLine()}</p>
             <pre>{$e->getTraceAsString()}</pre>");
    } else {
        error_log("Fatal Error: " . $e->getMessage());
        die("Ocorreu um erro inesperado. Por favor, tente novamente mais tarde.");
    }
}