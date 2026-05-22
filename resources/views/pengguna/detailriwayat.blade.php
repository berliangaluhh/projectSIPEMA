<html>
    <head>
        <title>Detail Pengaduan - SIPEMA</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

        <style>
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
                font-family:'Poppins', sans-serif;
            }

            body{
                background:#E1E7FF;
                display:flex;
            }

            .content{
                flex:1;
                padding:40px;
            }

            .title-box{
                background:linear-gradient(90deg, #908CFF 15%, #200F8F 85%);
                color:white;
                padding:30px 45px;
                border-radius:15px;
                margin-bottom:25px;
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
            }

            .left-side{
                width:40%;
            }

            .item{
                margin-bottom:45px;
            }

            .item label{
                display:block;
                color:#4338F2;
                font-size:16px;
                margin-bottom:8px;
            }

            .item h2{
                color:#4338F2;
                font-size:20px;
                font-weight:600;
                letter-spacing:2px;
            }

            .right-side{
                width:55%;
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
            }

            .description{
                text-align:center;
                color:#4338F2;
                font-size:16px;
                line-height:1.6;
                width:90%;
            }

            .info-box{
                background:linear-gradient(90deg, #908CFF 15%, #200F8F 85%);
                color:white;
                padding:22px 35px;
                border-radius:12px;
                margin-bottom:25px;
                font-size:15px;
            }

            .btn-back{
                background:linear-gradient(90deg, #8165FD, #54639E);
                color:white;
                border:none;
                padding:15px 50px;
                border-radius:10px;
                cursor:pointer;
                font-weight:600;
                font-size:16px;
                transition:0.25s;
            }

            .btn-back:hover{
                transform:translateY(-3px);
                box-shadow:0 8px 20px rgba(84, 99, 158, 0.4);
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebar')

        <div class="content">
            <div class="title-box">
                <h1>Pengaduan Mahasiswa</h1>
            </div>
            <div class="detail-box">
                <div class="left-side">
                    <div class="item">
                        <label>Judul</label>
                        <h2>{{ $pengaduan->judul }}</h2>
                    </div>
                    <div class="item">
                        <label>Tanggal</label>
                        <h2>{{ $pengaduan->created_at->format('d M Y') }}</h2>
                    </div>
                    <div class="item">
                        <label>Kategori</label>
                        <h2>{{ $pengaduan->kategori }}</h2>
                    </div>
                    <div class="item">
                        <label>Status</label>
                        <h2 style="color: {{ $pengaduan->status == 'Selesai' ? '#2ecc71' : ($pengaduan->status == 'Diproses' ? '#f1c40f' : '#e74c3c') }};">
                            {{ $pengaduan->status }}
                        </h2>
                    </div>
                </div>
                <div class="right-side">
                    <div class="image-box" style="display: flex; justify-content: center; align-items: center; overflow: hidden; background: #6A5F63; border-radius: 12px; height: 320px; width: 100%; margin-bottom: 25px;">
                        @if($pengaduan->bukti)
                            <img src="{{ asset('storage/' . $pengaduan->bukti) }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;">
                        @else
                            <span style="color: white; font-weight: 500;">Tidak ada bukti gambar</span>
                        @endif
                    </div>
                    <div class="description">
                        {{ $pengaduan->deskripsi }}
                    </div>
                </div>
            </div>
            <div class="info-box">
                Semua data yang ditampilkan pada laman ini berdasarkan apa yang telah diadukan oleh mahasiswa.
            </div>
            <a href="/riwayat"><button class="btn-back">
                Kembali
            </button></a>
        </div>
    </body>
</html>