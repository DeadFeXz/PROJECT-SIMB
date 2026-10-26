<?php
// berita.php
$judul_halaman = "Berita Banjir Terkini";

// ==========================================
// DATA BERITA (EDIT DI SINI SAJA)
// ==========================================
$berita_data = [
  // Berita Utama (Otomatis masuk ke kotak besar paling atas)
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  // Berita Sidebar (4 berita teratas di sebelah kanan)
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  
 
  // Berita Grid (6 berita di bagian bawah "Semua Berita")
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
    'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
  [
   'judul' => 'Judul',
    'tanggal' => 'tanggal',
    'sumber' => 'sumber',
    'provinsi' => 'pronvinsi',
    'gambar' => 'assets/img/',
    'ringkasan' => 'ringkasan',
    'url' => 'detail.php'
  ],
];

// Memisahkan Data
$berita_utama = $berita_data[0]; // Berita paling atas
$berita_sidebar = array_slice($berita_data, 1, 4); // 4 berita untuk sidebar
$berita_grid = array_slice($berita_data, 5); // Sisanya masuk ke grid bawah
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Si Banjir - <?php echo $judul_halaman; ?></title>
  <link rel="icon" type="image/png" href="assets/img/sibanjir_logo.png">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <style>
    /* =========================================
       ROOT & RESET
       ========================================= */
    :root {
      --navy: #0F2C46;
      --primary-blue: #266B9D;
      --primary-blue-hover: #1C547B;
      --dark-blue: #0F2C46;
      --bg-light: #F5F8FA;
      --bg-white: #FFFFFF;
      --text-dark: #1F2937;
      --text-gray: #4B5563;
      --text-light: #9CA3AF;
      --border-color: #E5E7EB;
      --accent-red: #E85D3F;
      --font-family: 'Plus Jakarta Sans', sans-serif;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: var(--font-family);
      color: var(--text-dark);
      line-height: 1.6;
      background-color: var(--bg-light);
      -webkit-font-smoothing: antialiased;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    a { text-decoration: none; color: inherit; }

    /* =========================================
       NAVBAR
       ========================================= */
    .skip { position: absolute; left: -999px; top: 8px; background: var(--bg-white); padding: 8px 14px; border-radius: 8px; z-index: 2000; text-decoration: none; color: var(--text-dark); }
    .skip:focus { left: 8px; }
    
    .navbar { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; padding: 14px 40px; background: rgba(255, 255, 255, 0.96); backdrop-filter: blur(10px); border-bottom: 1px solid var(--border-color); position: sticky; top: 0; z-index: 1000; }
    .brand { display: flex; align-items: center; gap: 10px; justify-self: start; text-decoration: none; }
    .brand img { height: 40px; width: auto; }
    .brand span { font-size: 22px; font-weight: 800; color: var(--dark-blue); letter-spacing: -.5px; }
    
    .nav-pills { display: flex; gap: 6px; background: var(--bg-light); border: 1px solid var(--border-color); border-radius: 30px; padding: 6px; }
    .nav-pills a { padding: 10px 22px; border-radius: 24px; font-size: 14px; font-weight: 600; color: var(--text-gray); transition: background .2s, color .2s; text-decoration: none; }
    .nav-pills a:hover { background: var(--bg-white); color: var(--primary-blue); }
    .nav-pills a.active { background: var(--primary-blue); color: var(--bg-white); }
    
    .btn-emergency { justify-self: end; background: #B4351B; color: var(--bg-white); font-size: 14px; font-weight: 700; padding: 12px 20px; border-radius: 10px; text-decoration: none; transition: background 0.2s; }
    .btn-emergency:hover { background: #962B16; }

    /* =========================================
       HERO HEADER
       ========================================= */
    .page-header { background-color: var(--primary-blue); color: white; padding: 50px 40px; }
    .page-header-container { max-width: 1200px; margin: 0 auto; }
    .page-header h1 { font-size: 32px; font-weight: 700; margin-bottom: 8px; }
    .page-header p { font-size: 15px; color: #E0F0FA; }

    /* =========================================
       MAIN CONTAINER
       ========================================= */
    .main-container { max-width: 1200px; margin: 40px auto; padding: 0 40px; flex: 1; }

    /* =========================================
       BERITA UTAMA
       ========================================= */
    .hero-news-layout { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 60px; }
    .hero-news-card { background: var(--bg-white); border-radius: 12px; overflow: hidden; border: 1px solid var(--border-color); display: flex; flex-direction: column; }
    .hero-news-image { width: 100%; height: 320px; background-color: #D1E3F0; display: flex; align-items: center; justify-content: center; color: var(--text-gray); font-size: 14px; font-style: italic; overflow: hidden; }
    .hero-news-image img { width: 100%; height: 100%; object-fit: cover; }
    .hero-news-content { padding: 32px; }
    .badge-terkini { display: inline-block; background-color: var(--primary-blue); color: white; font-size: 11px; font-weight: 700; letter-spacing: 1px; padding: 4px 12px; border-radius: 999px; margin-bottom: 16px; text-transform: uppercase; }
    .hero-news-title { font-size: 28px; font-weight: 800; line-height: 1.3; color: var(--text-dark); margin-bottom: 12px; }
    .hero-news-meta { font-size: 13px; color: var(--text-light); margin-bottom: 16px; }
    .hero-news-excerpt { font-size: 15px; color: var(--text-gray); margin-bottom: 24px; line-height: 1.7; }
    .btn-primary { display: inline-block; background-color: var(--primary-blue); color: white; padding: 12px 24px; border-radius: 8px; font-size: 14px; font-weight: 600; transition: background 0.2s; border: none; cursor: pointer; }
    .btn-primary:hover { background-color: var(--primary-blue-hover); }

    /* =========================================
       SIDEBAR
       ========================================= */
    .sidebar-news { background: var(--bg-white); border-radius: 12px; border: 1px solid var(--border-color); padding: 24px; }
    .sidebar-title { font-size: 18px; font-weight: 700; color: var(--text-dark); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color); }
    .sidebar-item { padding: 16px 0; border-bottom: 1px solid var(--border-color); }
    .sidebar-item:last-child { border-bottom: none; padding-bottom: 0; }
    .badge-provinsi { display: inline-block; background-color: #EBF3F9; color: var(--primary-blue); font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 4px; margin-bottom: 8px; }
    .sidebar-item-title { font-size: 14px; font-weight: 700; color: var(--primary-blue); margin-bottom: 6px; line-height: 1.4; text-decoration: underline; text-decoration-color: transparent; transition: text-decoration-color 0.2s; }
    .sidebar-item-title:hover { text-decoration-color: var(--primary-blue); }
    .sidebar-item-meta { font-size: 12px; color: var(--text-light); }

    /* =========================================
       SEMUA BERITA
       ========================================= */
    .section-header-news { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px; }
    .section-header-news h2 { font-size: 24px; font-weight: 800; color: var(--text-dark); }
    .filter-group { display: flex; align-items: center; gap: 12px; font-size: 14px; color: var(--text-gray); }
    .filter-select, .filter-input { padding: 8px 12px; border: 1px solid var(--border-color); border-radius: 6px; font-family: inherit; font-size: 14px; color: var(--text-dark); outline: none; background-color: var(--bg-white); cursor: pointer; }
    .filter-select:focus, .filter-input:focus { border-color: var(--primary-blue); }
    
    .news-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 40px; }
    .news-card { background: var(--bg-white); border-radius: 12px; overflow: hidden; border: 1px solid var(--border-color); transition: transform 0.2s, box-shadow 0.2s; display: flex; flex-direction: column; }
    .news-card:hover { transform: translateY(-4px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .news-card-image { width: 100%; height: 180px; background-color: #D1E3F0; display: flex; align-items: center; justify-content: center; color: var(--text-gray); font-size: 13px; font-style: italic; overflow: hidden; }
    .news-card-image img { width: 100%; height: 100%; object-fit: cover; }
    .news-card-content { padding: 20px; display: flex; flex-direction: column; flex: 1; }
    .news-card-title { font-size: 16px; font-weight: 700; color: var(--text-dark); margin-bottom: 8px; line-height: 1.4; }
    .news-card-meta { font-size: 12px; color: var(--text-light); margin-bottom: 12px; }
    .news-card-excerpt { font-size: 13px; color: var(--text-gray); line-height: 1.5; margin-bottom: 0; }

    /* =========================================
       PAGINATION
       ========================================= */
    .pagination { display: flex; justify-content: center; gap: 8px; margin-bottom: 60px; }
    .page-btn { padding: 8px 16px; border: 1px solid var(--border-color); background: var(--bg-white); border-radius: 6px; font-size: 14px; font-weight: 500; color: var(--text-dark); cursor: pointer; transition: all 0.2s; }
    .page-btn:hover { border-color: var(--primary-blue); color: var(--primary-blue); }
    .page-btn.active { background: var(--primary-blue); color: white; border-color: var(--primary-blue); }
    .page-btn.disabled { color: var(--text-light); cursor: not-allowed; background: #F8FAFC; }
    .page-btn.disabled:hover { border-color: var(--border-color); color: var(--text-light); }

    /* =========================================
       FOOTER SUMBER
       ========================================= */
    .source-footer { border-top: 1px solid var(--border-color); padding: 24px 40px; font-size: 13px; color: var(--text-gray); background: var(--bg-light); }
    .source-footer-container { max-width: 1200px; margin: 0 auto; }

    /* =========================================
       FOOTER UTAMA (WARNA PRIMARY BLUE)
       ========================================= */
    .footer { background-color: var(--primary-blue); color: white; padding: 64px 40px 24px; }
    .footer-inner { max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 40px; margin-bottom: 64px; }
    .footer-col h4 { font-size: 12px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #A5C9E5; margin-bottom: 16px; }
    .footer-brand { font-size: 20px; font-weight: 700; margin-bottom: 16px; display: block; color: white; }
    .footer-desc { font-size: 13px; color: #E0F0FA; line-height: 1.6; margin-bottom: 24px; }
    .footer-tags { display: flex; gap: 12px; font-size: 13px; font-weight: 600; color: white; }
    .footer-tags span { display: flex; align-items: center; gap: 6px; }
    .footer-tags span::before { content: ""; display: inline-block; width: 4px; height: 4px; background: white; border-radius: 50%; }
    .footer-links { display: flex; flex-direction: column; gap: 12px; }
    .footer-links a { font-size: 13px; color: #E0F0FA; transition: color 0.2s; }
    .footer-links a:hover { color: white; text-decoration: underline; }
    .footer-contact { font-size: 13px; color: #E0F0FA; margin-bottom: 16px; display: flex; flex-direction: column; gap: 4px; }
    .footer-contact strong { color: white; }
    .footer-bottom { max-width: 1000px; margin: 0 auto; padding-top: 24px; border-top: 1px solid rgba(255, 255, 255, 0.2); display: flex; justify-content: space-between; font-size: 12px; color: #A5C9E5; }

    /* =========================================
       FLOATING EMERGENCY (SOS)
       ========================================= */
    .floating-emergency { position: fixed; bottom: 24px; right: 24px; z-index: 9999; display: flex; flex-direction: column; align-items: flex-end; gap: 12px; }
    .float-items { display: none; flex-direction: column; gap: 10px; }
    .floating-emergency.open .float-items { display: flex; }
    .float-item { background: #FFFFFF; color: #1F2937; padding: 12px 20px; border-radius: 30px; font-size: 14px; font-weight: 700; border: 1px solid #E5E7EB; box-shadow: 0 4px 15px rgba(0,0,0,.15); white-space: nowrap; text-decoration: none; transition: all 0.2s; }
    .float-item:hover { background: #266B9D; color: #FFFFFF; }
    .float-item.red { background: #B4351B; color: #FFFFFF; }
    .float-item.wa { background: #25D366; color: #FFFFFF; border-color: #25D366; }
    .float-item.wa:hover { background: #128C7E; border-color: #128C7E; color: #FFFFFF; }
    .float-item.red:hover { background: #962B16; }
    .float-btn { width: 60px; height: 60px; border-radius: 50%; border: 0; background: #B4351B; color: #FFFFFF; font: 800 14px 'Plus Jakarta Sans', sans-serif; cursor: pointer; box-shadow: 0 6px 20px rgba(180,53,27,.4); transition: background 0.2s; display: flex; align-items: center; justify-content: center; }
    .float-btn:hover { background: #962B16; }

    /* =========================================
       RESPONSIVE
       ========================================= */
    @media (max-width: 1024px) { .news-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 768px) {
      .navbar { grid-template-columns: 1fr auto; gap: 10px; padding: 10px 20px; }
      .nav-pills { grid-column: 1 / -1; grid-row: 2; justify-content: center; margin-top: 10px; }
      .nav-pills a { padding: 8px 16px; font-size: 13px; }
      .btn-emergency { padding: 10px 14px; font-size: 13px; }
      .page-header { padding: 30px 20px; }
      .main-container { padding: 0 20px; margin: 24px auto; }
      .hero-news-layout { grid-template-columns: 1fr; }
      .hero-news-image { height: 240px; }
      .section-header-news { flex-direction: column; align-items: flex-start; }
      .filter-group { flex-direction: column; width: 100%; align-items: flex-start; }
      .filter-select, .filter-input { width: 100%; }
      .news-grid { grid-template-columns: 1fr; }
      .source-footer { padding: 20px; }
      .footer { padding: 40px 20px 20px; }
      .footer-inner { grid-template-columns: 1fr; gap: 32px; }
      .footer-bottom { flex-direction: column; gap: 8px; text-align: center; }
      .floating-emergency { bottom: 16px; right: 16px; }
    }
  </style>
</head>
<body>

  <!-- Panggil Navbar -->
  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <!-- Page Header -->
  <div class="page-header">
    <div class="page-header-container">
      <h1>Berita Banjir Terkini</h1>
      <p>Kabar terbaru seputar banjir di Pulau Jawa dari berbagai sumber.</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-container">

    <!-- Hero News & Sidebar -->
    <div class="hero-news-layout">
      
      <!-- Berita Utama -->
      <article class="hero-news-card">
        <div class="hero-news-image">
          <?php if($berita_utama['gambar']): ?>
            <img src="<?= $berita_utama['gambar'] ?>" alt="<?= $berita_utama['judul'] ?>">
          <?php else: ?>
            [Foto berita utama]
          <?php endif; ?>
        </div>
        <div class="hero-news-content">
          <span class="badge-terkini">Terkini</span>
          <h2 class="hero-news-title"><?= $berita_utama['judul'] ?></h2>
          <div class="hero-news-meta"><?= $berita_utama['sumber'] ?> &middot; <?= $berita_utama['tanggal'] ?> &middot; <?= $berita_utama['provinsi'] ?></div>
          <p class="hero-news-excerpt"><?= $berita_utama['ringkasan'] ?></p>
          <a href="<?= $berita_utama['url'] ?>" class="btn-primary">Baca selengkapnya</a>
        </div>
      </article>

      <!-- Sidebar Berita -->
      <aside class="sidebar-news">
        <h3 class="sidebar-title">Terbaru</h3>
        <?php foreach($berita_sidebar as $sidebar): ?>
        <div class="sidebar-item">
          <span class="badge-provinsi"><?= $sidebar['provinsi'] ?></span>
          <h4 class="sidebar-item-title"><a href="<?= $sidebar['url'] ?>"><?= $sidebar['judul'] ?></a></h4>
          <div class="sidebar-item-meta"><?= $sidebar['sumber'] ?> &middot; <?= $sidebar['tanggal'] ?></div>
        </div>
        <?php endforeach; ?>
      </aside>

    </div>

    <!-- Semua Berita -->
    <div class="section-header-news">
      <h2>Semua Berita</h2>
      <div class="filter-group">
        <label for="filter-provinsi">Provinsi</label>
        <select id="filter-provinsi" class="filter-select">
          <option>Semua provinsi</option>
          <option>Banten</option>
          <option>DKI Jakarta</option>
          <option>Jawa Barat</option>
          <option>Jawa Tengah</option>
          <option>Jawa Timur</option>
        </select>
        <label for="filter-cari" style="margin-left: 8px;">Cari</label>
        <input type="text" id="filter-cari" class="filter-input" placeholder="Kata kunci berita">
      </div>
    </div>

    <!-- Grid Berita -->
    <div class="news-grid">
      <?php foreach($berita_grid as $grid): ?>
      <article class="news-card">
        <div class="news-card-image">
          <?php if($grid['gambar']): ?>
            <img src="<?= $grid['gambar'] ?>" alt="<?= $grid['judul'] ?>">
          <?php else: ?>
            [Foto berita]
          <?php endif; ?>
        </div>
        <div class="news-card-content">
          <span class="badge-provinsi" style="align-self: flex-start;"><?= $grid['provinsi'] ?></span>
          <h3 class="news-card-title"><?= $grid['judul'] ?></h3>
          <div class="news-card-meta"><?= $grid['sumber'] ?> &middot; <?= $grid['tanggal'] ?></div>
          <p class="news-card-excerpt"><?= $grid['ringkasan'] ?></p>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <button class="page-btn disabled">Sebelumnya</button>
      <button class="page-btn active">1</button>
      <button class="page-btn">2</button>
      <button class="page-btn">3</button>
      <button class="page-btn">Berikutnya</button>
    </div>

  </div>

  <!-- Footer Sumber -->
  <div class="source-footer">
    <div class="source-footer-container">
      Sumber berita: KOMPAS.com, CNN Indonesia, Detik.com, dll
    </div>
  </div>

  <!-- Panggil Footer Utama -->
  <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>