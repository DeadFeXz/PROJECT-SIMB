<?php
// index.php
$judul_halaman = "Memahami Banjir di Pulau Jawa";
function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// Data statistik statis 
$stat = [
  ['Kejadian banjir 2020–2025', '3.018 Kali'],
  ['Jiwa terdampak', '12.355.738 Jiwa'],
  ['Pengungsi', '203 Jiwa'],
  ['Provinsi tercakup', '6 Provinsi'],
];
$sumber_stat = 'BNPB, BPBD, dan BPS';

// Berita
$berita = [
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

// Isi enam topik. 'kolom' = daftar [judul kartu, [poin...]]
$topik = [
  [
    'id' => 'what', 'label' => 'What', 'judul' => 'Apa itu banjir?', 'ringkas' => 'Definisi, dan empat jenisnya: sungai, bandang, genangan, dan rob.',
    'isi' => 'Banjir adalah kondisi ketika air meluap dan menggenangi daratan yang biasanya kering. Penyebab utamanya bisa berupa sungai yang meluap, hujan yang sangat deras, atau air laut yang naik ke daratan.',
    'kolom' => [
      ['Banjir Sungai', ['Debit sungai melebihi kapasitas alurnya sehingga air meluap ke bantaran dan permukiman. Sering terjadi di hilir saat hulu mengalami hujan ekstrem.']],
      ['Banjir Bandang', ['Datang tiba-tiba dengan arus deras membawa lumpur dan batu, umumnya di lembah dekat pegunungan.']],
      ['Banjir Genangan', ['Air hujan tidak terserap tanah atau tidak mengalir karena drainase tidak memadai, biasa di perkotaan padat.']],
      ['Banjir Rob', ['Air laut pasang masuk ke daratan, terutama di pesisir rendah yang mengalami penurunan muka tanah.']],
    ],
  ],
  [
    'id' => 'why', 'label' => 'Why', 'judul' => 'Mengapa banjir terjadi?', 'ringkas' => 'Gabungan faktor alam dan kegiatan manusia yang saling memperburuk.',
    'isi' => 'Banjir jarang disebabkan satu faktor saja. Biasanya ada gabungan antara kondisi alam dan kegiatan manusia yang saling memperburuk.',
    'kolom' => [
      ['Faktor alam', [
        'Curah hujan tinggi yang berlangsung lama.',
        'Pasang air laut yang menahan aliran sungai ke laut.',
        'Dataran rendah dan cekungan yang menampung aliran air.',
        'Tanah jenuh air sehingga tidak lagi menyerap hujan.',
        'La Nina yang meningkatkan intensitas hujan di Indonesia.',
      ]],
      ['Faktor manusia', [
        'Lahan resapan berubah menjadi permukiman dan jalan.',
        'Sampah menyumbat saluran dan sungai.',
        'Pendangkalan dan penyempitan sungai akibat sedimentasi.',
        'Penurunan muka tanah di kota pesisir.',
        'Berkurangnya ruang terbuka hijau dan area resapan.',
      ]],
    ],
  ],
  [
    'id' => 'when', 'label' => 'When', 'judul' => 'Kapan banjir sering terjadi?', 'ringkas' => 'Pola musim hujan dan waktu rawan banjir bandang serta rob.',
    'isi' => 'Di Pulau Jawa, musim hujan umumnya berlangsung dari Oktober hingga Maret dengan puncak pada Januari–Februari. Waktunya bisa bergeser tiap tahun dan berbeda antarwilayah, jadi prakiraan BMKG perlu dipantau.',
    'kolom' => [
      ['Pola sepanjang musim', [
        'Oktober–Desember: awal musim hujan, banjir genangan mulai muncul di perkotaan.',
        'Januari–Februari: puncak musim hujan, banjir sungai dan bandang paling sering.',
        'Maret: hujan berkurang, tetapi banjir rob tetap berisiko saat pasang tinggi.',
      ]],
      ['Perlu diingat', [
        'Banjir bandang dapat terjadi dalam hitungan jam setelah hujan lebat di hulu.',
        'Banjir rob mengikuti pasang laut dan bisa terjadi tanpa hujan di lokasi tersebut.',
        'Data historis di halaman Peta Wilayah membantu melihat pola dari waktu ke waktu.',
      ]],
    ],
  ],
  [
    'id' => 'where', 'label' => 'Where', 'judul' => 'Di mana daerah rawannya?', 'ringkas' => 'Bantaran sungai, pesisir utara, kawasan padat, dan lembah pegunungan.',
    'isi' => 'Wilayah rawan umumnya berada di dataran rendah, bantaran sungai, cekungan, dan pesisir. Kota-kota di aliran sungai besar dan pantai utara Jawa sering terdampak.',
    'kolom' => [
      ['Tingkat rawan tinggi', [
        'Bantaran sungai dan hilir: Jakarta, Solo, Surabaya.',
        'Pesisir utara yang landai: Semarang, Pekalongan, Demak.',
      ]],
      ['Tingkat rawan sedang', [
        'Perkotaan padat dan minim resapan: Bandung, Bekasi, Tangerang.',
        'Lereng dan lembah pegunungan: Garut, Bogor, Malang.',
      ]],
    ],
    'tombol' => ['peta.php', 'Lihat sebaran per provinsi di peta'],
  ],
  [
    'id' => 'who', 'label' => 'Who', 'judul' => 'Siapa yang terlibat?', 'ringkas' => 'Warga terdampak dan pihak yang menangani, dari BNPB hingga relawan.',
    'isi' => 'Banjir berdampak pada warga di wilayah rawan, sedangkan penanganannya melibatkan banyak pihak dari tingkat nasional sampai desa. Koordinasi lintas sektor menjadi kunci respons bencana.',
    'kolom' => [
      ['Yang terdampak', [
        'Warga yang tinggal di wilayah rawan banjir.',
        'Kelompok rentan: anak-anak, lansia, ibu hamil, dan penyandang disabilitas.',
        'Petani dan pelaku usaha kecil yang kehilangan lahan, stok, atau tempat usaha.',
        'Pekerja informal yang kehilangan penghasilan harian.',
      ]],
      ['Yang menangani', [
        'BNPB di tingkat nasional dan BPBD di provinsi serta kabupaten/kota.',
        'TNI, Polri, Basarnas, dan PMI membantu evakuasi dan bantuan.',
        'Pemerintah desa dan relawan sebagai penolong pertama di lapangan.',
        'BMKG menyediakan prakiraan cuaca dan peringatan dini.',
      ]],
    ],
  ],
  [
    'id' => 'how', 'label' => 'How', 'judul' => 'Bagaimana penanggulangannya?', 'ringkas' => 'Langkah sebelum, saat, dan sesudah banjir.', 'merah' => true,
    'isi' => 'Penanggulangan berlangsung dalam tiga tahap, dikenal sebagai siklus manajemen bencana. Persiapan sebelum banjir menentukan seberapa besar kerugian yang bisa dicegah.',
    'kolom' => [
      ['1. Sebelum banjir', [
        'Jaga saluran air bersih dan jangan buang sampah ke sungai.',
        'Ketahui jalur dan tempat evakuasi.',
        'Siapkan tas siaga bencana dan dokumen penting.',
        'Pantau peringatan cuaca BMKG.',
        'Ikut pelatihan mitigasi bencana.',
      ]],
      ['2. Saat banjir', [
        'Matikan listrik dan gas.',
        'Segera menuju ke tempat yang lebih tinggi.',
        'Jangan berjalan atau berkendara menembus arus.',
        'Ikuti arahan petugas.',
        'Hubungi nomor darurat jika butuh bantuan.',
      ]],
      ['3. Sesudah banjir', [
        'Pastikan bangunan aman sebelum kembali.',
        'Bersihkan rumah dan perhatikan sanitasi.',
        'Waspadai penyakit seperti diare dan leptospirosis.',
        'Laporkan kerusakan ke petugas setempat.',
        'Dokumentasikan kerugian untuk klaim bantuan.',
      ]],
    ],
  ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Si Banjir - <?= e($judul_halaman) ?></title>
  <meta name="description" content="Sistem informasi manajemen bencana banjir di Pulau Jawa: data kejadian 2020–2025, peta sebaran per kabupaten/kota, dan panduan penanggulangan.">
  <meta property="og:title" content="Si Banjir - <?= e($judul_halaman) ?>">
  <meta property="og:description" content="Data kejadian banjir Pulau Jawa 2020–2025 dan panduan penanggulangan.">
  <link rel="icon" type="image/png" href="assets/img/sibanjir_logo.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* =========================================
       ROOT & RESET
       ========================================= */
    :root {
      --blue: #266B9D; 
      --blue-dark: #1C547B; 
      --navy: #0F2C46; 
      --navy-2: #173F5F;
      --bg-light: #F5F8FA; 
      --white: #fff;
      --text: #1F2937; 
      --text-gray: #4B5563; 
      --border: #E5E7EB;
      --red: #B4351B; 
      --accent: #E85D3F;
      --font: 'Plus Jakarta Sans', sans-serif;
    }
    
    * { 
      margin: 0; 
      padding: 0; 
      box-sizing: border-box; 
    }
    
    html { 
      scroll-behavior: smooth; 
      scroll-padding-top: 90px; 
    }
    
    body { 
      font-family: var(--font); 
      color: var(--text); 
      line-height: 1.6; 
      background: var(--white); 
      -webkit-font-smoothing: antialiased; 
      overflow-x: hidden; 
    }
    
    a { 
      color: inherit; 
      text-decoration: none; 
    }
    
    a:focus-visible, 
    button:focus-visible { 
      outline: 3px solid var(--accent); 
      outline-offset: 2px; 
    }
    
    .wrap { 
      max-width: 1160px; 
      margin: 0 auto; 
      padding: 0 40px; 
    }
    
    .eyebrow { 
      font-size: 13px; 
      font-weight: 800; 
      letter-spacing: 2px; 
      text-transform: uppercase; 
      color: var(--blue); 
    }
    
    .label { 
      font-size: 12px; 
      font-weight: 700; 
      letter-spacing: 1.5px; 
      text-transform: uppercase; 
      color: var(--text-gray); 
    }

    /* =========================================
       NAVBAR
       ========================================= */
    .navbar { 
      display: grid; 
      grid-template-columns: 1fr auto 1fr; 
      align-items: center; 
      padding: 14px 40px; 
      background: rgba(255,255,255,.96);
      backdrop-filter: blur(10px); 
      border-bottom: 1px solid var(--border); 
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
      height: 40px; 
      width: auto; 
    }
    
    .brand span { 
      font-size: 22px; 
      font-weight: 800; 
      color: var(--navy); 
      letter-spacing: -.5px; 
    }
    
    .nav-pills { 
      display: flex; 
      gap: 6px; 
      background: var(--bg-light); 
      border: 1px solid var(--border); 
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
    }
    
    .nav-pills a:hover { 
      background: var(--white); 
      color: var(--blue); 
    }
    
    .nav-pills a.active { 
      background: var(--blue); 
      color: var(--white); 
    }
    
    .btn-emergency { 
      justify-self: end; 
      background: var(--red); 
      color: var(--white); 
      font-size: 14px; 
      font-weight: 700; 
      padding: 12px 20px; 
      border-radius: 10px; 
    }
    
    .btn-emergency:hover { 
      background: #962B16; 
    }

    /* =========================================
       BUTTONS
       ========================================= */
    .btn { 
      display: inline-block; 
      font-size: 16px; 
      font-weight: 700; 
      padding: 16px 28px; 
      border-radius: 10px; 
      transition: transform .2s, box-shadow .2s; 
    }
    
    .btn:hover { 
      transform: translateY(-2px); 
    }
    
    .btn-light { 
      background: var(--white); 
      color: var(--navy); 
    }
    
    .btn-outline { 
      border: 1px solid rgba(255,255,255,.5); 
      color: var(--white); 
      font-weight: 600; 
    }
    
    .btn-outline:hover { 
      background: rgba(255,255,255,.1); 
    }

    /* =========================================
       HERO & WAVE ANIMATION
       ========================================= */
    .hero { 
      background: var(--blue); 
      color: var(--white); 
      position: relative;
      overflow: hidden;
      padding-bottom: 20px;
    }
    
    .hero .wrap { 
      display: grid; 
      grid-template-columns: 1.1fr .9fr; 
      gap: 56px; 
      align-items: center; 
      padding-top: 88px; 
      padding-bottom: 100px; 
      position: relative;
      z-index: 2;
    }
    
    .hero-tag { 
      display: inline-block; 
      font-size: 12px; 
      font-weight: 700; 
      letter-spacing: 2px; 
      text-transform: uppercase; 
      color: #A5C9E5; 
      border: 1px solid rgba(255,255,255,.3); 
      padding: 6px 14px; 
      border-radius: 20px; 
      margin-bottom: 24px; 
    }
    
    .hero h1 { 
      font-size: 54px; 
      line-height: 1.1; 
      font-weight: 800; 
      letter-spacing: -1.5px; 
      margin-bottom: 24px; 
    }
    
    .hero p { 
      font-size: 18px; 
      line-height: 1.65; 
      color: #D6E6F2; 
      max-width: 520px; 
      margin-bottom: 28px; 
    }
    
    .hero-actions { 
      display: flex; 
      gap: 12px; 
      flex-wrap: wrap; 
    }
    
    .hero-map { 
      background: var(--navy-2); 
      border: 1px solid rgba(255,255,255,.15); 
      border-radius: 20px; 
      min-height: 340px; 
      display: flex; 
      flex-direction: column; 
      align-items: center; 
      justify-content: center; 
      gap: 8px; 
      text-align: center; 
      padding: 32px; 
      color: #A5C9E5; 
      transition: border-color .2s; 
    }
    
    .hero-map:hover { 
      border-color: rgba(255,255,255,.5); 
    }
    
    .hero-map strong { 
      color: var(--white); 
      font-size: 18px; 
    }

    /* Gelombang Air */
    .wave-wrapper {
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      line-height: 0;
      z-index: 1;
    }
    
    .waves {
      position: relative;
      width: 100%;
      height: 100px;
      margin-bottom: -7px;
    }
    
    .parallax > use {
      animation: move-forever 12s cubic-bezier(.55,.5,.45,.5) infinite;
    }
    
    .parallax > use:nth-child(1) { animation-delay: -2s; animation-duration: 7s; }
    .parallax > use:nth-child(2) { animation-delay: -3s; animation-duration: 10s; }
    .parallax > use:nth-child(3) { animation-delay: -4s; animation-duration: 13s; }
    .parallax > use:nth-child(4) { animation-delay: -5s; animation-duration: 20s; }
    
    @keyframes move-forever {
      0% { transform: translate3d(-90px, 0, 0); }
      100% { transform: translate3d(85px, 0, 0); }
    }

    /* =========================================
       STRIP DATA
       ========================================= */
    .stats { 
      margin-top: -40px; 
      position: relative; 
      z-index: 2; 
    }
    
    .stats-box { 
      background: var(--white); 
      border: 1px solid var(--border); 
      border-radius: 20px; 
      box-shadow: 0 12px 32px rgba(15,44,70,.12); 
      display: grid; 
      grid-template-columns: repeat(4, 1fr); 
      gap: 20px; 
      padding: 32px 40px; 
    }
    
    .stat-value { 
      font-size: clamp(20px, 2.2vw, 28px); 
      font-weight: 800; 
      color: var(--blue); 
      letter-spacing: -1px; 
      line-height: 1.2; 
      white-space: nowrap; 
      display: block; 
    }
    
    .stat-value .label {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--text-gray);
      margin-top: 8px;
      line-height: 1.4;
    }
    
    .stats-src { 
      font-size: 12px; 
      color: var(--text-gray); 
      margin-top: 10px; 
    }

    /* =========================================
       SECTION & CARDS
       ========================================= */
    .section { 
      padding: 96px 0 40px; 
    }
    
    .section-head { 
      max-width: 620px; 
      margin-bottom: 40px; 
    }
    
    .section-head h2, 
    .news h2 { 
      font-size: 38px; 
      font-weight: 800; 
      letter-spacing: -1px; 
      margin: 8px 0 12px; 
      line-height: 1.2; 
    }
    
    .section-head p { 
      font-size: 16px; 
      line-height: 1.7; 
      color: var(--text-gray); 
    }
    
    .grid { 
      display: grid; 
      grid-template-columns: repeat(3, 1fr); 
      gap: 20px; 
    }
    
    .grid-2 { 
      grid-template-columns: repeat(2, 1fr); 
    }
    
    .grid-4 {
      grid-template-columns: repeat(4, 1fr);
    }

    /* Gaya Default Semua Kartu */
    .card { 
      background: var(--white); 
      border: 1px solid var(--border); 
      border-radius: 16px; 
      padding: 28px; 
      display: flex; 
      flex-direction: column; 
      gap: 10px; 
      transition: transform .25s, box-shadow .25s, border-color .25s; 
    }
    
    a.card:hover { 
      transform: translateY(-4px); 
      box-shadow: 0 12px 24px rgba(0,0,0,.08); 
      border-color: #CFE0EE; 
    }
    
    .card h3 { 
      font-size: 20px; 
      font-weight: 800; 
      line-height: 1.3; 
    }
    
    .card p { 
      font-size: 14px; 
      line-height: 1.65; 
      color: var(--text-gray); 
    }

    /* Gaya Khusus 6 Kotak 5W1H (Biru Tua) */
    #pelajari .card {
      border-left: 4px solid var(--navy);
    }
    
    #pelajari .card .eyebrow {
      color: var(--navy);
    }

    #pelajari a.card:hover { 
      border-left-color: var(--blue);
      border-top-color: #CFE0EE;
      border-right-color: #CFE0EE;
      border-bottom-color: #CFE0EE;
    }

    
    
   

    /* =========================================
       DETAIL TOPIK
       ========================================= */
    .topic { 
      padding: 80px 0; 
      scroll-margin-top: 70px; 
    }
    
    .topic.alt { 
      background: var(--bg-light); 
    }
    
    .topic-head { 
      max-width: 720px; 
      margin-bottom: 32px; 
    }
    
    .topic-head h2 { 
      font-size: 32px; 
      font-weight: 800; 
      letter-spacing: -.5px; 
      margin: 8px 0 14px; 
      line-height: 1.25; 
    }
    
    .topic-head p { 
      font-size: 16px; 
      line-height: 1.75; 
      color: var(--text-gray); 
    }
    
    .topic ul { 
      list-style: none; 
      display: flex; 
      flex-direction: column; 
      gap: 10px; 
    }
    
    .topic li { 
      position: relative; 
      padding-left: 18px; 
      font-size: 14px; 
      line-height: 1.65; 
      color: var(--text-gray); 
    }
    
    .topic li::before { 
      content: ""; 
      position: absolute; 
      left: 0; 
      top: 10px; 
      width: 6px; 
      height: 6px; 
      border-radius: 50%; 
      background: var(--blue); 
    }
    
    .topic .card h3 { 
      font-size: 17px; 
    }
    
    .topic-link { 
      display: inline-block; 
      margin-top: 28px; 
    }
    
    .btn-blue { 
      background: var(--blue); 
      color: var(--white); 
    }
    
    .btn-blue:hover { 
      background: var(--blue-dark); 
    }

    /* KHUSUS JENIS BANJIR (4 KOTAK) */
    .grid-4 .topic ul { gap: 0; }
    .grid-4 .topic li { padding-left: 0; }
    .grid-4 .topic li::before { display: none; }

    /* KHUSUS TIMELINE (POLA MUSIM) */
    #when ul { position: relative; }
    #when ul::before {
      content: "";
      position: absolute;
      left: 2px;
      top: 15px;
      bottom: 15px;
      width: 2px;
      background: #CFE0EE;
    }

    /* =========================================
       BERITA
       ========================================= */
    .news { 
      padding: 56px 0 96px; 
    }
    
    .news-head { 
      display: flex; 
      justify-content: space-between; 
      align-items: end; 
      margin-bottom: 28px; 
      gap: 16px; 
    }
    
    .news h2 { 
      font-size: 32px; 
      margin: 0; 
    }
    
    .news-head a { 
      font-size: 15px; 
      font-weight: 700; 
      color: var(--blue); 
    }
    
    .news-card { 
      padding: 0; 
      overflow: hidden; 
    }
    
    .news-img { 
      height: 160px; 
      background: #E5EDF3; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
      font-size: 13px; 
      color: var(--text-gray); 
    }
    
    .news-img img { 
      width: 100%; 
      height: 100%; 
      object-fit: cover; 
    }
    
    .news-body { 
      padding: 20px 24px 24px; 
    }
    
    .news-body h3 { 
      font-size: 17px; 
      margin-top: 8px; 
    }

    /* =========================================
       FOOTER (WARNA PRIMARY BLUE)
       ========================================= */
    .footer { 
      background: var(--blue); 
      color: var(--white); 
      padding: 56px 0 24px; 
    }
    
    .footer-inner { 
      display: grid; 
      grid-template-columns: 2fr 1fr 1fr 1.4fr; 
      gap: 40px; 
      padding-bottom: 40px; 
      max-width: 1160px; 
      margin: 0 auto; 
      padding-left: 40px; 
      padding-right: 40px; 
    }
    
    .footer h4 { 
      font-size: 12px; 
      font-weight: 700; 
      letter-spacing: 1px; 
      text-transform: uppercase; 
      color: #A5C9E5; /* Teks judul kolom lebih terang */
      margin-bottom: 14px; 
    }
    
    .footer-brand { 
      font-size: 20px; 
      font-weight: 800; 
      display: block; 
      margin-bottom: 12px; 
    }
    
    .footer-desc { 
      font-size: 13px; 
      line-height: 1.7; 
      color: #E0F0FA; /* Teks deskripsi lebih terang */
      margin-bottom: 16px; 
    }
    
    .footer-tags { 
      display: flex; 
      gap: 14px; 
      font-size: 13px; 
      font-weight: 600; 
    }
    
    .footer-links { 
      display: flex; 
      flex-direction: column; 
      gap: 10px; 
      font-size: 14px; 
      color: #E0F0FA; /* Tautan lebih terang */
    }
    
    .footer-links a:hover { 
      color: var(--white); 
      text-decoration: underline; 
    }
    
    .footer-bottom { 
      border-top: 1px solid rgba(255,255,255,.2); /* Garis batas lebih terang */
      padding-top: 20px; 
      display: flex; 
      justify-content: space-between; 
      gap: 12px; 
      flex-wrap: wrap; 
      font-size: 12px; 
      color: #A5C9E5; /* Teks copyright lebih terang */
      max-width: 1160px; 
      margin: 0 auto; 
      padding-left: 40px; 
      padding-right: 40px; 
    }

    /* =========================================
       FLOATING EMERGENCY
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
      box-shadow: 0 4px 15px rgba(0,0,0,.15); 
      white-space: nowrap; 
      text-decoration: none; 
      transition: all 0.2s; 
    }
    
    .float-item:hover { 
      background: #266B9D; 
      color: #FFFFFF; 
    }
    
    .float-item.red { 
      background: #B4351B; 
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
      background: #B4351B; 
      color: #FFFFFF; 
      font: 800 14px 'Plus Jakarta Sans', sans-serif; 
      cursor: pointer; 
      box-shadow: 0 6px 20px rgba(180,53,27,.4); 
      transition: background 0.2s; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
    }
    
    .float-btn:hover { 
      background: #962B16; 
    }

    /* =========================================
       ANIMASI SCROLL
       ========================================= */
    .js .reveal { 
      opacity: 0; 
      transform: translateY(32px); 
      transition: opacity .7s ease, transform .7s ease; 
    }
    
    .js .reveal.active { 
      opacity: 1; 
      transform: none; 
    }
    
    @media (prefers-reduced-motion: reduce) {
      html { 
        scroll-behavior: auto; 
      }
      .js .reveal { 
        opacity: 1; 
        transform: none; 
        transition: none; 
      }
      * { 
        transition: none !important; 
      }
    }

    /* =========================================
       RESPONSIVE (MOBILE & TABLET)
       ========================================= */
    @media (max-width: 960px) {
      .hero .wrap { 
        grid-template-columns: 1fr; 
        padding-bottom: 110px; 
      }
      .hero h1 { 
        font-size: 42px; 
      }
      .grid, .grid-4 { 
        grid-template-columns: repeat(2, 1fr); 
      }
      .footer-inner { 
        grid-template-columns: 1fr 1fr; 
      }
    }
    
    @media (max-width: 680px) {
      .wrap { 
        padding: 0 20px; 
      }
      .navbar { 
        grid-template-columns: 1fr auto; 
        gap: 10px; 
        padding: 10px 20px; 
      }
      .nav-pills { 
        grid-column: 1 / -1; 
        grid-row: 2; 
        justify-content: center; 
      }
      .nav-pills a { 
        padding: 8px 16px; 
        font-size: 13px; 
      }
      .btn-emergency { 
        padding: 10px 14px; 
        font-size: 13px; 
      }
      .hero .wrap { 
        padding-top: 56px; 
      }
      .hero h1 { 
        font-size: 34px; 
      }
      .section { 
        padding-top: 64px; 
      }
      .section-head h2 { 
        font-size: 30px; 
      }
      .grid, .grid-2, .grid-4 { 
        grid-template-columns: 1fr; 
      }
      .stats-box { 
        grid-template-columns: 1fr; 
        padding: 24px; 
      }
      .topic { 
        padding: 56px 0; 
      }
      .cta { 
        padding: 56px 20px; 
      }
      .footer-inner { 
        grid-template-columns: 1fr; 
        gap: 28px; 
        padding-left: 20px; 
        padding-right: 20px; 
      }
      .footer-bottom { 
        padding-left: 20px; 
        padding-right: 20px; 
      }
      .floating-emergency { 
        bottom: 16px; 
        right: 16px; 
      }
    }
  </style>
</head>
<body>

  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <main id="konten">

    <!-- HERO -->
    <section class="hero">
      <div class="wrap">
        <div>
          <span class="hero-tag">Sistem Informasi Manajemen Bencana</span>
          <h1>Pahami banjir di Pulau Jawa, lihat sebarannya.</h1>
          <p>Data kejadian, korban terdampak, dan pengungsi per kabupaten/kota, 2020–2025, lengkap dengan panduan sebelum, saat, dan sesudah banjir.</p>
          <div class="hero-actions">
            <a href="peta.php" class="btn btn-light">Buka Peta Wilayah</a>
            <a href="#pelajari" class="btn btn-outline">Pelajari dasar banjir</a>
          </div>
        </div>
        <a href="peta.php" class="hero-map">
          <strong>Peta interaktif Pulau Jawa</strong>
          <span>Klik untuk melihat titik kejadian per provinsi</span>
        </a>
      </div>

      <!-- ANIMASI GELOMBANG AIR -->
      <div class="wave-wrapper">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
            <use xlink:href="#gentle-wave" x="48" y="7" fill="#FFFFFF" />
          </g>
        </svg>
      </div>
    </section>

    <!-- STRIP DATA -->
    <div class="wrap stats">
      <div class="stats-box reveal">
        <?php foreach ($stat as [$label, $nilai]): ?>
          <div>
            <div class="stat-value"><?= $nilai === null ? '—' : e(is_numeric($nilai) ? number_format($nilai, 0, ',', '.') : $nilai) ?></div>
            <div class="label"><?= e($label) ?></div>
          </div>
        <?php endforeach; ?>
      </div>
      <p class="stats-src">Sumber: <?= e($sumber_stat) ?></p>
    </div>

    <!-- RINGKASAN 5W1H -->
    <section class="section" id="pelajari">
      <div class="wrap">
        <div class="section-head reveal">
          <span class="eyebrow">Pelajari banjir</span>
          <h2>Enam pertanyaan dasar tentang banjir</h2>
          <p>Pilih satu untuk langsung menuju penjelasannya.</p>
        </div>
        <div class="grid">
          <?php foreach ($topik as $i => $t): ?>
            <!-- Kelas card-red hanya ditambahkan pada kotak ke-6 (How) -->
            <a href="#<?= e($t['id']) ?>" class="card reveal<?= !empty($t['merah']) ? ' card-red' : '' ?>">
              <span class="eyebrow"><?= sprintf('%02d', $i + 1) ?> · <?= e($t['label']) ?></span>
              <h3><?= e($t['judul']) ?></h3>
              <p><?= e($t['ringkas']) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- DETAIL TOPIK -->
    <?php foreach ($topik as $i => $t): $n = count($t['kolom']); ?>
      <section id="<?= e($t['id']) ?>" class="topic<?= $i % 2 === 0 ? '' : ' alt' ?>">
        <div class="wrap reveal">
          <div class="topic-head">
            <span class="eyebrow"><?= sprintf('%02d', $i + 1) ?> · <?= e($t['label']) ?></span>
            <h2><?= e($t['judul']) ?></h2>
            <p><?= e($t['isi']) ?></p>
          </div>
          <div class="grid <?= $n === 4 ? 'grid-4' : ($n === 2 ? 'grid-2' : ($n === 1 ? 'grid-2' : '')) ?>">
            <?php foreach ($t['kolom'] as [$judul_kartu, $poin]): ?>
              <div class="card">
                <h3><?= e($judul_kartu) ?></h3>
                <ul>
                  <?php foreach ($poin as $p): ?><li><?= e($p) ?></li><?php endforeach; ?>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if (!empty($t['tombol'])): ?>
            <a href="<?= e($t['tombol'][0]) ?>" class="btn btn-blue topic-link"><?= e($t['tombol'][1]) ?></a>
          <?php endif; ?>
        </div>
      </section>
    <?php endforeach; ?>

    <!-- BERITA TERBARU -->
    <section class="news">
      <div class="wrap">
        <div class="news-head">
          <h2>Berita banjir seluruh Indonesia</h2>
          <a href="berita.php">Lihat semua berita</a>
        </div>
        <div class="grid">
          <?php foreach ($berita as $b): ?>
            <a href="<?= e($b['url']) ?>" class="card news-card reveal">
              <div class="news-img">
                <?php if ($b['gambar']): ?><img src="<?= e($b['gambar']) ?>" alt="" loading="lazy"><?php else: ?>Foto berita<?php endif; ?>
              </div>
              <div class="news-body">
                <div class="label"><?= e($b['tanggal']) ?> · <?= e($b['sumber']) ?></div>
                <h3><?= e($b['judul']) ?></h3>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>