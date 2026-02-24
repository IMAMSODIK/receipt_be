<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receipt Photobox · cuci cetak struk</title>
  <!-- Font Awesome 6 (free) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    body {
      background: #f5f3f0;  /* paper tone */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 1.5rem;
    }

    .receipt-card {
      max-width: 1100px;
      width: 100%;
      background: #fffcf8;
      border-radius: 40px 40px 20px 20px;
      box-shadow: 0 25px 45px -12px rgba(0,0,0,0.25), 0 2px 10px 0 rgba(0,0,0,0.08);
      overflow: hidden;
      border: 1px solid #e9dacb;
      position: relative;
    }

    /* decorative receipt edge */
    .receipt-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 96%;
      height: 18px;
      background: repeating-linear-gradient(90deg, 
        transparent, 
        transparent 8px, 
        #e0cfbc 8px, 
        #e0cfbc 16px);
      border-radius: 0 0 12px 12px;
      opacity: 0.7;
    }

    .receipt-header {
      text-align: center;
      padding: 2.2rem 2rem 1.5rem;
      background: linear-gradient(165deg, #faf5ee 0%, #fffaf4 100%);
      border-bottom: 2px dashed #dbbd9c;
    }

    .store-name {
      font-size: 2.2rem;
      font-weight: 700;
      letter-spacing: 1px;
      color: #2e241b;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      flex-wrap: wrap;
    }

    .store-name i {
      color: #b45f2b;
      font-size: 2.4rem;
    }

    .tagline {
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 4px;
      color: #9b7c64;
      margin-top: 8px;
      border-bottom: 1px dotted #dcc9b6;
      padding-bottom: 12px;
      display: inline-block;
    }

    /* photobox image mockup — gambar struk dan kamera */
    .photo-showcase {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: center;
      gap: 2rem;
      padding: 2rem 2rem 1rem;
      background: #fff6ed;
    }

    .illustration {
      flex: 1 1 260px;
      display: flex;
      justify-content: center;
      filter: drop-shadow(0 10px 8px #dfcfbe);
    }

    .struk-picture {
      background: white;
      padding: 20px 18px 18px 18px;
      border-radius: 30px 8px 30px 8px;
      box-shadow: 8px 8px 0 #977b62, 0 15px 25px -10px rgba(0,0,0,0.3);
      border: 2px solid #cbb295;
      transform: rotate(-1deg);
      max-width: 320px;
      width: 100%;
    }

    .struk-picture .photo-area {
      background: #1e1a16;
      border-radius: 16px 16px 6px 6px;
      padding: 8px;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .photo-area .camera-icon {
      font-size: 3.8rem;
      filter: drop-shadow(0 4px 2px #00000055);
      margin: 6px 0 2px;
    }

    .photo-area .fake-photo {
      width: 100%;
      height: 120px;
      background: #322b24;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: radial-gradient(circle at 20px 30px, #ffeecc22 1px, transparent 1px), 
                        linear-gradient(145deg, #4f4237, #2a241e);
      background-size: 30px 30px, 100%;
      border: 2px solid #ffeecc;
    }

    .fake-photo span {
      background: #eabb90cc;
      padding: 6px 14px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.9rem;
      color: #251e17;
      backdrop-filter: blur(1px);
    }

    .receipt-details {
      background: #fff6e8;
      padding: 14px 18px;
      border-radius: 14px;
      margin-top: 10px;
      font-family: 'Courier New', monospace;
      border: 1px dashed #ab8b6f;
      color: #352c24;
    }

    .detail-line {
      display: flex;
      justify-content: space-between;
      border-bottom: 1px dotted #b7a084;
      padding: 5px 0;
    }

    .detail-line:last-child {
      border-bottom: none;
      font-weight: 700;
      font-size: 1.1rem;
    }

    .cashier-notes {
      flex: 1 1 260px;
      background: #f4e9de;
      padding: 1.8rem 1.5rem;
      border-radius: 28px 28px 28px 4px;
      box-shadow: inset 0 1px 4px #fffcf8, 0 10px 12px -8px #ad9a88;
      border: 1px solid #e2cdb7;
    }

    .cashier-notes h3 {
      font-size: 1.8rem;
      font-weight: 600;
      color: #4b3727;
      border-left: 8px solid #b45f2b;
      padding-left: 18px;
      margin-bottom: 20px;
    }

    .price-tag-large {
      background: #1f2a1b;
      color: #f5e1c4;
      padding: 16px 20px;
      border-radius: 60px;
      font-size: 2.8rem;
      font-weight: 800;
      display: inline-block;
      margin: 10px 0 16px;
      box-shadow: 0 6px 0 #0f130e;
      letter-spacing: 2px;
      border: 1px solid #d5b185;
    }

    .price-tag-large span {
      font-size: 1.4rem;
      font-weight: 400;
      margin-right: 8px;
      color: #e1c6a5;
    }

    .service-list {
      list-style: none;
      margin: 25px 0 10px;
    }

    .service-list li {
      font-size: 1.25rem;
      padding: 8px 0;
      border-bottom: 1px solid #d8bea5;
      display: flex;
      align-items: center;
      gap: 12px;
      color: #392f27;
    }

    .service-list i.fa-check-circle {
      color: #2a7a3b;
      font-size: 1.6rem;
      width: 32px;
    }

    .service-list i.fa-camera-retro {
      color: #9b5e2e;
    }

    .btn-order {
      background: #c3682c;
      border: none;
      color: white;
      font-weight: 700;
      font-size: 1.7rem;
      padding: 18px 40px;
      border-radius: 60px;
      width: 100%;
      cursor: pointer;
      transition: all 0.15s;
      box-shadow: 0 12px 0 #6f3d18, 0 4px 18px #d49c6c;
      letter-spacing: 1px;
      margin-top: 30px;
      border: 1px solid #fad6b3;
    }

    .btn-order i {
      margin-right: 15px;
      font-size: 2rem;
    }

    .btn-order:hover {
      background: #d97634;
      transform: translateY(-3px);
      box-shadow: 0 15px 0 #6f3d18, 0 8px 24px #be8b5a;
    }

    .btn-order:active {
      transform: translateY(6px);
      box-shadow: 0 6px 0 #6f3d18;
    }

    /* harga 10.000 spesial */
    .harga-badge {
      background: #f7d9b3;
      padding: 8px 25px;
      border-radius: 50px;
      font-weight: 700;
      color: #4e301b;
      font-size: 2rem;
      border: 2px solid #b45f2b;
      display: inline-block;
      margin: 20px 0 4px;
    }

    .footer-note {
      background: #dccbb9;
      padding: 1.2rem;
      text-align: center;
      color: #2d1f14;
      font-size: 1.15rem;
      border-top: 2px dashed #ab7f5e;
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .footer-note i {
      color: #1e3b2b;
      margin: 0 6px;
    }

    /* responsif */
    @media (max-width: 650px) {
      .store-name { font-size: 1.8rem; }
      .price-tag-large { font-size: 2.2rem; }
      .btn-order { font-size: 1.4rem; padding: 16px 25px; }
    }
  </style>
</head>
<body>
  <div class="receipt-card">

    <!-- header struk -->
    <div class="receipt-header">
      <div class="store-name">
        <i class="fas fa-receipt"></i> 
        RECEIPT PHOTOBOX
        <i class="fas fa-camera"></i>
      </div>
      <div class="tagline">──  cetak fotomu  ala struk belanja  ──</div>
    </div>

    <!-- bagian gambar + cashier notes -->
    <div class="photo-showcase">
      <!-- kiri : gambar photobox (struk dengan foto) -->
      <div class="illustration">
        <div class="struk-picture">
          <div class="photo-area">
            <i class="fas fa-camera-retro camera-icon"></i>
            <div class="fake-photo">
              <span><i class="fas fa-image"></i> FOTO ANDA</span>
            </div>
          </div>
          <div class="receipt-details">
            <div class="detail-line"><span>PHOTO (2x3)</span> <span>1 lembar</span></div>
            <div class="detail-line"><span>kertas thermal</span> <span>struk original</span></div>
            <div class="detail-line"><span>tanggal</span> <span>24 Feb 2026</span></div>
            <div class="detail-line"><span>TOTAL</span> <span style="color:#b2501a;">Rp10.000</span></div>
          </div>
          <div style="text-align: right; font-size:0.8rem; margin-top:8px; color:#735e4b;">
            <i class="fas fa-scissors"></i> gunting disini
          </div>
        </div>
      </div>

      <!-- kanan : harga dan layanan (highlight 10.000) -->
      <div class="cashier-notes">
        <h3><i class="fas fa-cash-register" style="margin-right: 10px;"></i> KASIR #23</h3>
        
        <!-- HARGA UTAMA 10.000 muncul besar -->
        <div class="harga-badge">
          <i class="fas fa-tag"></i> Rp 10.000
        </div>
        <p style="font-size: 1.1rem; margin: 0 0 10px 0; color: #4c3b2d;">
          <i class="fas fa-star" style="color:#c26122;"></i> per foto struk 
          <i class="fas fa-star" style="color:#c26122;"></i>
        </p>

        <!-- layanan -->
        <ul class="service-list">
          <li><i class="fas fa-check-circle"></i> Cetak instan 30 detik</li>
          <li><i class="fas fa-check-circle"></i> Bisa pilih filter struk</li>
          <li><i class="fas fa-camera-retro"></i> <strong>Photobox booth</strong> – foto langsung jadi</li>
          <li><i class="fas fa-check-circle"></i> Desain struk dengan teks / tanggal</li>
          <li><i class="fas fa-receipt"></i> Tersedia bingkai struk antik</li>
        </ul>

        <!-- Layanan tambahan (opsional) -->
        <div style="background: #ead7c4; border-radius: 30px; padding: 12px 16px; margin: 20px 0 0; font-size: 1rem;">
          <i class="fas fa-gem" style="color: #8a653b;"></i> 
          extra besar / 2 foto dalam satu struk · Rp15k
        </div>

        <!-- tombol order (harga jelas) -->
        <button class="btn-order">
          <i class="fas fa-camera"></i> PESAN FOTO STRUK
        </button>
        <p style="text-align: right; margin-top: 6px; font-size: 0.9rem; color: #755e48;">
          <i class="far fa-clock"></i> *harga sudah termasuk pajak
        </p>
      </div>
    </div>

    <!-- footer: informasi tambahan dan gambar kecil (receipt photobox) -->
    <div class="footer-note">
      <span><i class="fas fa-store"></i> booth tersedia: mall sudirman · paskal · e广场</span>
      <span><i class="fas fa-camera"></i> #receiptphotobox</span>
      <span><i class="fas fa-qrcode"></i> scan struk untuk galeri digital</span>
    </div>

    <!-- garis putus-putus dan simbol photobox lagi -->
    <div style="padding: 12px 30px 20px; text-align: center; background: #f5eadc; border-top: 2px dashed #ba9c80;">
      <i class="fas fa-cut" style="transform: rotate(90deg); color: #856f59; margin-right: 8px;"></i>
      <span style="font-weight: 500; color: #5d4b38;">STRUK FOTO · 10.000 DAPAT FOTO + KENANGAN</span>
      <i class="fas fa-cut" style="transform: rotate(90deg); color: #856f59; margin-left: 8px;"></i>
    </div>

    <!-- pesan hidden / cute receipt joke -->
    <div style="background: #b48b66; color: #fef4e7; text-align: center; padding: 4px 0; font-size: 0.8rem; letter-spacing: 1px;">
      terima kasih sudah berfoto 🩵 simpan strukmu baik-baik
    </div>
  </div>

  <!-- catatan kecil: gambar sudah include, harga 10.000 muncul di badge, struk, dan total -->
</body>
</html>