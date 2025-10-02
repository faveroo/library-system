<?php

class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = $this->connect();
    }

    public function connect() {
        try {
            $pdo = new PDO(
                Config::getDSN(),
                Config::DB_USER,
                Config::DB_PASS,
                Config::getPDOOptions()
            );

            return $pdo;
        } catch (PDOException $e) {
            $this->handleConnectionError($e);
        }
    }

    private function handleConnectionError($e) {
        if(Config::DEBUG_MODE) {
            // Em desenvolvimento: mostra erro detalhado
            die("<h1>Erro na conexão com banco de dados</h1>
                 <p><strong>Mensagem:</strong> {$e->getMessage()}</p>
                 <p><strong>Arquivo:</strong> {$e->getFile()}</p>
                 <p><strong>Linha:</strong> {$e->getLine()}</p>");
        } else {
            // Em produção: loga erro e mostra mensagem genérica
            error_log("Database Error: " . $e->getMessage());
            die("Erro ao conectar com o banco de dados. Tente novamente mais tarde.");
        }
    }

      public function findAll($orderBy = 'id', $direction = 'ASC') {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY {$orderBy} {$direction}";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }
    
    public function findById($id) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }
    
    public function findWhere($conditions, $operator = 'AND') {
        try {
            $whereClauses = [];
            $params = [];
            
            foreach($conditions as $column => $value) {
                $whereClauses[] = "{$column} = :{$column}";
                $params[$column] = $value;
            }
            
            $whereString = implode(" {$operator} ", $whereClauses);
            $sql = "SELECT * FROM {$this->table} WHERE {$whereString}";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }
    
    public function create($data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            
            $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
            $stmt = $this->db->prepare($sql);
            
            if($stmt->execute($data)) {
                return $this->db->lastInsertId();
            }
            return false;
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }
    
    public function update($id, $data) {
        try {
            $setClauses = [];
            foreach(array_keys($data) as $column) {
                $setClauses[] = "{$column} = :{$column}";
            }
            $setString = implode(', ', $setClauses);
            
            $sql = "UPDATE {$this->table} SET {$setString} WHERE id = :id";
            $data['id'] = $id;
            
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }
    
    public function delete($id) {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }

    public function count($conditions = []) {
        try {
            if(empty($conditions)) {
                $sql = "SELECT COUNT(*) as total FROM {$this->table}";
                $stmt = $this->db->query($sql);
            } else {
                $whereClauses = [];
                $params = [];
                
                foreach($conditions as $column => $value) {
                    $whereClauses[] = "{$column} = :{$column}";
                    $params[$column] = $value;
                }
                
                $whereString = implode(' AND ', $whereClauses);
                $sql = "SELECT COUNT(*) as total FROM {$this->table} WHERE {$whereString}";
                
                $stmt = $this->db->prepare($sql);
                $stmt->execute($params);
            }
            
            $result = $stmt->fetch();
            return (int) $result->total;
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }

    protected function query($sql, $params = []) {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            $this->handleQueryError($e);
        }
    }
}