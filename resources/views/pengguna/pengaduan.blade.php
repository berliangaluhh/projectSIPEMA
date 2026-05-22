<html>
    <head>
        <title>Pengaduan - SIPEMA</title>
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

            .form-box{
                background:linear-gradient(90deg, #908CFF 15%, #200F8F 85%);
                padding:40px;
                border-radius:15px;
                color:white;
            }

            .form-group{
                margin-bottom:25px;
            }

            .form-group label{
                display:block;
                margin-bottom:10px;
                font-weight:600;
            }

            .form-group input,
            .form-group textarea{
                width:100%;
                padding:15px;
                border-radius:10px;
                border:none;
                outline:none;
                background:#FFFFFF;
                font-size:14px;
            }

            .form-group textarea{
                height:100px;
                resize:none;
            }

            .form-group input::placeholder,
            .form-group textarea::placeholder{
                color:#000000;
                opacity:1;
            }

            .select-box{
                position:relative;
            }

            .select-box select{
                width:100%;
                padding:15px;
                border-radius:10px;
                border:none;
                outline:none;
                background:#FFFFFF;
                font-size:14px;
                appearance:none;
                -webkit-appearance:none;
                -moz-appearance:none;
            }

            .arrow{
                position:absolute;
                right:15px;
                top:50%;
                transform:translateY(-50%);
                font-size:20px;
                color:#000000;
                pointer-events:none;
            }

            .submit-btn{
                width:100%;
                padding:15px;
                border:none;
                border-radius:10px;
                background:linear-gradient(90deg, #8165FD, #54639E);
                color:white;
                font-weight:600;
                cursor:pointer;
                transition:0.25s;
            }

            .submit-btn:hover{
                transform:translateY(-3px);
                box-shadow:0 8px 20px rgba(84, 99, 158, 0.4);
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebar')

        <div class="content">
            <div class="form-box">
                <form action="/pengaduan" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($errors->any())
                        <div style="background: #ff3b3b; color: white; padding: 15px; border-radius: 8px; margin-bottom: 25px; font-weight: 600;">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Judul Pengaduan</label>
                        <input type="text" name="judul" placeholder="Masukan Judul Pengaduan" required value="{{ old('judul') }}">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <div class="select-box">
                            <select name="kategori" required>
                                <option disabled selected>Pilih Kategori</option>
                                <option value="Fasilitas" {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                                <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                <option value="Pelayanan" {{ old('kategori') == 'Pelayanan' ? 'selected' : '' }}>Pelayanan</option>
                                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <span class="arrow">›</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Jelaskan Detail Permasalahan yang Diadukan" required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Bukti</label>
                        <input type="file" name="bukti" accept="image/*">
                    </div>
                    <button type="submit" class="submit-btn">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>