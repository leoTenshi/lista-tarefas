### Sistema de Lista de Tarefas (To-Do List)



Projeto de um sistema simples de lista de tarefas (To-Do List) desenvolvido em PHP puro, seguindo o padrão de arquitetura MVC (Model-View-Controller) com camadas adicionais de Serviço e DAO (Data Access Object).



Este projeto foi construído com o objetivo de estudar e aplicar os conceitos fundamentais do desenvolvimento web com PHP, autoload de classes, separação de responsabilidades e comunicação segura com banco de dados.



#### O sistema permite um CRUD completo de tarefas, dito isso é possível:



Criar uma tarefa - É adicionado um título, descrição, id do usuário e a categoria da tarefa(Estudo, Pessoal e Trabalho);



Listar todas as tarefas cadastradas - Mostra o título, descrição, status, nome do usuario e a opção de exclusão;



Alterar o status de uma tarefa entre pendente, em andamento e concluída - na tabela da view há um select com as opções;



Excluir uma tarefa existente.



#### Estrutura do projeto - formato MVC com as camadas adicionais Service e DAO.



/lista-tarefas/

├── controller/

│   └── TarefaController.php   # Camada de controle: orquestra as ações do usuário, no caso da criação de tarefas.

├── dao/

│   ├── CategoriaDAO.php       # Responsável pela comunicação com a tabela categorias.

│   └── TarefaDAO.php          # Responsável por toda comunicação com a tabela tarefas do banco de dados.

├── generic/

│   ├── autoload.php           # Carregador automático de classes

│   └── Database.php           # Conexão com o banco (Singleton)

├── model/

│   ├── Categoria.php          # Modelo de dados de uma categoria - criação dos atributos da classe Categoria.

│   └── Tarefa.php             # Modelo de dados de uma tarefa - criação dos atributos da classe Tarefa.

├── service/

│   ├── CategoriaService.php   # Regras de negócio de categorias - no caso apenas lista todas as categorias.

│   └── TarefaService.php      # Regras de negócio de tarefas - faz a ligação entre a camada de Controle e o DAO.

├── view/

│   └── tarefa/

│       ├── form.php           # View do formulário de criação

│       └── listar.php         # View da lista de tarefas

├── .htaccess                  # Regras de reescrita de URL

└── index.php                  # Ponto de Entrada (Front Controller)


O Controller recebe a requisição, aciona a Service, que valida e chama o DAO para interagir com o banco. A View exibe os dados ao usuário.


#### Como instalar e executar:



Dentro do repositório há o arquivo lista\_tarefas.sql, basta importá-lo no banco de dados MySql utilizando o xampp.



Tabelas Principais do Banco de Dados.



usuarios → usuários do sistema;

categorias → categorias de tarefas (Trabalho, Estudo, Pessoal);

tarefas → tarefas em si.



O servidor Apache também está sendo utilizado. Pode ser necessário realizar algumas configurações no arquivo httpd.conf, certifique-se que o módulo mod\_rewrite está ativado dentro do arquivo.



Acesso: Abra seu navegador e acesse http://localhost/lista-tarefas/.



Exemplos de Uso:



Criar nova tarefa:

Vá até /lista-tarefas/tarefa/criar, preencha o formulário e salve.



Alterar status:

Na listagem, use o <select> para trocar entre Pendente, Em Andamento e Concluída.



Excluir:

Clique em "Excluir" na linha correspondente da tabela.







Projeto desenvolvido para a disciplina Aplicações para Internet, utilizando PHP e o padrão MVC.
