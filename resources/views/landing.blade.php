<html>
    <head>
        <title>SIPEMA</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                background: #FFFFFF;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                padding: 15px 50px;
                background: #FFFFFF;
                align-items: center;
            }

            .navbar a {
                text-decoration: none;
                margin-left: 20px;
                color: #000000;
            }

            .navbar a.btn-login {
                color: #FFFFFF;
            }

            .btn-login {
                background:linear-gradient(90deg, #8165FD, #54639E);
                margin-right:10px;
                font-weight: 600;
                padding: 6px 12px;
                border-radius: 6px;
                border: none;
                letter-spacing: 2px;
                cursor: pointer;
                transition: 0.25s;
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            }

            .logo {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .logo img {
                width: 40px;
                height: 40px;
            }

            .hero {
                display: flex;
                align-items: center;
                padding: 80px 50px;

                background: url('{{ asset('images/gedungg.png') }}');
                background-size: cover;
                background-position: center;
                color: #000000;

                height: 700px; 
            }

            .hero-text {
                max-width: 600px;
            }

            .hero h1 {
                font-size: 40px;
                margin-bottom: 20px;
            }

            .hero p {
                margin-bottom: 20px;
            }

            .btn-primary {
                background:linear-gradient(90deg, #8165FD, #54639E);
                margin-right:10px;
                color:#FFFFFF;
                font-weight:600;
                padding:10px 20px;
                border-radius:6px;
                border:none;
                letter-spacing:2px;
                cursor:pointer;
                transition:0.25s;
                display:inline-block;
                text-decoration:none;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            }

            .section {
                padding: 60px 50px;
                text-align: center;
                color: #000000;
            }

            .sectionkeunggulan{
                padding: 60px 50px;
                text-align: center;
                color: #000000;
                background-color: #E1E7FF;
            }

            .flow {
                display: flex;
                justify-content: center;
                gap: 60px;
                color: #000000;
                position: relative;
            }

            .flow::before {
                content: '';
                position: absolute;
                top: 40px; 
                left: 12%;
                right: 12%;
                height: 3px;
                background: #000000;
                z-index: 0;
            }

            .flow-item {
                text-align: center;
                flex: 1;
                position: relative;
                z-index: 1;
            }

            .flow img {
                max-width: 100%;
                height: auto;
                margin-bottom: 15px;
            }

            .flow div {
                flex: 1;
            }

            .cards {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                margin-top: 40px;
            }

            .card {
                background: linear-gradient(135deg, #908CFF 15%, #200F8F 85%);
                color: white;
                padding: 20px;
                border-radius: 10px;
                text-align: left;
                box-shadow: 0 8px 20px rgba(32, 15, 143, 0.3);
            }
        </style>
    </head>
    <body>
         <div class="navbar">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
                <h3>SIPEMA</h3>
            </div>
            <div>
                <a href="/login">Beranda</a>
                <a href="#">Faq</a>
                <a href="/login" class="btn-login">Login/Daftar</a>
            </div>
         </div>
        <div class="hero">
            <div class="hero-text">
                <h1>Suarakan Aspirasimu Secara Aman dan Transparan</h1>
                <p>Sistem Pengaduan Mahasiswa. Sampaikan keluhan <br>Anda untuk kampus yang lebih baik.</p>
                <br><br>
                <a href="/login" class="btn-primary">Buat Laporan Baru</a>
            </div>
        </div>
        <div class="section">
            <h3>Alur Pengaduan</h3><br><br>
            <div class="flow">
                <div class="flow-item">
                    <img src="{{ asset('images/icon1.png') }}" alt="">
                    <p>1. Buat Laporan</p>
                </div>
                <div class="flow-item">
                    <img src="{{ asset('images/icon2.png') }}" alt="">
                    <p>2. Verifikasi & Tindak Lanjut</p>
                </div>
                <div class="flow-item">
                    <img src="{{ asset('images/icon3.png') }}" alt="">
                    <p>3. Selesai & Feedback</p>
                </div>
            </div>
        </div>
        <div class="sectionkeunggulan">
            <h3>Keunggulan Kami</h3>
            <div class="cards">
                <div class="card">
                    <h4>Monitoring Real-Time</h4>
                    <p>Pantau Status Laporan. Cek progres <br>pengaduanmu secara real-time melalui fitur <br>tracking yang transparan sampai selesai.</p>
                </div>
                <div class="card">
                    <h4>Ramah Pengguna</h4>
                    <p>Mudah Digunakan. Tampilan yang simpel dan <br>intuitif, dirancang khusus untuk kenyamanan <br>navigasi mahasiswa</p>
                </div>
                <div class="card">
                    <h4>Personalisasi Aman</h4>
                    <p>Keamanan Profil. Data personal dan privasi <br>mahasiswa dilindungi dengan sistem <br>keamanan tingkat tinggi.</p>
                </div>
                <div class="card">
                    <h4>Arsip Digital</h4>
                    <p>Riwayat Terarsip. Semua aspirasi dan solusi <br>terdokumentasi dengan rapi sebagai bukti <br>digital yang sah.p>
                </div>
            </div>
        </div>
    </body>
</html>
