<?php
/**
 * Controlador para a entidade Tarefa.
 * Responsável por receber as requisições do usuário, interagir com a camada de serviço
 * e determinar qual view será exibida.
 */
    class TarefaController {
        private $service;

        public function __construct() { #instância da camada de serviço
            $this->service = new TarefaService;
        }

        public function listar(){ #função que lista os objetos das tarefas na view
            $tarefas = $this->service->listar();
            include "view/tarefa/listar.php";
        }

    /**
     * Orquestra a criação de uma nova tarefa.
     * Este método lida com duas rotas: GET para mostrar o formulário,
     * e POST para processar os dados do formulário.
     */
        public function criar() { 
            // Verifica se a requisição foi feita via método POST (envio de formulário)
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                // Se for POST, envia os dados do formulário ($_POST) para a camada de serviço salvar.
                $this->service->salvar($_POST); 
                // Após salvar, redireciona o usuário de volta para a página de listagem.
                header ("Location: /lista-tarefas/tarefa/listar");
            } else {
                //Se não for POST (ou seja, GET), apenas exibe o formulário de criação em branco.
                $categoriaService = new CategoriaService();
                $categorias = $categoriaService->listar();
                include "view/tarefa/form.php";
            }
        }

        public function atualizarStatus() {
            if (isset($_POST['id']) && isset($_POST['status'])) {
                $id = $_POST['id'];
                $status = $_POST['status'];

                try {
                    $this->service->alterarStatus($id, $status);
                    header("Location: /lista-tarefas/tarefa/listar");
                    exit;
                } catch (Exception $e) {
                    echo "Erro: " . $e->getMessage();
                }
            }
        }

        public function excluir($id = null) { #função que exclui as tarefas
            if($id) {
                $this->service->excluir($id);
            }
            header("Location: /lista-tarefas/tarefa/listar");
        }
    }
?>