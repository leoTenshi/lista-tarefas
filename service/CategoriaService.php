<?php
class CategoriaService {
    private $dao;

    public function __construct() {
        $this->dao = new CategoriaDAO();
    }

    public function listar() {
        return $this->dao->listar();
    }
}
?>