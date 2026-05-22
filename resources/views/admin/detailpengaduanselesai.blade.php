<html>
    <head>
        <title>Detail Pengaduan Selesai - SIPEMA Admin</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

        <style>
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
                font-family:'Poppins', sans-serif;
            }

            body{
                background:#EEF0FF;
                display:flex;
            }

            .content{
                flex:1;
                margin-left:65px;
                padding:40px;
            }

            .title-box{
                background:linear-gradient(90deg, #2ECC71 15%, #27AE60 85%);
                color:white;
                padding:30px 45px;
                border-radius:15px;
                margin-bottom:25px;
                box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            }

            .title-box h1{
                font-size:28px;
                font-weight:600;
                letter-spacing:3px;
            }

            .detail-box{
                background:#FFFFFF;
                border-radius:15px;
                padding:45px;
                display:flex;
                justify-content:space-between;
                gap:40px;
                margin-bottom:25px;
                box-shadow: 0 8px 20px rgba(0,0,0,0.05);
                position: relative;
            }

            /* Completion stamp seal design */
            .completed-seal {
                position: absolute;
                top: 40px;
                right: 40px;
                border: 4px dashed #2ECC71;
                color: #2ECC71;
                font-size: 24px;
                font-weight: 700;
                padding: 10px 20px;
                border-radius: 10px;
                transform: rotate(15deg);
                opacity: 0.85;
                letter-spacing: 2px;
                pointer-events: none;
            }

            .left-side{
                width:45%;
            }

            .item{
                margin-bottom:30px;
            }

            .item label{
                display:block;
                color:#27AE60;
                font-size:14px;
                font-weight: 600;
                margin-bottom:5px;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .item h2{
                color:#1E5E3A;
                font-size:18px;
                font-weight:600;
                letter-spacing:1px;
            }

            .right-side{
                width:50%;
                display:flex;
                flex-direction:column;
                align-items:center;
            }

            .image-box{
                width:100%;
                height:320px;
                background:#6A5F63;
                border-radius:12px;
                margin-bottom:25px;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }

            .description{
                text-align:justify;
                color:#1E5E3A;
                font-size:16px;
                line-height:1.6;
                width:100%;
            }

            .btn-back{
                background:linear-gradient(90deg, #2ECC71, #27AE60);
                color:white;
                padding:15px 50px;
                border:none;
                border-radius:10px;
                font-size:15px;
                font-weight:600;
                cursor:pointer;
                transition:0.3s;
                letter-spacing:2px;
                box-shadow:0 5px 15px rgba(0,0,0,0.15);
                text-decoration: none;
                display: inline-block;
                text-align: center;
            }

            .btn-back:hover{
                transform:translateY(-3px);
                box-shadow:0 8px 20px rgba(0,0,0,0.2);
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebaradmin')

        <div class="content">
            <div class="title-box">
                <h1>Detail Laporan Selesai</h1>
            </div>

            <div class="detail-box">
                <div class="completed-seal">SELESAI</div>
                
                <div class="left-side">
                    <div class="item">
                        <label>Nama Mahasiswa</label>
                        <h2>{{ $pengaduan->user->name ?? 'N/A' }}</h2>
                    </div>
                    <div class="item">
                        <label>NIM</label>
                        <h2>{{ $pengaduan->user->nim ?? 'N/A' }}</h2>
                    </div>
                    <div class="item">
                        <label>Program Studi</label>
                        <h2>{{ $pengaduan->user->program_studi ?? 'N/A' }}</h2>
                    </div>
                    <div class="item">
                        <label>Judul Pengaduan</label>
                        <h2>{{ $pengaduan->judul }}</h2>
                    </div>
                    <div class="item">
                        <label>Tanggal Masuk</label>
                        <h2>{{ $pengaduan->created_at->format('d F Y - H:i') }} WIB</h2>
                    </div>
                    <div class="item">
                        <label>Kategori</label>
                        <h2>{{ $pengaduan->kategori }}</h2>
                    </div>
                    <div class="item">
                        <label>Status</label>
                        <h2 style="color: #2ecc71; text-transform: uppercase;">
                            {{ $pengaduan->status }}
                        </h2>
                    </div>
                </div>
                <div class="right-side">
                    <div class="image-box">
                        @if($pengaduan->bukti)
                            <img src="{{ asset('storage/' . $pengaduan->bukti) }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <span style="color: white; font-weight: 500;">Tidak ada bukti gambar pendukung</span>
                        @endif
                    </div>
                    <div class="item" style="width: 100%;">
                        <label>Deskripsi Laporan</label>
                        <div class="description">
                            {{ $pengaduan->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-start; align-items: center; margin-top: 30px;">
                <a href="/selesai" class="btn-back">Kembali</a>
            </div>
        </div>
    </body>
</html>
