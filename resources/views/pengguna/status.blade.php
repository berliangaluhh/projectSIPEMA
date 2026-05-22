<html>
    <head>
        <title>Status Pengaduan - SIPEMA</title>
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

            .status-box{
                background:linear-gradient(90deg, #908CFF 15%, #200F8F 85%);
                border-radius:18px;
                padding:35px;
                min-height:100%;
            }

            .card{
                background:#FFFFFF;
                border-radius:18px;
                padding:35px;
                margin-bottom:30px;
                display:flex;
                justify-content:space-between;
                align-items:center;
                gap:40px;
                box-shadow:0 5px 15px rgba(0,0,0,0.08);
            }

            .left{
                width:30%;
            }

            .left h2{
                color:#4338F2;
                font-size:24px;
                margin-bottom:10px;
                font-weight:600;
            }

            .left p{
                color:#4338F2;
                font-size:16px;
            }

            .timeline{
                width:70%;
                display:flex;
                align-items:flex-start;
                justify-content:space-between;
                position:relative;
            }

            .timeline::before{
                content:'';
                position:absolute;
                top:28px;
                left:80px;
                right:80px;
                height:3px;
                background:#222;
                z-index:1;
            }

            .step{
                position:relative;
                z-index:2;
                display:flex;
                flex-direction:column;
                align-items:center;
                text-align:center;
                width:150px;
            }

            .icon{
                width:58px;
                height:58px;
                background:#DDE1FF;
                border-radius:8px;
                display:flex;
                justify-content:center;
                align-items:center;
                margin-bottom:15px;
            }

            .icon img{
                width:28px;
                height:28px;
                object-fit:contain;
            }

            .step h3{
                color:#4338F2;
                font-size:15px;
                margin-bottom:6px;
                font-weight:600;
                letter-spacing:1px;
            }

            .step p{
                color:#4338F2;
                font-size:14px;
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
            <div class="status-box">
                @forelse($pengaduans as $pengaduan)
                    <div class="card">
                        <div class="left">
                            <h2>{{ $pengaduan->judul }}</h2>
                            <p>{{ $pengaduan->created_at->format('d F Y') }}</p>
                        </div>
                        <div class="timeline">
                            <!-- Step 1: Telah Diterima -->
                            <div class="step" style="opacity: 1;">
                                <div class="icon">
                                    <img src="{{ asset('images/icon1.png') }}" alt="">
                                </div>
                                <h3>Telah Diterima</h3>
                                <p>{{ $pengaduan->created_at->format('d M Y') }}</p>
                            </div>
                            
                            <!-- Step 2: Diproses -->
                            <div class="step" style="opacity: {{ in_array($pengaduan->status, ['Diproses', 'Selesai']) ? '1' : '0.4' }};">
                                <div class="icon">
                                    <img src="{{ asset('images/icon2.png') }}" alt="">
                                </div>
                                <h3>Diproses</h3>
                                @if(in_array($pengaduan->status, ['Diproses', 'Selesai']))
                                    <p>{{ $pengaduan->updated_at->format('d M Y') }}</p>
                                @endif
                            </div>
                            
                            <!-- Step 3: Selesai -->
                            <div class="step" style="opacity: {{ $pengaduan->status == 'Selesai' ? '1' : '0.4' }};">
                                <div class="icon">
                                    <img src="{{ asset('images/icon3.png') }}" alt="">
                                </div>
                                <h3>Selesai</h3>
                                @if($pengaduan->status == 'Selesai')
                                    <p>{{ $pengaduan->updated_at->format('d M Y') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card" style="justify-content: center; color: #4338F2; font-weight: 500; text-align: center; padding: 50px;">
                        Belum ada data pengaduan untuk dilacak statusnya.
                    </div>
                @endforelse
            </div>
        </div>
    </body>
</html>