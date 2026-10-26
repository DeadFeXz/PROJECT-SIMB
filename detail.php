<?php
// detail.php
$judul_halaman = "Detail Dampak Banjir";

// 1. Panggil koneksi database
require_once 'config/database.php'; 

// 2. Tangkap parameter URL
$prov_id = isset($_GET['provinsi']) ? strtolower($_GET['provinsi']) : 'jateng';
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : 'semua';

$mapping_provinsi = [
    'banten' => 'Banten', 
    'jakarta' => 'DKI Jakarta', 
    'jabar' => 'Jawa Barat',
    'jateng' => 'Jawa Tengah', 
    'diy' => 'DI Yogyakarta', 
    'jatim' => 'Jawa Timur'
];

$nama_provinsi = isset($mapping_provinsi[$prov_id]) ? $mapping_provinsi[$prov_id] : 'Jawa Tengah';

// 3. Query Database Berdasarkan Tahun
if ($tahun == 'semua') {
    // Jika "Semua tahun", ambil semua data lalu jumlahkan per kabupaten
    $stmt = $pdo->prepare("SELECT * FROM detail_dampak_banjir WHERE provinsi = :provinsi");
    $stmt->execute(['provinsi' => $nama_provinsi]);
    $raw_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $data_kabupaten = [];
    foreach ($raw_data as $row) {
        $kab = $row['kabupaten_kota'];
        if (!isset($data_kabupaten[$kab])) {
            $data_kabupaten[$kab] = [
                'kabupaten_kota' => $kab,
                'kejadian_banjir' => 0, 'korban_jiwa' => 0, 'korban_luka' => 0,
                'penduduk_mengungsi' => 0, 'rumah_rusak' => 0, 'lahan_rusak' => 0,
                'satuan_pendidikan_rusak' => 0, 'rumah_ibadat_rusak' => 0, 
                'fasilitas_kesehatan_rusak' => 0, 'kantor_rusak' => 0, 'jembatan_rusak' => 0
            ];
        }
        $data_kabupaten[$kab]['kejadian_banjir'] += $row['kejadian_banjir'];
        $data_kabupaten[$kab]['korban_jiwa'] += $row['korban_jiwa'];
        $data_kabupaten[$kab]['korban_luka'] += $row['korban_luka'];
        $data_kabupaten[$kab]['penduduk_mengungsi'] += $row['penduduk_mengungsi'];
        $data_kabupaten[$kab]['rumah_rusak'] += $row['rumah_rusak'];
        $data_kabupaten[$kab]['lahan_rusak'] += $row['lahan_rusak'];
        
        // Penjumlahan kolom fasilitas
        $data_kabupaten[$kab]['satuan_pendidikan_rusak'] += $row['satuan_pendidikan_rusak'];
        $data_kabupaten[$kab]['rumah_ibadat_rusak'] += $row['rumah_ibadat_rusak'];
        $data_kabupaten[$kab]['fasilitas_kesehatan_rusak'] += $row['fasilitas_kesehatan_rusak'];
        $data_kabupaten[$kab]['kantor_rusak'] += $row['kantor_rusak'];
        $data_kabupaten[$kab]['jembatan_rusak'] += $row['jembatan_rusak'];
    }
    // Urutkan dari pengungsi terbanyak (karena kerugian sudah dihapus)
    usort($data_kabupaten, function($a, $b) { return $b['penduduk_mengungsi'] <=> $a['penduduk_mengungsi']; });
} else {
    // Jika tahun spesifik dipilih, urutkan dari pengungsi terbanyak
    $stmt = $pdo->prepare("SELECT * FROM detail_dampak_banjir WHERE provinsi = :provinsi AND tahun = :tahun ORDER BY penduduk_mengungsi DESC");
    $stmt->execute(['provinsi' => $nama_provinsi, 'tahun' => $tahun]);
    $data_kabupaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$jumlah_kabupaten = count($data_kabupaten);

// 4. Hitung Total untuk Card di atas & Tabel Footer
$total_korban_jiwa = 0; $total_pengungsi = 0;
$total_rumah_rusak = 0; $total_kejadian = 0; $total_luka = 0; $total_lahan = 0; 
$total_pendidikan = 0; $total_ibadat = 0; $total_kesehatan = 0; $total_kantor = 0; $total_jembatan = 0;

foreach ($data_kabupaten as $row) {
    $total_korban_jiwa += $row['korban_jiwa'];
    $total_pengungsi += $row['penduduk_mengungsi'];
    $total_rumah_rusak += $row['rumah_rusak'];
    $total_kejadian += $row['kejadian_banjir'];
    $total_luka += $row['korban_luka'];
    $total_lahan += $row['lahan_rusak'];
    
    $total_pendidikan += $row['satuan_pendidikan_rusak'] ?? 0;
    $total_ibadat += $row['rumah_ibadat_rusak'] ?? 0;
    $total_kesehatan += $row['fasilitas_kesehatan_rusak'] ?? 0;
    $total_kantor += $row['kantor_rusak'] ?? 0;
    $total_jembatan += $row['jembatan_rusak'] ?? 0;
}

// 5. Ambil Data untuk Chart (Top 8 Pengungsi Terbanyak)
$chart_data = array_slice($data_kabupaten, 0, 8);
$max_pengungsi = (isset($chart_data[0]['penduduk_mengungsi']) && $chart_data[0]['penduduk_mengungsi'] > 0) ? $chart_data[0]['penduduk_mengungsi'] : 1;
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
  
  <style>
    :root { 
      --primary-blue: #266B9D; 
      --dark-blue: #0F2C46; 
      --bg-light: #F5F8FA; 
      --bg-white: #FFFFFF; 
      --text-dark: #1F2937; 
      --text-gray: #4B5563; 
      --border-color: #E5E7EB; 
      --font-family: 'Plus Jakarta Sans', sans-serif; 
    }
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    body { 
      font-family: var(--font-family); 
      color: var(--text-dark); 
      background-color: var(--bg-light); 
      line-height: 1.6; 
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

        /* ===== NAVBAR (FIX UNTUK HALAMAN DETAIL) ===== */
    .navbar { 
      display: grid; 
      grid-template-columns: 1fr auto 1fr; 
      align-items: center; 
      padding: 14px 40px; 
      background: rgba(255,255,255,.96); 
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
    }
    
    .brand img { 
      height: 40px; /* Memaksa logo mengecil */
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
    }
    
    /* Responsive Navbar untuk HP */
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
        flex-wrap: wrap;
      }
      .nav-pills a { 
        padding: 8px 16px; 
        font-size: 13px; 
      }
    }
    
    a { text-decoration: none; color: inherit; }
    
    /* ===== PAGE HEADER ===== */
    .page-header { background: var(--primary-blue); color: white; padding: 40px; }
    .page-header-container { max-width: 1200px; margin: 0 auto; }
    .breadcrumb { font-size: 13px; color: #E0F0FA; margin-bottom: 12px; }
    .breadcrumb a { text-decoration: underline; }
    .page-header h1 { font-size: 32px; font-weight: 700; margin-bottom: 8px; }
    .page-header p { font-size: 15px; color: #E0F0FA; }
    
    /* ===== MAIN CONTAINER ===== */
    .main-container { max-width: 1200px; margin: 30px auto; padding: 0 40px; flex: 1; }
    
    /* ===== CONTROL PANEL ===== */
    .control-panel { background: var(--bg-white); border: 1px solid var(--border-color); border-radius: 12px; padding: 16px 24px; display: flex; gap: 24px; margin-bottom: 24px; flex-wrap: wrap; }
    .filter-group { display: flex; align-items: center; gap: 12px; font-size: 14px; font-weight: 600; }
    .filter-select { padding: 8px 16px; border: 1px solid var(--border-color); border-radius: 6px; font-family: inherit; font-size: 14px; outline: none; min-width: 150px; cursor: pointer; }
    
    /* ===== SUMMARY CARDS ===== */
    .summary-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 24px; }
    .summary-card { background: var(--bg-white); border: 1px solid var(--border-color); border-radius: 12px; padding: 20px; }
    .summary-card span { font-size: 13px; color: var(--text-gray); margin-bottom: 8px; display: block; }
    .summary-card h2 { font-size: 24px; font-weight: 700; color: var(--primary-blue); }
    .summary-card h2.text-dark { color: var(--text-dark); }
    
    /* ===== SECTION CARD ===== */
    .section-card { background: var(--bg-white); border: 1px solid var(--border-color); border-radius: 12px; padding: 24px; margin-bottom: 24px; }
    .section-title { font-size: 18px; font-weight: 700; margin-bottom: 20px; }
    
    /* ===== CHART ===== */
    .chart-row { display: flex; align-items: center; margin-bottom: 12px; font-size: 14px; }
    .chart-label { width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .chart-bar-container { flex: 1; background: #F0F4F8; border-radius: 4px; height: 16px; margin: 0 16px; overflow: hidden; }
    .chart-bar-fill { background: var(--primary-blue); height: 100%; border-radius: 4px; }
    .chart-value { width: 100px; text-align: right; font-weight: 600; }
    
    /* ===== TABLE ===== */
    .table-responsive { overflow-x: auto; max-height: 500px; overflow-y: auto; border: 1px solid var(--border-color); border-radius: 8px; }
    table { width: 100%; border-collapse: collapse; font-size: 14px; text-align: left; white-space: nowrap; }
    thead { background: #F9FAFB; position: sticky; top: 0; z-index: 10; }
    th { padding: 14px 16px; border-bottom: 1px solid var(--border-color); font-size: 13px; }
    td { padding: 14px 16px; border-bottom: 1px solid var(--border-color); }
    tbody tr:hover { background: #F9FAFB; }
    tfoot { background: #F3F4F6; font-weight: 700; position: sticky; bottom: 0; z-index: 10; }
    tfoot td { border-top: 2px solid var(--border-color); border-bottom: none; }
    
    /* ===== SOURCE FOOTER ===== */
    .source-footer { padding: 20px 0; font-size: 13px; color: var(--text-gray); border-top: 1px solid var(--border-color); }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) { .summary-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 768px) { 
      .main-container { padding: 0 20px; } 
      .page-header { padding: 30px 20px; }
      .summary-grid { grid-template-columns: 1fr; } 
    }
  </style>
</head>
<body>

  <!-- Panggil Navbar Global -->
  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <!-- Page Header -->
  <div class="page-header">
    <div class="page-header-container">
      <div class="breadcrumb"><a href="peta.php">Peta Wilayah</a> / <?= htmlspecialchars($nama_provinsi) ?></div>
      <h1>Dampak banjir di <?= htmlspecialchars($nama_provinsi) ?></h1>
      <p>Periode: <?= $tahun == 'semua' ? '2020-2025' : $tahun ?> · <?= $jumlah_kabupaten ?> kabupaten/kota</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-container">
    
    <!-- Control Panel -->
    <div class="control-panel">
      <div class="filter-group">
        <label>Provinsi</label>
        <select class="filter-select" onchange="window.location.href='detail.php?provinsi=' + this.value + '&tahun=<?= $tahun ?>'">
          <option value="banten" <?= $prov_id == 'banten' ? 'selected' : '' ?>>Banten</option>
          <option value="jakarta" <?= $prov_id == 'jakarta' ? 'selected' : '' ?>>DKI Jakarta</option>
          <option value="jabar" <?= $prov_id == 'jabar' ? 'selected' : '' ?>>Jawa Barat</option>
          <option value="jateng" <?= $prov_id == 'jateng' ? 'selected' : '' ?>>Jawa Tengah</option>
          <option value="diy" <?= $prov_id == 'diy' ? 'selected' : '' ?>>DI Yogyakarta</option>
          <option value="jatim" <?= $prov_id == 'jatim' ? 'selected' : '' ?>>Jawa Timur</option>
        </select>
      </div>
      <div class="filter-group">
        <label>Periode</label>
        <select class="filter-select" onchange="window.location.href='detail.php?provinsi=<?= $prov_id ?>&tahun=' + this.value">
          <option value="semua" <?= $tahun == 'semua' ? 'selected' : '' ?>>Semua tahun</option>
          <option value="2020" <?= $tahun == '2020' ? 'selected' : '' ?>>2020</option>
          <option value="2021" <?= $tahun == '2021' ? 'selected' : '' ?>>2021</option>
          <option value="2022" <?= $tahun == '2022' ? 'selected' : '' ?>>2022</option>
          <option value="2023" <?= $tahun == '2023' ? 'selected' : '' ?>>2023</option>
          <option value="2024" <?= $tahun == '2024' ? 'selected' : '' ?>>2024</option>
          <option value="2025" <?= $tahun == '2025' ? 'selected' : '' ?>>2025</option>
        </select>
      </div>
    </div>

    <!-- Summary Cards (Kerugian dihapus, diganti Kejadian) -->
    <div class="summary-grid">
      <div class="summary-card">
        <span>Total Kejadian Banjir</span>
        <h2><?= number_format($total_kejadian, 0, ',', '.') ?> kali</h2>
      </div>
      <div class="summary-card">
        <span>Korban jiwa (meninggal/hilang)</span>
        <h2 class="text-dark"><?= number_format($total_korban_jiwa, 0, ',', '.') ?> jiwa</h2>
      </div>
      <div class="summary-card">
        <span>Penduduk mengungsi</span>
        <h2 class="text-dark"><?= number_format($total_pengungsi, 0, ',', '.') ?> jiwa</h2>
      </div>
      <div class="summary-card">
        <span>Rumah rusak/terendam</span>
        <h2 class="text-dark"><?= number_format($total_rumah_rusak, 0, ',', '.') ?> unit</h2>
      </div>
    </div>

    <!-- Chart Section (Diubah jadi Pengungsi Terbanyak) -->
    <div class="section-card">
      <h3 class="section-title">Jumlah Pengungsi Terbanyak</h3>
      <?php if (!empty($chart_data)): ?>
        <?php foreach($chart_data as $chart): ?>
        <div class="chart-row">
          <div class="chart-label" title="<?= htmlspecialchars($chart['kabupaten_kota']) ?>"><?= htmlspecialchars($chart['kabupaten_kota']) ?></div>
          <div class="chart-bar-container">
            <div class="chart-bar-fill" style="width: <?= ($chart['penduduk_mengungsi'] > 0) ? ($chart['penduduk_mengungsi'] / $max_pengungsi) * 100 : 0 ?>%;"></div>
          </div>
          <div class="chart-value"><?= number_format($chart['penduduk_mengungsi'], 0, ',', '.') ?> jiwa</div>
        </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="font-size: 14px; color: var(--text-gray);">Data pengungsi belum tersedia.</p>
      <?php endif; ?>
    </div>

    <!-- Table Section -->
    <div class="section-card">
      <h3 class="section-title">Rincian per kabupaten/kota</h3>
      
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Kabupaten/Kota</th>
              <th>Kejadian Banjir</th>
              <th>Korban Jiwa</th>
              <th>Luka/Sakit</th>
              <th>Mengungsi</th>
              <th>Rumah rusak/terendam</th>
              <th>Lahan rusak (ha)</th>
              <!-- Kolom Fasilitas -->
              <th>Satuan Pendidikan</th>
              <th>Rumah Ibadat</th>
              <th>Fasilitas Kesehatan</th>
              <th>Kantor</th>
              <th>Jembatan</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($data_kabupaten)): ?>
                <?php foreach($data_kabupaten as $row): ?>
                <tr>
                  <td><strong><?= htmlspecialchars($row['kabupaten_kota']) ?></strong></td>
                  <td><?= number_format($row['kejadian_banjir'], 0, ',', '.') ?></td>
                  <td><?= number_format($row['korban_jiwa'], 0, ',', '.') ?></td>
                  <td><?= number_format($row['korban_luka'], 0, ',', '.') ?></td>
                  <td><?= number_format($row['penduduk_mengungsi'], 0, ',', '.') ?></td>
                  <td><?= number_format($row['rumah_rusak'], 0, ',', '.') ?></td>
                  <td><?= number_format($row['lahan_rusak'], 0, ',', '.') ?></td>
                  
                  <!-- Data Fasilitas -->
                  <td><?= number_format($row['satuan_pendidikan_rusak'] ?? 0, 0, ',', '.') ?></td>
                  <td><?= number_format($row['rumah_ibadat_rusak'] ?? 0, 0, ',', '.') ?></td>
                  <td><?= number_format($row['fasilitas_kesehatan_rusak'] ?? 0, 0, ',', '.') ?></td>
                  <td><?= number_format($row['kantor_rusak'] ?? 0, 0, ',', '.') ?></td>
                  <td><?= number_format($row['jembatan_rusak'] ?? 0, 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="12" style="text-align: center; padding: 30px;">Data tidak ditemukan untuk periode ini.</td>
                </tr>
            <?php endif; ?>
          </tbody>
          
          <!-- Total Baris Bawah -->
          <?php if (!empty($data_kabupaten)): ?>
          <tfoot>
            <tr>
              <td>Total <?= htmlspecialchars($nama_provinsi) ?></td>
              <td><?= number_format($total_kejadian, 0, ',', '.') ?></td>
              <td><?= number_format($total_korban_jiwa, 0, ',', '.') ?></td>
              <td><?= number_format($total_luka, 0, ',', '.') ?></td>
              <td><?= number_format($total_pengungsi, 0, ',', '.') ?></td>
              <td><?= number_format($total_rumah_rusak, 0, ',', '.') ?></td>
              <td><?= number_format($total_lahan, 0, ',', '.') ?></td>
              
              <!-- Total Fasilitas -->
              <td><?= number_format($total_pendidikan, 0, ',', '.') ?></td>
              <td><?= number_format($total_ibadat, 0, ',', '.') ?></td>
              <td><?= number_format($total_kesehatan, 0, ',', '.') ?></td>
              <td><?= number_format($total_kantor, 0, ',', '.') ?></td>
              <td><?= number_format($total_jembatan, 0, ',', '.') ?></td>
            </tr>
          </tfoot>
          <?php endif; ?>
        </table>
      </div>
      
      <div class="source-footer">
        Diurutkan dari jumlah pengungsi terbanyak.
      </div>
    </div>

  </div>

  <!-- Footer Sumber Bawah -->
  <div class="main-container" style="margin-top: 0; flex: none;">
    <div style="font-size: 13px; color: var(--text-gray); border-top: 1px solid var(--border-color); padding-top: 20px; padding-bottom: 40px;">
      Sumber data: BPS, BPBD, dan BNPB (kompilasi data kejadian bencana dan dampaknya).
    </div>
  </div>

</body>
</html>