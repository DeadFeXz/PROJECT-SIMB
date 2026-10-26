<?php
// includes/header.php 
$current_page = basename($_SERVER['PHP_SELF']);
$menu = [
  'index.php' => 'Beranda',
  'peta.php'  => 'Peta Wilayah',
  'berita.php' => 'Berita',
];
?>

<header class="navbar">
  <a href="index.php" class="brand">
    <img src="assets/img/sibanjir_logo.png" alt="Logo Si Banjir">
    <span>Si Banjir</span>
  </a>

  <nav class="nav-pills" aria-label="Navigasi utama">
    <?php foreach ($menu as $file => $nama):
      $aktif = ($current_page === $file) || ($file === 'peta.php' && $current_page === 'detail.php'); ?>
      <a href="<?= $file ?>" class="<?= $aktif ? 'active' : '' ?>"<?= $aktif ? ' aria-current="page"' : '' ?>><?= $nama ?></a>
    <?php endforeach; ?>
  </nav>

  
</header>