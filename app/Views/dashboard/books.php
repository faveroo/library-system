<?php $open = $_SESSION['flash']['open'] ?? 0; ?>

<!-- Botão para abrir o modal -->
<div class="container mt-4">
    <h1>Books Dashboard</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLivro">
        Cadastrar Livro
    </button>
</div>
<?php if(isset($books)): ?>
          <?php print_r($books); ?>
        <?php endif; ?>
<!-- Modal -->
<div class="modal fade" id="modalLivro" tabindex="-1" aria-labelledby="modalLivroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLivroLabel">Cadastrar Livro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form id="formLivro" method="POST" action="/book/create">
          <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>
          <div class="mb-3">
            <label for="autor" class="form-label">Autor:</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
          </div>
          <div class="mb-3">
                        <label for="category_id" class="form-label">Categoria</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">Selecione uma categoria</option>
                            <?php if(isset($categorias)): ?>
                                <?php foreach($categorias as $category): ?>
                                    <option value="<?= htmlspecialchars($category['id']) ?>">
                                        <?= htmlspecialchars($category['nome']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" form="formLivro" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS (necessário para o modal funcionar) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const open = <?= $open ?>;
    if (open) {
        const modalEl = document.getElementById('modalLivro');
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }
});
</script>
