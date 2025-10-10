<?php

class Book extends Model {
    protected $db;
    protected $table = 'livros';
    protected $id;
    protected $titulo;
    protected $autor;
    protected $ano_publicacao;
    protected $categoria_id;
    protected $disponivel;
    protected $isbn;

    public function __set($attr, $value) {
        if(property_exists($this, $attr)) {
            $this->attr = $value;
        }
    }

    public function __get($attr) {
        if(property_exists($this, $attr)) {
            return $this->$attr;
        }
        return null;
    }

    public function getAllBooks() {
        $sql = "SELECT b.*, c.nome AS categoria_nome 
                FROM " . $this->table . " b
                LEFT JOIN categorias c ON b.categoria_id = c.id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO $this->table (titulo, autor, categoria_id, descricao) VALUES (:titulo, :autor, :categoria_id, :descricao)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $data['titulo']);
        $stmt->bindParam(':autor', $data['autor']);
        $stmt->bindParam(':categoria_id', $data['categoria_id']);
        $stmt->bindParam(':descricao', $data['descricao']);
        return $stmt->execute();

    }
}