<?php
// orang-hilang.php
$judul_halaman = "Orang Hilang";

// ==========================================
// DATA ORANG HILANG (EDIT DI SINI SAJA)
// ==========================================
$hilang_data = [
  [
    'nama'            => 'Ahmad Fauzi',
    'usia'            => 45,
    'jenis_kelamin'   => 'Laki-laki',
    'tanggal'         => '16 November 2026',
    'wilayah'         => 'Cipaganti, Bandung',
    'provinsi'        => 'Jawa Barat',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Hilang saat banjir melanda kawasan Cipaganti, Bandung. Terakhir terlihat pukul 15.30 WIB mengenakan kemeja biru lengan panjang, celana hitam, dan sandal jepit. Tinggi sekitar 165 cm, rambut pendek hitam.',
    'kontak'          => '0812-3456-7890 (Keluarga)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Siti Aminah',
    'usia'            => 12,
    'jenis_kelamin'   => 'Perempuan',
    'tanggal'         => '16 November 2026',
    'wilayah'         => 'Desa Sukamaju, Aceh Tamiang',
    'provinsi'        => 'Aceh',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Anak perempuan, mengenakan seragam sekolah putih-merah, rambut dikepang dua. Terakhir terlihat pukul 10.15 WIB.',
    'kontak'          => '0852-9876-5432 (BPBD Aceh)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Budi Santoso',
    'usia'            => 60,
    'jenis_kelamin'   => 'Laki-laki',
    'tanggal'         => '15 November 2026',
    'wilayah'         => 'Kelurahan Genuk, Semarang',
    'provinsi'        => 'Jawa Tengah',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Lansia, mengenakan kaos abu-abu dan sarung, membawa tongkat. Terakhir terlihat pukul 22.00 WIB.',
    'kontak'          => '0813-1122-3344 (Posko Banjir Semarang)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Dewi Lestari',
    'usia'            => 28,
    'jenis_kelamin'   => 'Perempuan',
    'tanggal'         => '16 November 2026',
    'wilayah'         => 'Kecamatan Solo Baru, Solo',
    'provinsi'        => 'Jawa Tengah',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Mengenakan gamis merah muda, jilbab krem, dan membawa tas hitam. Terakhir terlihat pukul 08.45 WIB.',
    'kontak'          => '0821-5566-7788 (Keluarga)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Rizky Pratama',
    'usia'            => 8,
    'jenis_kelamin'   => 'Laki-laki',
    'tanggal'         => '15 November 2026',
    'wilayah'         => 'Kelurahan Rawa Buaya, Jakarta Barat',
    'provinsi'        => 'DKI Jakarta',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Anak laki-laki, mengenakan kaos kuning dan celana pendek biru. Terakhir terlihat pukul 17.20 WIB.',
    'kontak'          => '0819-7766-5544 (Orang Tua)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Sri Wahyuni',
    'usia'            => 52,
    'jenis_kelamin'   => 'Perempuan',
    'tanggal'         => '16 November 2026',
    'wilayah'         => 'Kecamatan Pekalongan Utara, Pekalongan',
    'provinsi'        => 'Jawa Tengah',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Mengenakan daster batik hijau, kerudung cokelat, berkacamata. Terakhir terlihat pukul 06.00 WIB.',
    'kontak'          => '0812-9988-7766 (BPBD Pekalongan)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Hendra Gunawan',
    'usia'            => 35,
    'jenis_kelamin'   => 'Laki-laki',
    'tanggal'         => '16 November 2026',
    'wilayah'         => 'Kelurahan Rawa Buaya, Jakarta Barat',
    'provinsi'        => 'DKI Jakarta',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Mengenakan kaos hitam dan celana jeans, tinggi sekitar 170 cm. Terakhir terlihat pukul 19.10 WIB.',
    'kontak'          => '0817-2233-4455 (Keluarga)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Nur Aisyah',
    'usia'            => 67,
    'jenis_kelamin'   => 'Perempuan',
    'tanggal'         => '14 November 2026',
    'wilayah'         => 'Kelurahan Bandarharjo, Semarang',
    'provinsi'        => 'Jawa Tengah',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Lansia, mengenakan kebaya cokelat dan kain batik. Terakhir terlihat pukul 05.30 WIB.',
    'kontak'          => '0813-5566-7788 (BPBD Semarang)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Fajar Ramadhan',
    'usia'            => 19,
    'jenis_kelamin'   => 'Laki-laki',
    'tanggal'         => '15 November 2026',
    'wilayah'         => 'Kecamatan Cipaganti, Bandung',
    'provinsi'        => 'Jawa Barat',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Mahasiswa, mengenakan jaket abu-abu dan tas ransel hitam. Terakhir terlihat pukul 14.00 WIB.',
    'kontak'          => '0821-4433-2211 (Keluarga)',
    'status'          => 'Belum ditemukan',
  ],
  [
    'nama'            => 'Yuliana Sari',
    'usia'            => 41,
    'jenis_kelamin'   => 'Perempuan',
    'tanggal'         => '13 November 2026',
    'wilayah'         => 'Kecamatan Bekasi Utara, Bekasi',
    'provinsi'        => 'Jawa Barat',
    'gambar'          => 'assets/img/anonim.png',
    'ringkasan'       => 'Mengenakan seragam kerja biru muda, tinggi sekitar 158 cm. Terakhir terlihat pukul 07.15 WIB.',
    'kontak'          => '0812-3344-5566 (Kantor)',
    'status'          => 'Belum ditemukan',
  ],
];

$hilang_utama = $hilang_data[0];
$hilang_grid  = $hilang_data;
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
      --danger-red: #B4351B;
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
       NAVBAR
       ========================================= */
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
      letter-spacing: -0.5px;
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
      transition: background 0.2s, color 0.2s;
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
      background: var(--danger-red);
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
       HERO HEADER
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
       LAPORAN UTAMA
       ========================================= */
    .hero-news-card {
      background: var(--bg-white);
      border-radius: 6px;
      overflow: hidden;
      border: 1px solid var(--border-color);
      border-top: 6px solid var(--danger-red);
      display: grid;
      grid-template-columns: 320px 1fr;
      box-shadow: 0 4px 16px rgba(15, 44, 70, 0.08);
      margin-bottom: 50px;
    }

    .hero-news-image {
      width: 100%;
      min-height: 300px;
      background-color: #E9EDF1;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }

    .hero-news-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .usia-badge {
      position: absolute;
      top: 12px;
      right: 12px;
      background: var(--navy);
      color: white;
      font-size: 12px;
      font-weight: 800;
      padding: 6px 12px;
      border-radius: 4px;
      border: 2px solid white;
      z-index: 2;
    }

    .hero-news-content {
      padding: 28px 32px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .badge-terkini {
      display: inline-block;
      background: #FDF0EC;
      color: var(--danger-red);
      border: 1px solid #F5C6B8;
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 1px;
      padding: 5px 12px;
      border-radius: 4px;
      margin-bottom: 14px;
      text-transform: uppercase;
      align-self: flex-start;
    }

    .hero-news-title {
      font-size: 26px;
      font-weight: 800;
      line-height: 1.3;
      color: var(--text-dark);
      margin-bottom: 10px;
    }

    .hero-news-meta {
      font-size: 12px;
      color: var(--text-light);
      margin-bottom: 14px;
      font-weight: 600;
    }

    .hero-news-excerpt {
      font-size: 14px;
      color: var(--text-gray);
      margin-bottom: 20px;
      line-height: 1.7;
    }

    /* Kontak Utama diganti teks biasa */
    .hero-news-kontak {
      margin-bottom: 20px;
      font-size: 14px;
      color: var(--text-gray);
      line-height: 1.6;
    }

    .hero-news-kontak strong {
      font-weight: 700;
      color: var(--text-dark);
    }

    .btn-primary {
      display: inline-block;
      background: var(--primary-blue);
      color: white;
      padding: 12px 24px;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 700;
      transition: background 0.2s;
      border: none;
      cursor: pointer;
      align-self: flex-start;
    }

    .btn-primary:hover {
      background: var(--primary-blue-hover);
    }

    /* =========================================
       JUDUL SEMUA LAPORAN
       ========================================= */
    .section-header-news {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      flex-wrap: wrap;
      gap: 16px;
      padding-bottom: 14px;
      border-bottom: 3px solid var(--navy);
    }

    .section-header-news h2 {
      font-size: 22px;
      font-weight: 800;
      color: var(--text-dark);
      margin: 0;
    }

    .filter-group {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 13px;
      color: var(--text-gray);
    }

    .filter-select {
      padding: 8px 12px;
      border: 1px solid var(--border-color);
      border-radius: 4px;
      font-family: inherit;
      font-size: 13px;
      color: var(--text-dark);
      outline: none;
      background-color: var(--bg-white);
      cursor: pointer;
    }

    .filter-select:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 3px rgba(38, 107, 157, 0.12);
    }

    /* =========================================
       GRID KARTU ORANG HILANG
       ========================================= */
    .news-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-bottom: 40px;
    }

    .news-card {
      background: var(--bg-white);
      border-radius: 12px; /* disamakan dengan berita.php */
      overflow: hidden;
      border: 1px solid var(--border-color);
      transition: transform 0.2s, box-shadow 0.2s;
      display: flex;
      flex-direction: column;
      /* box-shadow awal dihapus karena sudah ada default */
    }

    /* Hover disamakan persis dengan berita.php */
    .news-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .news-card-image {
      width: 100%;
      height: 160px;
      background-color: #E9EDF1;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }

    .news-card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .news-card-image .usia-badge {
      top: 8px;
      right: 8px;
      font-size: 10px;
      padding: 4px 8px;
      border-width: 1px;
    }

    .news-card-content {
      padding: 16px 18px 18px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }

    .news-card-content .row-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 8px;
    }

    .badge-provinsi {
      display: inline-block;
      background: var(--bg-light);
      color: var(--primary-blue);
      font-size: 10px;
      font-weight: 700;
      padding: 3px 8px;
      border-radius: 3px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .usia-tag {
      font-size: 11px;
      font-weight: 700;
      color: var(--danger-red);
      background: #FDF0EC;
      padding: 3px 8px;
      border-radius: 3px;
    }

    .news-card-title {
      font-size: 16px;
      font-weight: 700; /* disesuaikan dengan berita.php */
      color: var(--text-dark);
      margin-bottom: 8px; /* disesuaikan dengan berita.php */
      line-height: 1.4;
    }

    .news-card-meta {
      font-size: 12px;
      color: var(--text-light);
      margin-bottom: 12px;
      font-weight: 600;
    }

    .news-card-excerpt {
      font-size: 13px;
      color: var(--text-gray);
      line-height: 1.5;
      margin-bottom: 12px;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Kontak di grid diganti teks biasa */
    .news-card-kontak {
      margin-top: auto;
      font-size: 13px;
      color: var(--text-gray);
      line-height: 1.5;
    }

    .news-card-kontak strong {
      color: var(--text-dark);
      font-weight: 700;
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
       FOOTER UTAMA
       ========================================= */
    .footer {
      background-color: var(--primary-blue);
      color: white;
      padding: 64px 40px 24px;
    }

    .footer-inner {
      max-width: 1000px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1.5fr;
      gap: 40px;
      margin-bottom: 64px;
    }

    .footer-col h4 {
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: #A5C9E5;
      margin-bottom: 16px;
    }

    .footer-brand {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 16px;
      display: block;
      color: white;
    }

    .footer-desc {
      font-size: 13px;
      color: #E0F0FA;
      line-height: 1.6;
      margin-bottom: 24px;
    }

    .footer-tags {
      display: flex;
      gap: 12px;
      font-size: 13px;
      font-weight: 600;
      color: white;
    }

    .footer-tags span {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .footer-tags span::before {
      content: "";
      display: inline-block;
      width: 4px;
      height: 4px;
      background: white;
      border-radius: 50%;
    }

    .footer-links {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .footer-links a {
      font-size: 13px;
      color: #E0F0FA;
      transition: color 0.2s;
    }

    .footer-links a:hover {
      color: white;
      text-decoration: underline;
    }

    .footer-contact {
      font-size: 13px;
      color: #E0F0FA;
      margin-bottom: 16px;
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .footer-contact strong {
      color: white;
    }

    .footer-bottom {
      max-width: 1000px;
      margin: 0 auto;
      padding-top: 24px;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      display: flex;
      justify-content: space-between;
      font-size: 12px;
      color: #A5C9E5;
    }

    /* =========================================
       FLOATING EMERGENCY (SOS)
       ========================================= */
    .floating-emergency {
      position: fixed;
      bottom: 24px;
      right: 24px;
      z-index: 9999;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 12px;
    }

    .float-items {
      display: none;
      flex-direction: column;
      gap: 10px;
    }

    .floating-emergency.open .float-items {
      display: flex;
    }

    .float-item {
      background: #FFFFFF;
      color: #1F2937;
      padding: 12px 20px;
      border-radius: 30px;
      font-size: 14px;
      font-weight: 700;
      border: 1px solid #E5E7EB;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
      white-space: nowrap;
      text-decoration: none;
      transition: all 0.2s;
    }

    .float-item:hover {
      background: #266B9D;
      color: #FFFFFF;
    }

    .float-item.red {
      background: var(--danger-red);
      color: #FFFFFF;
    }

    .float-item.wa {
      background: #25D366;
      color: #FFFFFF;
      border-color: #25D366;
    }

    .float-item.wa:hover {
      background: #128C7E;
      border-color: #128C7E;
      color: #FFFFFF;
    }

    .float-item.red:hover {
      background: #962B16;
    }

    .float-btn {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      border: 0;
      background: var(--danger-red);
      color: #FFFFFF;
      font: 800 14px 'Plus Jakarta Sans', sans-serif;
      cursor: pointer;
      box-shadow: 0 6px 20px rgba(180, 53, 27, 0.4);
      transition: background 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .float-btn:hover {
      background: #962B16;
    }

    /* =========================================
       RESPONSIVE
       ========================================= */
    @media (max-width: 1024px) {
      .news-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }

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

      .hero-news-card {
        grid-template-columns: 1fr;
      }

      .hero-news-image {
        min-height: 220px;
      }

      .hero-news-content {
        padding: 22px;
      }

      .hero-news-title {
        font-size: 22px;
      }

      .section-header-news {
        flex-direction: column;
        align-items: flex-start;
      }

      .filter-group {
        flex-direction: column;
        width: 100%;
        align-items: flex-start;
      }

      .filter-select {
        width: 100%;
      }

      .news-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .source-footer {
        padding: 20px;
      }

      .footer {
        padding: 40px 20px 20px;
      }

      .footer-inner {
        grid-template-columns: 1fr;
        gap: 32px;
      }

      .footer-bottom {
        flex-direction: column;
        gap: 8px;
        text-align: center;
      }

      .floating-emergency {
        bottom: 16px;
        right: 16px;
      }
    }

    @media (max-width: 480px) {
      .news-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <!-- Page Header -->
  <div class="page-header">
    <div class="page-header-container">
      <h1>Daftar Orang Hilang</h1>
      <p>Bantu temukan mereka. Setiap informasi sangat berarti.</p>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-container">

    <!-- Laporan Utama -->
    <article class="hero-news-card">
      <div class="hero-news-image">
        <img src="<?= htmlspecialchars($hilang_utama['gambar']) ?>" alt="Foto <?= htmlspecialchars($hilang_utama['nama']) ?>">
        <span class="usia-badge"><?= htmlspecialchars((string)$hilang_utama['usia']) ?> th</span>
      </div>
      <div class="hero-news-content">
        <span class="badge-terkini">Laporan Terbaru</span>
        <h2 class="hero-news-title"><?= htmlspecialchars($hilang_utama['nama']) ?></h2>
        <div class="hero-news-meta">
          <?= htmlspecialchars($hilang_utama['jenis_kelamin']) ?>
          &middot; <?= htmlspecialchars($hilang_utama['usia']) ?> tahun
          &middot; <?= htmlspecialchars($hilang_utama['provinsi']) ?>
          &middot; <?= htmlspecialchars($hilang_utama['tanggal']) ?>
        </div>
        <p class="hero-news-excerpt"><?= htmlspecialchars($hilang_utama['ringkasan']) ?></p>
        
        <!-- Kontak Informasi diganti teks biasa -->
        <div class="hero-news-kontak">
          <strong>Kontak Informasi:</strong> <?= htmlspecialchars($hilang_utama['kontak']) ?>
        </div>
        
        <a href="https://wa.me/+6281161645500?text=Halo,%20saya%20ingin%20melaporkan%20atau%20meminta%20bantuan%20terkait%20bencana%20banjir." target="_blank" rel="noopener noreferrer" class="btn-primary">Punya informasi? Laporkan</a>
      </div>
    </article>

    <!-- Judul Semua Laporan -->
    <div class="section-header-news">
      <h2>Semua Laporan</h2>
      <div class="filter-group">
        <label for="filter-provinsi">Provinsi</label>
        <select id="filter-provinsi" class="filter-select">
          <option>Semua provinsi</option>
          <option>Aceh</option>
          <option>DKI Jakarta</option>
          <option>Jawa Barat</option>
          <option>Jawa Tengah</option>
          <option>Jawa Timur</option>
          <option>DI Yogyakarta</option>
          <option>Banten</option>
        </select>
      </div>
    </div>

    <!-- Grid Kartu Orang Hilang -->
    <div class="news-grid">
      <?php foreach($hilang_grid as $grid): ?>
      <div class="news-card">
        <div class="news-card-image">
          <img src="<?= htmlspecialchars($grid['gambar']) ?>" alt="Foto <?= htmlspecialchars($grid['nama']) ?>">
          <span class="usia-badge"><?= htmlspecialchars((string)$grid['usia']) ?> th</span>
        </div>
        <div class="news-card-content">
          <div class="row-top">
            <span class="badge-provinsi"><?= htmlspecialchars($grid['provinsi']) ?></span>
            <span class="usia-tag"><?= htmlspecialchars((string)$grid['usia']) ?> th</span>
          </div>
          <h3 class="news-card-title"><?= htmlspecialchars($grid['nama']) ?></h3>
          <div class="news-card-meta">
            <?= htmlspecialchars($grid['jenis_kelamin']) ?>
            &middot; <?= htmlspecialchars($grid['tanggal']) ?>
          </div>
          <p class="news-card-excerpt"><?= htmlspecialchars($grid['ringkasan']) ?></p>
          
          <!-- Kontak di grid diganti teks biasa -->
          <div class="news-card-kontak">
            <strong>Kontak:</strong> <?= htmlspecialchars($grid['kontak']) ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>

  <!-- Footer Sumber -->
  <div class="source-footer">
    <div class="source-footer-container">
      Sumber data: Laporan BPBD, BNPB, dan masyarakat. Segera hubungi kontak yang tertera jika memiliki informasi.
    </div>
  </div>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>