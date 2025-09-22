<h1>Nova Tarefa</h1>
<form method="post">
    <label>Título: <input type="text" name="titulo" required></label><br>
    <label>Descrição: <textarea name="descricao"></textarea></label><br>
    <label>Usuário ID: <input type="number" name="usuario_id" required></label><br>
    
    <label>Categoria:
        <select name="categoria_id" required>
            <option value="">Selecione uma categoria</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= htmlspecialchars($categoria->id) ?>">
                    <?= htmlspecialchars($categoria->nome) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>

    <button type="submit">Salvar</button>
</form>