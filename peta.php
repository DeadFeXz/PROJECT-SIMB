<?php
// peta.php
$judul_halaman = "Peta Wilayah Banjir Pulau Jawa";

// 1. Panggil koneksi database
require_once 'config/database.php'; 

// 2. Baca file SVG peta Jawa
$svg_peta = '';
$svg_path = __DIR__ . '/assets/svg/jawa.svg';
if (file_exists($svg_path)) {
    $svg_peta = file_get_contents($svg_path);
} else {
    $svg_peta = '<div style="padding: 40px; text-align: center; color: #6b6a68;">Error: File SVG peta tidak ditemukan di <strong>assets/svg/jawa.svg</strong>.</div>';
}

// 3. Ambil Data dari Database untuk Peta
$mapping_provinsi = [
    'Banten' => 'banten',
    'DKI Jakarta' => 'jakarta',
    'Jawa Barat' => 'jabar',
    'Jawa Tengah' => 'jateng',
    'DI Yogyakarta' => 'diy',
    'Jawa Timur' => 'jatim'
];

$data_peta = [];

// Query data per tahun
$stmt = $pdo->query("SELECT provinsi, tahun, SUM(kejadian_banjir) AS kejadian, SUM(korban_jiwa) AS korban, SUM(penduduk_mengungsi) AS pengungsi FROM detail_dampak_banjir GROUP BY provinsi, tahun");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id_prov = $mapping_provinsi[$row['provinsi']] ?? null;
    if ($id_prov) {
        $data_peta[$row['tahun']][$id_prov] = [
            'kejadian' => $row['kejadian'],
            'korban' => $row['korban'],
            'pengungsi' => $row['pengungsi']
        ];
        
        // Akumulasi data untuk "Semua Tahun"
        if (!isset($data_peta['semua'][$id_prov])) {
            $data_peta['semua'][$id_prov] = ['kejadian' => 0, 'korban' => 0, 'pengungsi' => 0];
        }
        $data_peta['semua'][$id_prov]['kejadian'] += $row['kejadian'];
        $data_peta['semua'][$id_prov]['korban'] += $row['korban'];
        $data_peta['semua'][$id_prov]['pengungsi'] += $row['pengungsi'];
    }
}

// Konversi data PHP ke format JSON untuk dibaca oleh JavaScript
$json_data_peta = json_encode($data_peta);
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

    * { 
      margin: 0; 
      padding: 0; 
      box-sizing: border-box; 
    }

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
    
    a { 
      text-decoration: none; 
      color: inherit; 
    }

    /* =========================================
       NAVBAR (PUTIH)
       ========================================= */
    .skip { 
      position: absolute; 
      left: -999px; 
      top: 8px; 
      background: var(--bg-white); 
      padding: 8px 14px; 
      border-radius: 8px; 
      z-index: 2000; 
      text-decoration: none; 
      color: var(--text-dark); 
    }
    
    .skip:focus { 
      left: 8px; 
    }
    
    .navbar { 
      display: grid; 
      grid-template-columns: 1fr auto 1fr; 
      align-items: center; 
      padding: 14px 40px; 
      background: rgba(255, 255, 255, 0.96); 
      backdrop-filter: blur(10px); 
      border-bottom: 1px solid var(--border-color); 
      position: sticky; 
      top: 0; 
      z-index: 1000; 
    }
    
    .brand { 
      display: flex; 
      align-items: center; 
      gap: 10px; 
      justify-self: start; 
      text-decoration: none; 
    }
    
    .brand img { 
      height: 40px; 
      width: auto; 
    }
    
    .brand span { 
      font-size: 22px; 
      font-weight: 800; 
      color: var(--dark-blue); 
      letter-spacing: -.5px; 
    }
    
    .nav-pills { 
      display: flex; 
      gap: 6px; 
      background: var(--bg-light); 
      border: 1px solid var(--border-color); 
      border-radius: 30px; 
      padding: 6px; 
    }
    
    .nav-pills a { 
      padding: 10px 22px; 
      border-radius: 24px; 
      font-size: 14px; 
      font-weight: 600; 
      color: var(--text-gray); 
      transition: background .2s, color .2s; 
      text-decoration: none; 
    }
    
    .nav-pills a:hover { 
      background: var(--bg-white); 
      color: var(--primary-blue); 
    }
    
    .nav-pills a.active { 
      background: var(--primary-blue); 
      color: var(--bg-white); 
    }
    
    .btn-emergency { 
      justify-self: end; 
      background: #B4351B; 
      color: var(--bg-white); 
      font-size: 14px; 
      font-weight: 700; 
      padding: 12px 20px; 
      border-radius: 10px; 
      text-decoration: none; 
      transition: background 0.2s; 
    }
    
    .btn-emergency:hover { 
      background: #962B16; 
    }

    /* =========================================
       PAGE HEADER
       ========================================= */
    .page-header { 
      background-color: var(--primary-blue); 
      color: white; 
      padding: 50px 40px; 
    }
    
    .page-header-container { 
      max-width: 1200px; 
      margin: 0 auto; 
    }
    
    .page-header h1 { 
      font-size: 32px; 
      font-weight: 700; 
      margin-bottom: 8px; 
    }
    
    .page-header p { 
      font-size: 15px; 
      color: #E0F0FA; 
    }

    /* =========================================
       MAIN CONTAINER
       ========================================= */
    .main-container { 
      max-width: 1200px; 
      margin: 40px auto; 
      padding: 0 40px; 
      flex: 1; 
    }

    /* =========================================
       CONTROL PANEL
       ========================================= */
    .control-panel {
      background: var(--bg-white);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 16px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
      flex-wrap: wrap;
      gap: 16px;
    }

    .filter-group { 
      display: flex; 
      align-items: center; 
      gap: 12px; 
      font-size: 14px; 
      font-weight: 600; 
      color: var(--text-dark); 
    }
    
    .filter-select { 
      padding: 8px 16px; 
      border: 1px solid var(--border-color); 
      border-radius: 6px; 
      font-family: inherit; 
      font-size: 14px; 
      color: var(--text-dark); 
      outline: none; 
      background-color: var(--bg-white); 
      cursor: pointer; 
    }

    .legend-group { 
      display: flex; 
      align-items: center; 
      gap: 16px; 
      font-size: 13px; 
      color: var(--text-gray); 
    }
    
    .legend-title { 
      font-weight: 700; 
      color: var(--text-dark); 
      margin-right: 8px; 
    }
    
    .legend-item { 
      display: flex; 
      align-items: center; 
      gap: 6px; 
    }
    
    .legend-color { 
      width: 14px; 
      height: 14px; 
      border-radius: 3px; 
    }
    
    .legend-color.hijau { background-color: #3C9D6B; }
    .legend-color.kuning { background-color: #F0A03C; }
    .legend-color.merah { background-color: #C94127; }

    /* =========================================
       MAP AREA
       ========================================= */
    .map-wrapper {
      background: var(--bg-white);
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 40px;
    }

    .map-container {
      background-color: #E8F1F8;
      border-radius: 8px;
      position: relative;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      padding: 20px;
    }

    .map-container svg { 
      width: 100%; 
      height: auto; 
      max-width: 900px; 
      display: block; 
    }

    .province { 
      stroke: #ffffff; 
      stroke-width: 1.5; 
      stroke-linejoin: round; 
      transition: all 0.2s ease; 
      cursor: pointer; 
    }
    
    .province:hover { 
      filter: brightness(1.15); 
      stroke-width: 2.5; 
    }

    /* =========================================
       TOOLTIP KUSTOM
       ========================================= */
    .custom-tooltip {
      position: absolute; 
      background-color: var(--dark-blue); 
      color: white; 
      border-radius: 10px; 
      padding: 16px; 
      width: 280px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.25); 
      pointer-events: none; 
      opacity: 0; 
      transition: opacity 0.15s ease, transform 0.15s ease; 
      z-index: 100; 
      transform: translateY(10px);
    }
    
    .tooltip-header { 
      display: flex; 
      justify-content: space-between; 
      align-items: flex-start; 
      margin-bottom: 12px; 
    }
    
    .tooltip-title { 
      font-size: 15px; 
      font-weight: 700; 
      margin: 0; 
    }
    
    .tooltip-badge { 
      font-size: 10px; 
      font-weight: 600; 
      padding: 4px 10px; 
      border-radius: 999px; 
      white-space: nowrap; 
    }
    
    .badge-kuning { background-color: #F0A03C; color: #000; }
    .badge-merah { background-color: #C94127; color: #fff; }
    .badge-hijau { background-color: #3C9D6B; color: #fff; }
    
    .tooltip-row { 
      display: flex; 
      justify-content: space-between; 
      font-size: 13px; 
      margin-bottom: 6px; 
      color: #D1D5DB; 
    }
    
    .tooltip-row span:last-child { 
      font-weight: 700; 
      color: #ffffff; 
    }
    
    .tooltip-footer { 
      margin-top: 12px; 
      padding-top: 12px; 
      border-top: 1px solid rgba(255,255,255,0.1); 
      font-size: 11px; 
      color: #9CA3AF; 
      line-height: 1.4; 
    }

    /* =========================================
       FOOTER SUMBER
       ========================================= */
    .source-footer { 
      border-top: 1px solid var(--border-color); 
      padding: 24px 40px; 
      font-size: 13px; 
      color: var(--text-gray); 
      background: var(--bg-light); 
    }
    
    .source-footer-container { 
      max-width: 1200px; 
      margin: 0 auto; 
    }

    /* =========================================
       RESPONSIVE
       ========================================= */
    @media (max-width: 768px) {
      .navbar { 
        grid-template-columns: 1fr auto; 
        gap: 10px; 
        padding: 10px 20px; 
      }
      
      .nav-pills { 
        grid-column: 1 / -1; 
        grid-row: 2; 
        justify-content: center; 
        margin-top: 10px; 
      }
      
      .nav-pills a { 
        padding: 8px 16px; 
        font-size: 13px; 
      }
      
      .btn-emergency { 
        padding: 10px 14px; 
        font-size: 13px; 
      }
      
      .page-header { 
        padding: 30px 20px; 
      }
      
      .main-container { 
        padding: 0 20px; 
        margin: 24px auto; 
      }
      
      .control-panel { 
        flex-direction: column; 
        align-items: flex-start; 
      }
      
      .custom-tooltip { 
        width: 240px; 
        padding: 12px; 
      }
      
      .source-footer { 
        padding: 20px; 
      }
    }
  </style>
</head>
<body>

  <!-- Panggil Navbar Global -->
  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <!-- Page Header -->
  <div class="page-header">
    <div class="page-header-container">
      <h1>Peta Wilayah Banjir Pulau Jawa</h1>
      <p>Arahkan kursor ke provinsi untuk melihat detailnya, lalu klik untuk melihat rincian per kabupaten/kota.</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-container">
    
    <!-- Control Panel -->
    <div class="control-panel">
      <div class="filter-group">
        <label for="periode">Periode</label>
        <select id="periode" class="filter-select">
          <option value="semua">Semua tahun</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
        </select>
      </div>
      
      <div class="legend-group">
        <span class="legend-title">Status risiko</span>
        <div class="legend-item"><span class="legend-color hijau"></span> Rendah</div>
        <div class="legend-item"><span class="legend-color kuning"></span> Sedang</div>
        <div class="legend-item"><span class="legend-color merah"></span> Tinggi</div>
      </div>
    </div>

    <!-- Area Peta -->
    <div class="map-wrapper">
      <div class="map-container" id="map-container">
        
        <!-- Tooltip Kustom -->
        <div class="custom-tooltip" id="tooltip">
          <div class="tooltip-header">
            <h4 class="tooltip-title" id="tooltip-title">Provinsi</h4>
            <span class="tooltip-badge" id="tooltip-badge">Memuat...</span>
          </div>
          <div class="tooltip-row"><span>Jumlah kejadian</span> <span id="tooltip-kejadian">0</span></div>
          <div class="tooltip-row"><span>Korban jiwa</span> <span id="tooltip-korban">0</span></div>
          <div class="tooltip-row"><span>Pengungsi</span> <span id="tooltip-pengungsi">0</span></div>
          <div class="tooltip-footer">Klik untuk melihat dampak per kabupaten/kota</div>
        </div>

        <!-- Panggil SVG Peta -->
        <?= $svg_peta ?>
        
      </div>
    </div>
  </div>

  <!-- Footer Sumber -->
  <div class="source-footer">
    <div class="source-footer-container">
      Sumber data: BNPB, BNPD dan BPS. Batas wilayah: Google Maps
    </div>
  </div>

  <!-- Script Interaksi Tooltip & Klik -->
  <script>
    // 1. Ambil data dari PHP
    const fullData = <?= $json_data_peta ?>;
    let currentPeriod = 'semua';

    // 2. Elemen DOM
    const tooltip = document.getElementById('tooltip');
    const mapContainer = document.getElementById('map-container');
    const tTitle = document.getElementById('tooltip-title');
    const tBadge = document.getElementById('tooltip-badge');
    const tKejadian = document.getElementById('tooltip-kejadian');
    const tKorban = document.getElementById('tooltip-korban');
    const tPengungsi = document.getElementById('tooltip-pengungsi');
    const provinces = document.querySelectorAll('.province');
    const periodeSelect = document.getElementById('periode');

    // Nama Provinsi untuk Tampilan
    const namaProvinsi = {
      'banten': 'Banten',
      'jakarta': 'DKI Jakarta',
      'jabar': 'Jawa Barat',
      'jateng': 'Jawa Tengah',
      'diy': 'DI Yogyakarta',
      'jatim': 'Jawa Timur'
    };

    // 3. Event Listener untuk ganti Periode
    periodeSelect.addEventListener('change', function() {
      currentPeriod = this.value;
    });

    // 4. Logika Hover Tooltip
    provinces.forEach(prov => {
      
      // Saat kursor masuk ke area provinsi
      prov.addEventListener('mouseenter', (e) => {
        const provId = e.target.getAttribute('data-prov');
        
        if (provId) {
          // Set Nama Provinsi
          tTitle.textContent = namaProvinsi[provId] || provId;

          // Ambil data berdasarkan periode yang dipilih
          let data = { kejadian: 0, korban: 0, pengungsi: 0 }; // Default
          if (fullData[currentPeriod] && fullData[currentPeriod][provId]) {
            data = fullData[currentPeriod][provId];
          }

          // Tampilkan Angka dengan format ribuan (contoh: 12.345)
          tKejadian.textContent = new Intl.NumberFormat('id-ID').format(data.kejadian);
          tKorban.textContent = new Intl.NumberFormat('id-ID').format(data.korban);
          tPengungsi.textContent = new Intl.NumberFormat('id-ID').format(data.pengungsi);

          // Tentukan Status Risiko Dinamis berdasarkan jumlah pengungsi
          let risiko = 'Rendah';
          let badgeClass = 'badge-hijau';
          if (data.pengungsi > 50000) {
            risiko = 'Tinggi'; badgeClass = 'badge-merah';
          } else if (data.pengungsi > 5000) {
            risiko = 'Sedang'; badgeClass = 'badge-kuning';
          }
          tBadge.textContent = 'Risiko: ' + risiko;
          tBadge.className = 'tooltip-badge ' + badgeClass;

          // Tampilkan Tooltip
          tooltip.style.opacity = '1';
          tooltip.style.transform = 'translateY(0)';
        }
      });

      // Mengikuti pergerakan kursor
      prov.addEventListener('mousemove', (e) => {
        const containerRect = mapContainer.getBoundingClientRect();
        let x = e.clientX - containerRect.left;
        let y = e.clientY - containerRect.top;
        const tooltipWidth = tooltip.offsetWidth;
        const tooltipHeight = tooltip.offsetHeight;
        let leftPos = x + 20; 
        let topPos = y - (tooltipHeight / 2); 
        
        if (leftPos + tooltipWidth > containerRect.width) leftPos = x - tooltipWidth - 20; 
        if (topPos < 0) topPos = 10;
        else if (topPos + tooltipHeight > containerRect.height) topPos = containerRect.height - tooltipHeight - 10;
        
        tooltip.style.left = leftPos + 'px';
        tooltip.style.top = topPos + 'px';
      });

      // Sembunyikan tooltip saat kursor keluar
      prov.addEventListener('mouseleave', () => {
        tooltip.style.opacity = '0';
        tooltip.style.transform = 'translateY(10px)';
      });

      // Arahkan ke halaman detail saat di-klik
      prov.addEventListener('click', (e) => {
        const provId = e.target.getAttribute('data-prov');
        if (provId) {
          // Jika sedang memfilter tahun, bawa tahunnya ke halaman detail
          let tahunParam = (currentPeriod === 'semua') ? '' : '&tahun=' + currentPeriod;
          window.location.href = 'detail.php?provinsi=' + provId + tahunParam;
        }
      });

    });
  </script>
</body>
</html>