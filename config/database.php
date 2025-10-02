<?php

class Config {
    
    // Banco de Dados
    const DB_DRIVER   = 'mysql';
    const DB_HOST     = 'localhost';
    const DB_PORT     = '3306';
    const DB_NAME     = 'library_system';
    const DB_USER     = 'root';
    const DB_PASS     = '';
    const DB_CHARSET  = 'utf8mb4';
    
    // Aplicação
    const APP_NAME    = 'Sistema de Biblioteca';
    const BASE_URL    = 'http://localhost/library-system/';
    const APP_ENV     = 'development';
    const DEBUG_MODE  = true;
    const TIMEZONE    = 'America/Sao_Paulo';
    
    // Caminhos
    const PATH_ROOT   = __DIR__ . '/../';
    const PATH_APP    = __DIR__ . '/../app/';
    const PATH_PUBLIC = __DIR__ . '/../public/';
    const PATH_VIEWS  = __DIR__ . '/../app/views/';
    
    // Segurança
    const SESSION_LIFETIME = 7200; // 2 horas em segundos
    const PASSWORD_ALGO    = PASSWORD_BCRYPT;
    const PASSWORD_COST    = 12;
    
    // Upload de Arquivos
    const UPLOAD_MAX_SIZE = 5242880; // 5MB em bytes
    const UPLOAD_PATH     = __DIR__ . '/../public/uploads/';
    const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'pdf'];
    
    // Email (para futuro)
    const MAIL_HOST     = 'smtp.gmail.com';
    const MAIL_PORT     = 587;
    const MAIL_USERNAME = 'seu-email@gmail.com';
    const MAIL_PASSWORD = 'sua-senha';
    const MAIL_FROM     = 'noreply@biblioteca.com';
    
    // Paginação
    const ITEMS_PER_PAGE = 10;
    
    // Empréstimos
    const LOAN_DAYS      = 14; // Dias padrão de empréstimo
    const FINE_PER_DAY   = 2.00; // Multa por dia de atraso
    const MAX_LOANS      = 3; // Máximo de livros por usuário
    
    /**
     * Retorna DSN para conexão PDO
     */
    public static function getDSN() {
        return sprintf(
            "%s:host=%s;port=%s;dbname=%s;charset=%s",
            self::DB_DRIVER,
            self::DB_HOST,
            self::DB_PORT,
            self::DB_NAME,
            self::DB_CHARSET
        );
    }
    
    /**
     * Retorna opções PDO
     */
    public static function getPDOOptions() {
        return [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    }
}