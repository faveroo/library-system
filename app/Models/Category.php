<?php

class Category extends Model {
    protected $db;

    public function __construct() {
        $this->db = (new Model())->connect();
    }

    public function getAllCategories() {
        $stmt = $this->db->prepare("SELECT id, nome FROM categorias ORDER BY nome");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}