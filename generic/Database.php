<?php 
/**
 * Cria o singleton e fornece a conexão PDO
 */
    
    class Database {
        private static $instance; #propriedade/atributo de instancia da conexao

        private function __construct(){
            #construtor privado que impede novas instâncias
        }

        public static function dbConexao() { #funcao da conexao ao bd
            if (!isset(self::$instance)) { #se NÃO houver uma conexão ela é criada
                self::$instance = new PDO ("mysql:host=localhost;dbname=lista_tarefas", "root", ""); #conexão com o banco de dados
                self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #se der erro o sistema para, possibilita tratamento de erros
            }
            return self::$instance; #retorna a conexao do banco
        }
    }
?>