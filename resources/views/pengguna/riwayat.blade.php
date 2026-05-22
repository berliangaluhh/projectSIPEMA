<html>
    <head>
        <title>Riwayat - SIPEMA</title>
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
                height:100vh;
                overflow:hidden;
            }

            .content{
                flex:1;
                padding:40px;
                overflow-y:auto;
            }

            .history-box{
                background:linear-gradient(90deg, #908CFF 15%, #200F8F 85%);
                border-radius:20px;
                padding:35px;
                box-shadow:0 10px 30px rgba(0,0,0,0.15);
                min-height:100%;
            }

            table{
                width:100%;
                border-collapse:separate;
                border-spacing:0 15px;
            }

            th{
                background:#FFFFFF;
                color:#111;
                padding:18px;
                font-size:15px;
                font-weight:600;
                text-align:center;
            }

            th:first-child{
                border-radius:12px 0 0 12px;
            }

            th:last-child{
                border-radius:0 12px 12px 0;
            }

            td{
                background:#FFFFFF;
                padding:18px;
                text-align:center;
                color:#444;
                transition:0.2s;
            }

            td:first-child{
                border-radius:12px 0 0 12px;
                width:80px;
            }

            td:last-child{
                border-radius:0 12px 12px 0;
                width:180px;
            }

            tr:hover td{
                transform:scale(1.003);
                box-shadow:0 5px 15px rgba(0,0,0,0.08);
            }

            .status{
                font-weight:600;
            }

            .btn-detail{
                background:linear-gradient(90deg, #8165FD, #54639E);
                color:white;
                border:none;
                padding:12px 30px;
                border-radius:10px;
                cursor:pointer;
                font-weight:600;
                transition:0.25s;
                font-size:14px;
            }

            .btn-detail:hover{
                transform:translateY(-2px);
                box-shadow:0 8px 20px rgba(84, 99, 158, 0.4);
            }

            a{
                text-decoration:none;
            }

            .content::-webkit-scrollbar{
                width:8px;
            }

            .content::-webkit-scrollbar-thumb{
                background:#6C63FF;
                border-radius:10px;
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebar')

        <div class="content">
            @if(session('success'))
                <div style="background: #2ecc71; color: white; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-weight: 600;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="history-box">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @forelse($pengaduans as $index => $pengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengaduan->created_at->format('d/m/Y') }}</td>
                            <td>{{ $pengaduan->judul }}</td>
                            <td>
                                <span style="
                                    font-weight: 600;
                                    color: {{ $pengaduan->status == 'Selesai' ? '#2ecc71' : ($pengaduan->status == 'Diproses' ? '#f1c40f' : '#e74c3c') }};
                                ">
                                    {{ $pengaduan->status }}
                                </span>
                            </td>
                            <td>
                                <a href="/detailriwayat/{{ $pengaduan->id }}">
                                    <button class="btn-detail">Detail</button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: white; background: rgba(255, 255, 255, 0.1);">
                                Belum ada riwayat pengaduan.
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </body>
</html>