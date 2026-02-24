<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT PHOTOBOX — neo brutalism provider</title>
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f0f0;
            font-family: 'Space Grotesk', 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            padding: 20px;
        }

        /* NEO BRUTALISM CORE STYLE */
        .brutal-card {
            border: 4px solid black;
            box-shadow: 10px 10px 0 rgba(0,0,0,1);
            background: #ffffff;
            transition: transform 0.1s ease, box-shadow 0.1s ease;
        }

        .brutal-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 14px 14px 0 black;
        }

        .brutal-btn {
            background: #ffcc00;
            border: 4px solid black;
            box-shadow: 6px 6px 0 black;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.08s linear;
            cursor: pointer;
            color: black;
        }

        .brutal-btn:hover {
            background: #ffdd44;
            box-shadow: 3px 3px 0 black;
            transform: translate(3px, 3px);
        }

        .brutal-btn:active {
            background: #ffaa00;
            box-shadow: none;
            transform: translate(6px, 6px);
        }

        /* typography */
        h1, h2, h3, h4 {
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: -0.02em;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: #f8f4eb;
            border: 6px solid black;
            box-shadow: 18px 18px 0 black;
            overflow: hidden;
        }

        /* header brutal */
        .header-brutal {
            background: #c9e4ff;
            padding: 2rem 2.5rem;
            border-bottom: 6px solid black;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo h1 {
            font-size: 3.2rem;
            line-height: 0.9;
            background: white;
            padding: 10px 20px;
            border: 5px solid black;
            box-shadow: 8px 8px 0 black;
            display: inline-block;
        }

        .logo span {
            font-size: 1.2rem;
            display: block;
            background: black;
            color: white;
            padding: 5px 15px;
            margin-top: 8px;
            border: 2px solid black;
        }

        .badge-year {
            background: #ffb3c6;
            font-size: 2rem;
            font-weight: 800;
            padding: 15px 25px;
            border: 5px solid black;
            box-shadow: 8px 8px 0 black;
        }

        /* hero booth section — neo brutalism maximal */
        .hero-brutal {
            display: flex;
            flex-wrap: wrap;
            background: #b8f2e6;
            border-bottom: 6px solid black;
        }

        .hero-left {
            flex: 1 1 350px;
            padding: 3rem 2rem;
            background: #fbc8b5;
            border-right: 6px solid black;
        }

        .hero-left h2 {
            font-size: 4rem;
            line-height: 1;
            background: white;
            padding: 10px 20px;
            border: 5px solid black;
            box-shadow: 12px 12px 0 black;
            margin-bottom: 40px;
            display: inline-block;
        }

        .hero-left .price-tag {
            background: #feffb4;
            padding: 20px;
            border: 5px solid black;
            box-shadow: 10px 10px 0 black;
            font-size: 3rem;
            font-weight: 800;
            margin: 30px 0;
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .hero-left .price-tag small {
            font-size: 1.2rem;
            background: black;
            color: white;
            padding: 5px 15px;
        }

        .hero-right {
            flex: 1 1 350px;
            padding: 2rem;
            background: #c5b4e3;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* photobox mockup ala brutal */
        .photobox-brutal {
            background: #2b241e;
            border: 8px solid black;
            box-shadow: 20px 20px 0 #fe5f57, 20px 20px 0 4px black;
            padding: 30px 20px 20px;
            border-radius: 40px 40px 20px 20px;
            max-width: 380px;
            width: 100%;
            transition: 0.1s;
        }

        .photobox-brutal:hover {
            box-shadow: 16px 16px 0 #fe5f57, 16px 16px 0 4px black;
        }

        .screen-brutal {
            background: #a9ff9e;
            border: 6px solid black;
            padding: 20px 10px;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .camera-brutal {
            font-size: 5rem;
            color: black;
            background: #ffd966;
            padding: 0 30px;
            border: 4px solid black;
            border-radius: 60px;
        }

        .photo-strip-brutal {
            background: white;
            border: 4px solid black;
            width: 100%;
            padding: 12px;
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .photo-strip-brutal div {
            width: 50px;
            height: 50px;
            background: black;
            border: 3px solid #fe5f57;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
        }

        /* layanan section — 2 brutal box */
        .services-brutal {
            display: flex;
            flex-wrap: wrap;
            border-top: 6px solid black;
            border-bottom: 6px solid black;
        }

        .service-item {
            flex: 1 1 300px;
            padding: 2.5rem 2rem;
            border-right: 6px solid black;
            background: #fdffb8;
        }

        .service-item:last-child {
            border-right: none;
        }

        .service-item h3 {
            font-size: 2.8rem;
            background: black;
            color: white;
            padding: 8px 16px;
            display: inline-block;
            margin-bottom: 20px;
            border: 4px solid black;
            box-shadow: 6px 6px 0 #fe5f57;
        }

        .service-price {
            font-size: 5rem;
            font-weight: 800;
            line-height: 1;
            background: white;
            border: 6px solid black;
            padding: 10px 20px;
            box-shadow: 10px 10px 0 black;
            margin: 20px 0;
        }

        .service-feature {
            list-style: none;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .service-feature li {
            padding: 10px 0;
            border-bottom: 3px dashed black;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .service-feature i {
            color: #d45f2e;
            font-size: 1.8rem;
        }

        /* purchase section full unit */
        .purchase-brutal {
            background: #b0d3ff;
            padding: 3rem;
            border-bottom: 6px solid black;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 3rem;
        }

        .purchase-left {
            flex: 2 1 300px;
        }

        .purchase-left h2 {
            font-size: 3.5rem;
            background: black;
            color: white;
            padding: 10px 20px;
            border: 6px solid #fe5f57;
            box-shadow: 12px 12px 0 black;
            display: inline-block;
        }

        .full-price-brutal {
            font-size: 5rem;
            font-weight: 800;
            background: #ffdb9d;
            border: 6px solid black;
            padding: 20px 30px;
            box-shadow: 15px 15px 0 black;
            margin: 30px 0;
            display: inline-block;
        }

        .purchase-right {
            flex: 1 1 250px;
        }

        .btn-brutal-large {
            background: #ffb443;
            border: 6px solid black;
            box-shadow: 12px 12px 0 black;
            padding: 30px 20px;
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            cursor: pointer;
            transition: 0.08s;
            color: black;
            text-transform: uppercase;
        }

        .btn-brutal-large:hover {
            box-shadow: 6px 6px 0 black;
            transform: translate(6px, 6px);
            background: #ffcc66;
        }

        /* company profile brutal */
        .profile-brutal {
            background: #ffc6d9;
            padding: 3rem;
            border-bottom: 6px solid black;
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .profile-text {
            flex: 2 1 300px;
        }

        .profile-text h3 {
            font-size: 3rem;
            background: white;
            border: 6px solid black;
            padding: 10px 20px;
            box-shadow: 10px 10px 0 black;
            display: inline-block;
            margin-bottom: 30px;
        }

        .profile-stats {
            flex: 1 1 200px;
            background: black;
            color: white;
            border: 6px solid #fe5f57;
            padding: 2rem;
            font-size: 2rem;
            font-weight: 700;
        }

        .profile-stats div {
            margin: 20px 0;
            border-bottom: 4px dotted white;
        }

        /* footer genz */
        .footer-brutal {
            background: #2f2f2f;
            color: white;
            padding: 2rem;
            text-align: center;
            border-top: 6px solid #fe5f57;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .footer-brutal i {
            color: #ffd966;
            margin: 0 10px;
        }

        /* utility */
        .border-black {
            border: 4px solid black;
        }

        @media (max-width: 700px) {
            .service-item { border-right: none; border-bottom: 6px solid black; }
            .hero-left h2 { font-size: 3rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- header -->
        <div class="header-brutal">
            <div class="logo">
                <h1>📸 RECEIPT<br>PHOTOBOX</h1>
                <span>PROVIDER INDONESIA #1</span>
            </div>
            <div class="badge-year">
                <i class="fas fa-bolt"></i> EST 2022
            </div>
        </div>

        <!-- hero / gambar booth + harga 10k -->
        <div class="hero-brutal">
            <div class="hero-left">
                <h2>GEN Z<br>BOOTH</h2>
                <div class="price-tag">
                    <i class="fas fa-tag"></i> 10.000 <small>/foto</small>
                </div>
                <p style="font-size: 1.5rem; font-weight: 600; background: white; border: 4px solid black; padding: 15px; box-shadow: 6px 6px 0 black;">
                    <i class="fas fa-crown" style="color: #f59e0b;"></i> SEWA BOOTH + OPERATOR
                </p>
                <ul style="margin-top: 30px; list-style: none; font-size: 1.4rem; font-weight: 600;">
                    <li><i class="fas fa-check-circle"></i> MIN. 50 FOTO</li>
                    <li><i class="fas fa-check-circle"></i> FREE CUSTOM STRUK</li>
                    <li><i class="fas fa-check-circle"></i> INSTAN PRINT</li>
                </ul>
            </div>
            <div class="hero-right">
                <div class="photobox-brutal">
                    <div class="screen-brutal">
                        <i class="fas fa-camera-retro camera-brutal"></i>
                        <div class="photo-strip-brutal">
                            <div><i class="fas fa-user"></i></div>
                            <div><i class="fas fa-user"></i></div>
                            <div><i class="fas fa-receipt"></i></div>
                        </div>
                        <div style="background: #fe5f57; border: 4px solid black; padding: 10px; width: 100%; text-align: center; font-weight: 800;">
                            RP 10.000
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 15px; color: white; font-size: 2rem;">
                        <i class="fas fa-print"></i>
                        <i class="fas fa-wifi"></i>
                        <i class="fas fa-battery-full"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Layanan: harga 10k (sewa) dan beli unit -->
        <div class="services-brutal">
            <!-- service 1: sewa per foto 10k -->
            <div class="service-item">
                <h3><i class="fas fa-camera"></i> RENTAL</h3>
                <div class="service-price">Rp10k <span style="font-size: 1.5rem;">/foto</span></div>
                <ul class="service-feature">
                    <li><i class="fas fa-check"></i> Booth + operator</li>
                    <li><i class="fas fa-check"></i> Cocok untuk event / mall</li>
                    <li><i class="fas fa-check"></i> Min. 50 foto</li>
                    <li><i class="fas fa-check"></i> Template kekinian</li>
                    <li><i class="fas fa-check"></i> Hasil cetak struk</li>
                </ul>
                <div style="margin-top: 40px;">
                    <button class="brutal-btn" style="padding: 20px; font-size: 1.8rem; width: 100%;"><i class="fab fa-whatsapp"></i> BOOK NOW</button>
                </div>
            </div>
            <!-- service 2: beli unit full -->
            <div class="service-item">
                <h3><i class="fas fa-cart-shopping"></i> FULL UNIT</h3>
                <div class="service-price">Rp28,5J</div>
                <ul class="service-feature">
                    <li><i class="fas fa-check"></i> 1 unit photobox</li>
                    <li><i class="fas fa-check"></i> Instalasi & training</li>
                    <li><i class="fas fa-check"></i> Garansi 1 tahun</li>
                    <li><i class="fas fa-check"></i> Bonus 3 roll kertas</li>
                    <li><i class="fas fa-check"></i> Support 24/7</li>
                </ul>
                <div style="margin-top: 40px;">
                    <button class="brutal-btn" style="padding: 20px; font-size: 1.8rem; width: 100%; background: #ffb3c6;"><i class="fas fa-phone"></i> NEGO / CONSULT</button>
                </div>
            </div>
        </div>

        <!-- purchase full unit highlight -->
        <div class="purchase-brutal">
            <div class="purchase-left">
                <h2>MAU JADI OWNER? 🔥</h2>
                <div class="full-price-brutal">
                    Rp 28.500.000
                </div>
                <p style="font-size: 1.8rem; font-weight: 700; background: black; color: white; padding: 10px; border: 4px solid #fe5f57; display: inline-block;">include mesin + kertas + instalasi</p>
            </div>
            <div class="purchase-right">
                <div class="btn-brutal-large">
                    <i class="fas fa-rocket"></i> ORDER
                </div>
            </div>
        </div>

        <!-- company profile: tentang provider -->
        <div class="profile-brutal">
            <div class="profile-text">
                <h3><i class="fas fa-building"></i> PT. RECEIPT PHOTOBOX NUSANTARA</h3>
                <p style="font-size: 1.5rem; font-weight: 500; line-height: 1.4; background: white; border: 4px solid black; padding: 20px; box-shadow: 8px 8px 0 black;">
                    Sejak 2022 kami menjadi <strong>satu-satunya provider resmi</strong> mesin Receipt Photobox di Indonesia. Sudah memasok 40+ unit ke berbagai kota (Jakarta, Bandung, Surabaya, Bali, Medan). Melayani pembelian perorangan, corporate, dan rental booth untuk event skala nasional.
                </p>
                <div style="margin-top: 30px; display: flex; gap: 15px; flex-wrap: wrap;">
                    <span style="background: black; color: white; padding: 10px 20px; border: 4px solid #fe5f57; font-size: 1.5rem;"><i class="fas fa-store"></i> 40+ UNIT TERPASANG</span>
                    <span style="background: black; color: white; padding: 10px 20px; border: 4px solid #fe5f57; font-size: 1.5rem;"><i class="fas fa-calendar"></i> 200+ EVENT</span>
                </div>
            </div>
            <div class="profile-stats">
                <div><i class="fas fa-star"></i> GEN Z FAV</div>
                <div><i class="fas fa-headset"></i> SUPPORT 24/7</div>
                <div><i class="fas fa-trophy"></i> AWARD 2024</div>
                <div><i class="fas fa-heart"></i> 98% KEPUASAN</div>
            </div>
        </div>

        <!-- kontak / footer neo brutal -->
        <div class="footer-brutal">
            <i class="fas fa-map-pin"></i> JL. PHOTOBOX RAYA NO. 69, JAKTIM &nbsp;&nbsp; 
            <i class="fas fa-phone"></i> 0811-2233-4455 &nbsp;&nbsp;
            <i class="fas fa-envelope"></i> SALES@RECEIPTPHOTOBOX.ID
            <div style="margin-top: 20px; font-size: 1.2rem;">
                <i class="fab fa-tiktok"></i> @receiptphotobox &nbsp;&nbsp; <i class="fab fa-instagram"></i> @receiptphotobox.id
            </div>
        </div>

        <!-- kecil2 tagline genz -->
        <div style="background: black; color: #fe5f57; text-align: center; padding: 10px; border-top: 6px solid #fe5f57; font-weight: 800; font-size: 1.3rem;">
            <i class="fas fa-crown"></i> NEO BRUTALISM PROVIDER — FOR GEN Z, BY THE REAL OGs <i class="fas fa-crown"></i>
        </div>
    </div>
</body>
</html>