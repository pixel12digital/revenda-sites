<?php
// Template base para o painel Pixel12Digital
$page_title = $page_title ?? 'Título da Página';
$custom_header = $custom_header ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($page_title) ?> • Pixel12Digital</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="assets/style.css">
  <style>
  html body .painel-card {
    background: #f9f9fb !important;
    border-radius: 12px !important;
    box-shadow: 0 2px 12px #0001 !important;
    padding: 24px 20px !important;
    margin-bottom: 24px !important;
  }
  html body .painel-card h4 {
    color: #7c2ae8 !important;
    font-size: 1.1rem !important;
    margin-bottom: 12px !important;
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
  }
  html body .painel-card table {
    width: 100% !important;
    font-size: 0.98rem !important;
  }
  html body .painel-card td {
    padding: 4px 8px !important;
    border-bottom: 1px solid #ececec !important;
  }
  html body .painel-avatar {
    width: 56px !important; height: 56px !important;
    border-radius: 50% !important;
    background: #ede9fe !important;
    color: #7c2ae8 !important;
    font-size: 2rem !important;
    font-weight: bold !important;
    display: flex !important; align-items: center !important; justify-content: center !important;
    margin-right: 16px !important;
  }
  html body .painel-header {
    display: flex !important; align-items: center !important; gap: 16px !important; margin-bottom: 12px !important;
  }
  html body .painel-nome {
    font-size: 1.7rem !important; font-weight: bold !important; color: #7c2ae8 !important;
  }
  html body .painel-badge {
    display: inline-block !important; background: #e0e7ff !important; color: #3730a3 !important;
    border-radius: 6px !important; padding: 2px 10px !important; font-size: 0.85rem !important; margin-left: 8px !important;
  }
  @media (max-width: 900px) {
    html body .painel-grid { display: block !important; }
    html body .painel-card { margin-bottom: 18px !important; }
  }
  html body .painel-grid {
    display: grid !important;
    grid-template-columns: 1fr 1fr !important;
    gap: 24px !important;
  }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">
  <?php include 'menu_lateral.php'; ?>
  <main class="main-content">
    <!-- Header padrão -->
    <header class="bg-purple-700 text-white p-4 flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-6">
      <h1 class="text-2xl font-semibold flex-1"><?= htmlspecialchars($page_title) ?></h1>
      <?= $custom_header ?>
    </header>
    <!-- Conteúdo dinâmico -->
    <section class="p-4">
      <?php if (function_exists('render_content')) render_content(); ?>
    </section>
  </main>
</body>
</html> 