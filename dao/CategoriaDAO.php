<?php
class CategoriaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::dbConexao();
    }

    /**
     * Busca e retorna todas as categorias do banco de dados.
     * Um array de objetos da classe Categoria.
     */
    public function listar() {
        $stmt = $this->conn->query("SELECT * FROM categorias ORDER BY nome ASC");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Categoria");
    }
}
?>