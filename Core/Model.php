<?php

class Model {
    
    protected $db;
    
    public function __construct() {
        $this->db = $this->connect();
    }
    
    // Conexão com banco de dados
    protected function connect() {
        try {
            $pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASS
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

}