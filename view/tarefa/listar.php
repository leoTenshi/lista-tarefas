<h1>Lista de Tarefas</h1>
<a href="/lista-tarefas/tarefa/criar">Nova Tarefa</a>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tarefas as $t): ?>
        <tr>
            <td><?= $t->titulo ?></td>
            <td><?= $t->descricao ?></td>
            <td>
                <form method="POST" action="/lista-tarefas/tarefa/atualizarStatus">
                    <input type="hidden" name="id" value="<?= $t->id ?>">
                    <select name="status" onchange="this.form.submit()">
                        <option value="pendente" <?= $t->status == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                        <option value="em_andamento" <?= $t->status == 'em_andamento' ? 'selected' : '' ?>>Em Andamento</option>
                        <option value="concluida" <?= $t->status == 'concluida' ? 'selected' : '' ?>>Concluída</option>
                    </select>
                </form>
            </td>
            <td><?= $t->usuario_nome ?></td>
            <td>
                <a href="/lista-tarefas/tarefa/excluir/<?= $t->id ?>">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>