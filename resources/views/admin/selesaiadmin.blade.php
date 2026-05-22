<html>
    <head>
        <title>Selesai - SIPEMA</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

            .title{
                background:linear-gradient(90deg, #2ECC71, #27AE60);
                color:white;
                padding:20px;
                border-radius:12px;
                text-align:center;
                margin-bottom:30px;
                box-shadow:0 8px 20px rgba(0,0,0,0.10);
            }

            .title h1{
                font-size:32px;
            }

            table{
                width:100%;
                border-spacing:0 12px;
            }

            th{
                background:white;
                padding:22px;
                border:1px solid #908CFF;
                font-size:18px;
                font-weight:700;
            }

            th:first-child{
                border-top-left-radius:12px;
                border-bottom-left-radius:12px;
            }

            th:last-child{
                border-top-right-radius:12px;
                border-bottom-right-radius:12px;
            }

            td{
                background:white;
                padding:22px;
                text-align:center;
                border-top:1px solid #908CFF;
                border-bottom:1px solid #908CFF;
            }

            td:first-child{
                border-left:1px solid #908CFF;
                border-top-left-radius:12px;
                border-bottom-left-radius:12px;
            }

            td:last-child{
                border-right:1px solid #908CFF;
                border-top-right-radius:12px;
                border-bottom-right-radius:12px;
            }

            .status{
                background:#2ECC71;
                color:white;
                padding:10px 18px;
                border-radius:8px;
                font-weight:600;
                display:inline-block;
            }

            .btn{
                background:linear-gradient(90deg, #8165FD, #54639E);
                color:white;
                padding:12px 25px;
                border-radius:10px;
                text-decoration:none;
                font-weight:600;
                display:inline-block;
                transition:0.3s;
            }

            .btn:hover{
                transform:translateY(-3px);
                box-shadow:0 8px 20px rgba(0,0,0,0.12);
            }

            .kembali{
                margin-top:35px;
            }

            .btn-kembali{
                background:linear-gradient(90deg, #8165FD, #54639E);
                color:white;
                padding:14px 35px;
                border-radius:10px;
                text-decoration:none;
                font-weight:600;
                display:inline-block;
                transition:0.3s;
            }

            .btn-kembali:hover{
                transform:translateY(-3px);
                box-shadow:0 8px 20px rgba(0,0,0,0.12);
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebaradmin')

        <div class="content">
            <div class="title">
                <h1>Data Selesai</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($pengaduans as $pengaduan)
                    <tr>
                        <td>{{ $pengaduan->judul }}</td>
                        <td>{{ $pengaduan->user->name ?? 'N/A' }}</td>
                        <td>{{ $pengaduan->created_at->format('d F Y') }}</td>
                        <td>
                            <span class="status">{{ $pengaduan->status }}</span>
                        </td>
                        <td>
                            <a href="/detailpengaduanselesai/{{ $pengaduan->id }}" class="btn">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #4338F2; font-weight: 500;">
                            Tidak ada pengaduan yang sudah selesai diproses.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="kembali">
                <a href="/dashboardadmin" class="btn-kembali">Kembali</a>
            </div>
        </div>
    </body>
</html>