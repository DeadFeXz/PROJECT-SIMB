<?php
// includes/footer.php
?>
  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-col">
        <a href="index.php" class="footer-brand">Si Banjir</a>
        <p class="footer-desc">Sistem informasi manajemen bencana banjir di Pulau Jawa, perkiraan dampak, pola sebaran, dan data dampak per kabupaten/kota.</p>
        <div class="footer-tags">
          <span>Pulau Jawa</span>
          <span>Data 2020-2025</span>
        </div>
      </div>
      
      <div class="footer-col">
        <h4>Jelajahi</h4>
        <div class="footer-links">
          <a href="index.php">Beranda</a>
          <a href="peta.php">Peta Wilayah</a>
          <a href="berita.php">Berita</a>
        </div>
      </div>
      
      <div class="footer-col">
        <h4>Pelajari Banjir</h4>
        <div class="footer-links">
          <a href="index.php#what">Apa itu banjir?</a>
          <a href="index.php#why">Penyebab banjir</a>
          <a href="index.php#when">Waktu terjadinya</a>
          <a href="index.php#where">Daerah rawan</a>
          <a href="index.php#who">Pihak terkait</a>
          <a href="index.php#how">Penanggulangan</a>
        </div>
      </div>
      
      <div class="footer-col">
        <h4>Nomor Darurat</h4>
        <div class="footer-contact">
          <span><strong>Basarnas: 115</strong></span>
          <span><strong>BNPB: 117</strong></span>
        </div>
        
        <h4 style="margin-top: 24px;">Sumber Data</h4>
        <div class="footer-contact">
          <span>BPS, BPBD, dan BNPB</span>
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <span>© 2026 Si Banjir. Proyek tugas perkuliahan.</span>
      <span>Informasi banjir Pulau Jawa 2020–2025</span>
    </div>
  </footer>

      <!-- Menu Darurat Melayang -->
  <div class="floating-emergency" id="emergencyMenu">
    <div class="float-items">
      <!-- Tambahan Menu WhatsApp -->
      <a href="https://wa.me/+6281161645500?text=Halo,%20saya%20ingin%20melaporkan%20atau%20meminta%20bantuan%20terkait%20bencana%20banjir." target="_blank" rel="noopener noreferrer" class="float-item wa">WhatsApp Darurat</a>
      
      <!-- Menu sebelumnya -->
      <a href="tel:117" class="float-item red">BNPB: 117</a>
      <a href="tel:115" class="float-item">Basarnas: 115</a>
      <a href="tel:112" class="float-item">Darurat Terpadu: 112</a>
    </div>
    <button class="float-btn" onclick="document.getElementById('emergencyMenu').classList.toggle('open')" aria-label="Buka kontak darurat">
      SOS
    </button>
  </div>
</body>
</html>