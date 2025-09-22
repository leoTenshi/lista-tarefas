<?php
/**
 * Classe de Acesso a Dados (DAO) para a entidade Tarefa.
 * Responsável por toda a comunicação com a tabela 'tarefas' no banco de dados.
 */

    class TarefaDAO {
        private $conn;

        public function __construct() {
            $this->conn = Database::dbConexao(); #recebe a conexão com o banco de dados
        }

        public function listar() { #função que lista todas as tarefas
            $stmt = $this->conn->query("SELECT t.*, u.nome AS usuario_nome 
            FROM tarefas t
            INNER JOIN usuarios u ON t.usuario_id = u.id"); #a variável stmt recebe uma consulta(query) SQL em formato de objeto PDOStatement(?)
            return $stmt->fetchAll(PDO::FETCH_CLASS, "Tarefa"); #retorna todos os dados em um array de objetos tipo Tarefa 
        }

        public function salvar (Tarefa $tarefa) { #funcao que recebe o um objeto tarefa e cria no banco de dados
            $stmt = $this->conn->prepare ("INSERT INTO tarefas (titulo, descricao, status, usuario_id, categoria_id) VALUES (?,?,?,?,?)"); #prepara o insert no bd
            $stmt->execute([ #executa o insert trocando os placeholders '?' pelos valores coletados
                $tarefa->titulo, 
                $tarefa->descricao, 
                $tarefa->status, 
                $tarefa->usuario_id, 
                $tarefa->categoria_id
            ]); 
        }

        public function atualizarStatus($id, $novoStatus) {
            $stmt = $this->conn->prepare("UPDATE tarefas SET status = :status WHERE id = :id");
            $stmt->bindParam(':status', $novoStatus);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        
        public function excluir ($id) { #função que recebe um id e apaga
            $stmt = $this->conn->prepare("DELETE FROM tarefas WHERE ID = ?"); #prepara o delete no bd
            $stmt->execute([$id]); #executa o delete trocando o placeholder '?' pelo valor da variavel $id
        }
    }
?>