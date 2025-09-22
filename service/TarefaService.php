<?php 
/**
 * Camada de Serviço para a entidade Tarefa.
 * Contém as regras de negócio e faz a ponte entre o Controller e o DAO.
 */

    class TarefaService {
        private $dao;

        public function __construct() {
            $this->dao = new TarefaDAO(); //variável dao recebe uma instancia da classe TarefaDAO
        }

        public function listar() { 
            return $this->dao->listar();
        }

        public function salvar($dados) { #função que recebe um array associativo e joga os dados para o nosso objeto
            $tarefa = new Tarefa(); #instancia um objeto da classe Tarefa/model
            $tarefa-> titulo = $dados['titulo'];
            $tarefa-> descricao = $dados['descricao'];
            $tarefa-> status = "pendente"; 
            $tarefa-> usuario_id = $dados['usuario_id'];
            $tarefa-> categoria_id = $dados['categoria_id'];
            $this->dao->salvar($tarefa);
        }

        public function alterarStatus($id, $novoStatus) {
            return $this->dao->atualizarStatus($id, $novoStatus);
        }

        public function excluir($id) { #função que recebe um id e apaga o objeto tarefa
            $this-> dao-> excluir($id);
        }
    }
?>
