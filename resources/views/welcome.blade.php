<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Photobox Indonesia | Provider Mesin & Sewa Booth</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background: #1e1a16;
            background-image: radial-gradient(circle at 10% 20%, #3a2e25 0%, #161310 100%);
            display: flex;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .company-card {
            max-width: 1300px;
            width: 100%;
            background: #faf7f2;
            border-radius: 60px 60px 30px 30px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.7), 0 0 0 2px #b47d56 inset, 0 0 0 5px #f2dbc4 inset;
            overflow: hidden;
            position: relative;
        }

        /* header dengan gaya industrial/booth */
        .provider-header {
            background: #2b221c;
            background: linear-gradient(145deg, #342a22, #1f1712);
            padding: 2rem 3rem 1.5rem;
            color: #fae3cf;
            border-bottom: 6px solid #c58f5e;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .logo-area h1 {
            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: -1px;
            line-height: 1.1;
        }

        .logo-area h1 span {
            color: #f5b27a;
            display: block;
            font-size: 1.4rem;
            font-weight: 400;
            letter-spacing: 4px;
        }

        .badge-provider {
            background: #b76229;
            padding: 0.7rem 2rem;
            border-radius: 60px;
            font-weight: 700;
            font-size: 1.4rem;
            box-shadow: 0 8px 0 #6d3b17;
            color: #1f1107;
            border: 1px solid #ffc891;
        }

        .badge-provider i {
            margin-right: 10px;
        }

        /* showcase mesin / photobox */
        .machine-showcase {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 2rem;
            padding: 3rem 3rem 2rem;
            background: #ece2d5;
            background-image: repeating-linear-gradient(45deg, #ddcfbc22 0px, #ddcfbc22 20px, #cbbaa622 20px, #cbbaa622 40px);
        }

        .machine-image {
            flex: 1 1 350px;
            display: flex;
            justify-content: center;
            filter: drop-shadow(20px 20px 0 #7b5f47);
        }

        .photobox-mockup {
            background: #2a241f;
            padding: 30px 20px 20px;
            border-radius: 40px 40px 20px 20px;
            border: 5px solid #ab7e58;
            box-shadow: 0 0 0 6px #eccea9, 0 30px 30px -10px black;
            max-width: 380px;
            width: 100%;
        }

        .photobox-screen {
            background: #11100e;
            border-radius: 24px;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 3px solid #7f6238;
        }

        .photobox-screen .camera-lens {
            font-size: 5rem;
            color: #c7a876;
            text-shadow: 0 0 8px #e5b787;
        }

        .photobox-screen .receipt-slot {
            background: #3f3326;
            width: 90%;
            height: 8px;
            border-radius: 10px;
            margin: 15px 0 10px;
            border: 1px solid #a9875b;
        }

        .photobox-screen .photo-strip {
            background: #fff9e6;
            width: 80%;
            padding: 12px 6px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            gap: 6px;
            border: 2px dashed #b48b56;
        }

        .photo-strip .thumb {
            width: 40px;
            height: 40px;
            background: #a18262;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.4rem;
        }

        .machine-specs {
            flex: 1 1 300px;
            background: #fff4e8;
            padding: 2rem 2rem 2.2rem;
            border-radius: 50px 20px 50px 20px;
            box-shadow: 12px 12px 0 #a57249;
            border: 2px solid #cca67a;
        }

        .machine-specs h2 {
            font-size: 2.2rem;
            color: #3e281a;
            border-left: 12px solid #d37d39;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .spec-list {
            list-style: none;
        }

        .spec-list li {
            font-size: 1.3rem;
            padding: 12px 0;
            border-bottom: 1px solid #d2b596;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #2e1d12;
        }

        .spec-list i.fa-cogs {
            color: #455a64;
        }
        .spec-list i.fa-image {
            color: #b75d27;
        }
        .spec-list i.fa-bolt {
            color: #d48b36;
        }

        /* harga & layanan penyedia */
        .price-section {
            padding: 2.5rem 3rem;
            background: #cfb69b;
            background: linear-gradient(135deg, #b99473, #dbbc9b);
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            border-top: 4px solid #fbe4c2;
            border-bottom: 4px solid #fbe4c2;
        }

        .service-offer {
            background: #221b15e0;
            backdrop-filter: blur(2px);
            color: #fff1dc;
            border-radius: 50px;
            padding: 1.8rem 2.5rem;
            flex: 1 1 280px;
            border: 2px solid #efc48c;
            box-shadow: 10px 10px 0 #593e29;
        }

        .service-offer h3 {
            font-size: 2rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fac89d;
        }

        .offer-price {
            font-size: 4rem;
            font-weight: 800;
            color: #ffd966;
            line-height: 1;
            margin: 20px 0;
        }

        .offer-price small {
            font-size: 1.5rem;
            color: #d4b28c;
        }

        .offer-desc {
            font-size: 1.2rem;
            margin-bottom: 25px;
        }

        .offer-feature {
            list-style: none;
        }

        .offer-feature li {
            padding: 6px 0;
            font-size: 1.1rem;
        }

        .offer-feature i {
            color: #7bc57b;
            margin-right: 12px;
        }

        .purchase-box {
            background: #f7e7d6;
            border-radius: 40px;
            padding: 2rem;
            flex: 1 1 300px;
            border: 4px solid #b45f2b;
            box-shadow: 0 15px 0 #7a441f;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .purchase-box h4 {
            font-size: 2.2rem;
            color: #3a281c;
        }

        .purchase-box .full-price {
            font-size: 3.8rem;
            font-weight: 800;
            color: #ad411c;
            text-shadow: 3px 3px 0 #ffc48b;
        }

        .btn-contact {
            background: #2f4b2b;
            border: none;
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            padding: 20px 30px;
            border-radius: 80px;
            margin: 20px 0 10px;
            cursor: pointer;
            transition: 0.15s;
            box-shadow: 0 12px 0 #173015;
            border: 2px solid #b1d49e;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-contact:hover {
            background: #3f663a;
            transform: translateY(-4px);
            box-shadow: 0 16px 0 #173015;
        }

        /* tentang perusahaan + peresmian */
        .about-provider {
            padding: 2.5rem 3rem;
            background: #e5d6c2;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .story {
            flex: 2 1 400px;
        }

        .story h2 {
            font-size: 2.2rem;
            border-bottom: 4px solid #9b6f46;
            display: inline-block;
            margin-bottom: 20px;
        }

        .stats {
            flex: 1 1 200px;
            background: #302418;
            color: #fbeedb;
            border-radius: 30px;
            padding: 1.8rem;
            font-size: 1.5rem;
        }

        .stats i {
            color: #eaa767;
            font-size: 2.8rem;
        }

        .stats div {
            margin: 20px 0;
        }

        /* footer kemitraan */
        .partner-footer {
            background: #1d1610;
            color: #ddcbb8;
            padding: 1.5rem 2rem;
            text-align: center;
            border-top: 8px double #c8915e;
            font-size: 1.2rem;
        }

        .partner-footer i {
            color: #e09d61;
            margin: 0 8px;
        }

        @media (max-width: 800px) {
            .provider-header { flex-direction: column; text-align: center; gap: 15px; }
            .badge-provider { font-size: 1.2rem; }
        }
    </style>
</head>
<body>
    <div class="company-card">
        <!-- header perusahaan penyedia -->
        <div class="provider-header">
            <div class="logo-area">
                <h1>RECEIPT PHOTOBOX <span>official provider indonesia</span></h1>
            </div>
            <div class="badge-provider">
                <i class="fas fa-crown"></i> SINCE 2022
            </div>
        </div>

        <!-- mesin photobox offline (gambar booth) + specs -->
        <div class="machine-showcase">
            <div class="machine-image">
                <div class="photobox-mockup">
                    <div class="photobox-screen">
                        <i class="fas fa-camera-retro camera-lens"></i>
                        <div class="receipt-slot"></div>
                        <div class="photo-strip">
                            <div class="thumb"><i class="fas fa-user"></i></div>
                            <div class="thumb"><i class="fas fa-user"></i></div>
                            <div class="thumb"><i class="fas fa-receipt"></i></div>
                        </div>
                        <div style="color:#d9b382; margin-top:12px; font-family: monospace;">Rp 10.000 /foto</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 15px; color: #bda079;">
                        <i class="fas fa-wifi"></i> <i class="fas fa-print"></i> <i class="fas fa-usb"></i>
                    </div>
                </div>
            </div>
            <div class="machine-specs">
                <h2><i class="fas fa-cog fa-spin"></i> Mesin Booth Original</h2>
                <ul class="spec-list">
                    <li><i class="fas fa-cogs fa-fw"></i> Cetak foto thermal 2x3” (struk)</li>
                    <li><i class="fas fa-image fa-fw"></i> Bisa custom overlay & QR</li>
                    <li><i class="fas fa-bolt fa-fw"></i> 500 foto/hari, tahan lama</li>
                    <li><i class="fas fa-box-open fa-fw"></i> Dimensi 150x70x50 cm · berat 65kg</li>
                    <li><i class="fas fa-mobile-alt fa-fw"></i> Opsi cloud & galeri digital</li>
                </ul>
                <p style="margin-top: 20px; font-weight: bold; color: #9d5629;">*ready stock untuk pembelian unit</p>
            </div>
        </div>

        <!-- Layanan: harga per foto 10k & pembelian full unit -->
        <div class="price-section">
            <!-- LAYANAN SEWA / PER FOTO (offline) -->
            <div class="service-offer">
                <h3><i class="fas fa-camera"></i> SEWA BOOTH + OPERATOR</h3>
                <div class="offer-price">Rp 10.000 <small>/foto</small></div>
                <div class="offer-desc">Tarif per pengambilan gambar (minimal pemakaian 50 foto). Cocok untuk event, mall, ulang tahun.</div>
                <ul class="offer-feature">
                    <li><i class="fas fa-check"></i> Mesin + petugas on-site</li>
                    <li><i class="fas fa-check"></i> Free desain template struk</li>
                    <li><i class="fas fa-check"></i> Hasil foto langsung jadi</li>
                    <li><i class="fas fa-check"></i> Harga nett, include kertas</li>
                </ul>
            </div>

            <!-- PEMBELIAN FULL UNIT PHOTOBOX -->
            <div class="purchase-box">
                <h4><i class="fas fa-store-alt"></i> BELI UNIT FULL</h4>
                <div class="full-price">Rp 28.500.000</div>
                <p style="font-size: 1.3rem; color:#2b1d10;">📦 include mesin + instalasi + 1 roll kertas gratis</p>
                <button class="btn-contact"><i class="fab fa-whatsapp"></i> NEGO / CONSULT</button>
                <p style="font-size: 0.9rem;">*garansi 1 tahun, sparepart tersedia</p>
            </div>
        </div>

        <!-- Perusahaan penyedia & keunggulan tambahan -->
        <div class="about-provider">
            <div class="story">
                <h2><i class="fas fa-building"></i> PT. Receipt Photobox Nusantara</h2>
                <p style="font-size: 1.3rem; line-height: 1.5; margin: 20px 0;">Kami adalah satu-satunya provider resmi mesin <strong>Receipt Photobox</strong> di Indonesia. Sejak 2022 telah memasok lebih dari 40 unit ke berbagai kota (Jakarta, Surabaya, Bali, Medan). Melayani pembelian perorangan, corporate, dan penyewaan booth untuk event indoor/outdoor.</p>
                <p style="font-size: 1.2rem;"><i class="fas fa-check-circle" style="color: #2a7815;"></i> Setiap unit sudah terkalibrasi dan menggunakan kertas thermal original (tahan lama).</p>
            </div>
            <div class="stats">
                <div><i class="fas fa-store"></i> 40+ unit tersebar</div>
                <div><i class="fas fa-calendar"></i> 200+ event support</div>
                <div><i class="fas fa-smile"></i> 98% kepuasan klien</div>
                <div><i class="fas fa-clock"></i> support 24/7</div>
            </div>
        </div>

        <!-- tambahan foto/gallery kecil (symbolic) -->
        <div style="background: #b48f6a; padding: 1.5rem; display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
            <span style="background: #2c1f15; color: #efd7b6; padding: 8px 25px; border-radius: 60px;"><i class="fas fa-receipt"></i> PHOTO STRUK 10K</span>
            <span style="background: #2c1f15; color: #efd7b6; padding: 8px 25px; border-radius: 60px;"><i class="fas fa-box"></i> JUAL UNIT</span>
            <span style="background: #2c1f15; color: #efd7b6; padding: 8px 25px; border-radius: 60px;"><i class="fas fa-calendar-check"></i> RENTAL BOOTH</span>
        </div>

        <!-- footer dengan kontak / company profile -->
        <div class="partner-footer">
            <i class="fas fa-map-pin"></i> Head Office: Jl. Photobox Raya No.10, Jakarta Timur  &nbsp;|&nbsp; 
            <i class="fas fa-envelope"></i> sales@receiptphotobox.id  &nbsp;|&nbsp; 
            <i class="fas fa-phone-alt"></i> 0811-2233-4455 (whatsapp)
            <div style="margin-top: 12px; font-size: 1rem; opacity: 0.8;">
                <i class="fas fa-copyright"></i> 2026 Receipt Photobox Indonesia — provider & distributor resmi
            </div>
        </div>
    </div>
</body>
</html>