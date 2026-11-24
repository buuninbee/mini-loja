<?php
// teste.php: confere o ambiente antes de começar.
// 1. a versão do PHP já tem a correção do PHP2Shell?
// 2. o SQLite está ligado?

// as primeiras versões corrigidas de cada série (21/10/2026)
$corrigidas = ['8.5' => '8.5.12', '8.4' => '8.4.27', '8.3' => '8.3.36', '8.2' => '8.2.35'];
$serie = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION;
$minima = $corrigidas[$serie] ?? null;
$phpOk = $minima !== null && version_compare(PHP_VERSION, $minima, '>=');

$sqliteOk = extension_loaded('pdo_sqlite');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ambiente · Mini Loja</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="topbar">
    <div class="topbar__inner topbar__inner--narrow">
      <a class="brand" href="index.html">Mini Loja</a>
      <nav class="nav" aria-label="Navegação principal">
        <a class="nav__link" href="index.html">Início</a>
        <a class="nav__link" href="cadastro.php">Produtos</a>
        <a class="nav__link" href="teste.php" aria-current="page">Ambiente</a>
      </nav>
    </div>
  </header>

  <main class="page page--narrow">
    <div class="page-header">
      <h1 class="page-title">Teste do ambiente</h1>
    </div>

    <section class="panel" aria-label="Verificações do servidor">
      <ul class="check-list">
        <li class="check-item">
          <div class="check-item__info">
            <span class="check-item__name">
              PHP<span class="check-item__version"><?= htmlspecialchars(PHP_VERSION, ENT_QUOTES, 'UTF-8') ?></span>
            </span>
            <p class="check-item__detail">
              <?= $phpOk
                ? 'Versão com a correção do PHP2Shell aplicada.'
                : 'Versão anterior à correção de outubro de 2026. Clique em Stop no Apache ao encerrar a aula.' ?>
            </p>
          </div>
          <span class="status-tag <?= $phpOk ? 'status-tag--ok' : 'status-tag--warn' ?>">
            <?= $phpOk ? 'Atualizado' : 'Desatualizado' ?>
          </span>
        </li>

        <li class="check-item">
          <div class="check-item__info">
            <span class="check-item__name">
              SQLite<span class="check-item__version">pdo_sqlite</span>
            </span>
            <p class="check-item__detail">
              <?= $sqliteOk
                ? 'Extensão ativa e pronta para gravar o banco local.'
                : 'Extensão desativada. Ative pdo_sqlite no php.ini e reinicie o Apache.' ?>
            </p>
          </div>
          <span class="status-tag <?= $sqliteOk ? 'status-tag--ok' : 'status-tag--danger' ?>">
            <?= $sqliteOk ? 'Ligado' : 'Desligado' ?>
          </span>
        </li>
      </ul>
    </section>

    <div class="home-actions">
      <?php if ($sqliteOk): ?>
        <a class="btn btn--primary" href="cadastro.php">Ver os produtos</a>
      <?php endif; ?>
      <a class="btn btn--secondary" href="index.html">Voltar ao início</a>
    </div>
  </main>
</body>
</html>
