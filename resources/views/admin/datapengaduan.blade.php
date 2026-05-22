<html>
    <head>
        <title>Data Pengaduan - SIPEMA</title>
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

            .search-box{
                margin-bottom:35px;
            }

            .search-box input{
                width:100%;
                padding:18px;
                border:1px solid #908CFF;
                border-radius:12px;
                background:transparent;
                outline:none;
                font-size:16px;
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

            .btn-detail{
                background:linear-gradient(90deg, #8165FD, #54639E);
                color:white;
                padding:12px 28px;
                border-radius:10px;
                text-decoration:none;
                font-weight:600;
                transition:0.3s;
                display:inline-block;
            }

            .btn-detail:hover{
                transform:translateY(-3px);
                box-shadow:0 8px 20px rgba(0,0,0,0.12);
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebaradmin')

        <div class="content">
            <div class="search-box">
                <form action="/datapengaduan" method="GET">
                    <input type="text" name="search" placeholder="Cari berdasarkan judul atau nama mahasiswa dan tekan Enter..." value="{{ request('search') }}">
                </form>
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
                                <span style="
                                    font-weight: 600;
                                    color: {{ $pengaduan->status == 'Selesai' ? '#2ecc71' : ($pengaduan->status == 'Diproses' ? '#f1c40f' : '#e74c3c') }};
                                ">
                                    {{ $pengaduan->status }}
                                </span>
                            </td>
                            <td>
                                @if($pengaduan->status == 'Selesai')
                                    <a href="/detailpengaduanselesai/{{ $pengaduan->id }}" class="btn-detail">Detail</a>
                                @else
                                    <a href="/detailpengaduan/{{ $pengaduan->id }}" class="btn-detail">Detail</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: #4338F2; font-weight: 500;">
                                Tidak ada data pengaduan yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
</html>