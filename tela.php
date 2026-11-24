<?php // tela.php: a VISÃO. Só o HTML; as variáveis vêm do cadastro.php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Produtos · Mini Loja</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="topbar">
    <div class="topbar__inner">
      <a class="brand" href="index.html">Mini Loja</a>
      <nav class="nav" aria-label="Navegação principal">
        <a class="nav__link" href="index.html">Início</a>
        <a class="nav__link" href="cadastro.php" aria-current="page">Produtos</a>
        <a class="nav__link" href="teste.php">Ambiente</a>
      </nav>
    </div>
  </header>

  <main class="page">
    <div class="page-header">
      <h1 class="page-title">Produtos</h1>
    </div>

    <div class="stack">
      <section class="panel<?= $produto ? ' panel--editing' : '' ?>" aria-labelledby="form-heading">
        <div class="panel__head">
          <h2 class="panel__title" id="form-heading"><?= $produto ? 'Editar produto' : 'Novo produto' ?></h2>
          <?php if ($produto): ?>
            <span class="panel__meta">#<?= (int) $produto['id'] ?></span>
          <?php endif; ?>
        </div>

        <div class="panel__body">
          <form class="form-grid" method="post" action="cadastro.php">
            <!-- o id escondido diz ao controle qual produto editar (vazio = produto novo) -->
            <input type="hidden" name="id" value="<?= $produto ? (int) $produto['id'] : '' ?>">

            <div class="field">
              <label class="field__label" for="nome">Nome</label>
              <input
                class="input"
                id="nome"
                name="nome"
                placeholder="Ex.: Sensor DHT11"
                required
                value="<?= htmlspecialchars($produto['nome'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
              >
            </div>

            <div class="field">
              <label class="field__label" for="preco">Preço (R$)</label>
              <input
                class="input input--mono"
                id="preco"
                name="preco"
                type="number"
                step="0.01"
                min="0"
                placeholder="39.90"
                required
                value="<?= $produto['preco'] ?? '' ?>"
              >
            </div>

            <div class="form-actions">
              <button class="btn btn--primary" type="submit"><?= $produto ? 'Salvar alterações' : 'Cadastrar' ?></button>
              <?php if ($produto): ?>
                <a class="btn btn--secondary" href="cadastro.php">Cancelar</a>
              <?php endif; ?>
            </div>
          </form>
        </div>
      </section>

      <section class="panel" aria-labelledby="catalog-heading">
        <div class="panel__head">
          <h2 class="panel__title" id="catalog-heading">Catálogo</h2>
          <span class="panel__meta"><?= count($produtos) ?> <?= count($produtos) === 1 ? 'item' : 'itens' ?></span>
        </div>

        <?php if (count($produtos) === 0): ?>
          <div class="empty-state">
            <p class="empty-state__title">Nenhum produto cadastrado</p>
            <p class="empty-state__text">Preencha o formulário acima para adicionar o primeiro item.</p>
          </div>
        <?php else: ?>
          <div class="table-wrap">
            <table class="catalog-table">
              <thead>
                <tr>
                  <th scope="col">Produto</th>
                  <th scope="col" class="col-price">Preço</th>
                  <th scope="col" class="col-actions">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($produtos as $item): ?>
                  <?php $editando = $produto && (int) $produto['id'] === (int) $item['id']; ?>
                  <tr<?= $editando ? ' class="is-selected"' : '' ?>>
                    <td class="col-name"><?= htmlspecialchars($item['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="col-price">R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                    <td class="col-actions">
                      <div class="row-actions">
                        <a class="btn btn--ghost btn--sm" href="cadastro.php?editar=<?= (int) $item['id'] ?>">Editar</a>
                        <form class="inline-form" method="post" action="cadastro.php">
                          <button class="btn btn--danger-ghost btn--sm" name="excluir" value="<?= (int) $item['id'] ?>">Excluir</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </section>
    </div>
  </main>
</body>
</html>
