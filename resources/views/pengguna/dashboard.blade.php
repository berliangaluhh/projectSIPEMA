<html>
    <head>
        <title>Dashboard - SIPEMA</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

        <style>
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
                font-family:'Poppins', sans-serif;
            }

            a{
                text-decoration:none;
                color:white;
            }

            body{
                background:#f5f6fa;
                display:flex;
            }

            .content{
                flex:1;
                padding:40px;
            }

            .header{
                background:linear-gradient(135deg, #908CFF 15%, #200F8F 85%);
                color:white;
                font-weight:600;
                padding:25px;
                border-radius:12px;
                text-align:center;
                font-size:28px;
                margin-bottom:40px;
                transition:0.3s;
            }

            .header:hover{
                transform:translateY(-5px);
            }

            .cards{
                display:grid;
                grid-template-columns:repeat(2,1fr);
                gap:25px;
            }

            .card{
                background:linear-gradient(135deg, #908CFF 15%, #200F8F 85%);
                color:white;
                padding:25px;
                border-radius:12px;
                text-align:center;
            }

            .card h1{
                font-size:42px;
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebar')

        <div class="content">
            <div class="header">Selamat Datang, {{ Auth::user()->name }}!</div>

            <div class="cards">
                <div class="card">
                    <h3>Total Pengaduan Saya</h3>
                    <h1>{{ $total }}</h1>
                </div>
                <div class="card">
                    <h3>Jumlah Diterima</h3>
                    <h1>{{ $total - $diproses - $selesai }}</h1>
                </div>
                <div class="card">
                    <h3>Jumlah Diproses</h3>
                    <h1>{{ $diproses }}</h1>
                </div>
                <div class="card">
                    <h3>Jumlah Selesai</h3>
                    <h1>{{ $selesai }}</h1>
                </div>
            </div>
        </div>
    </body>
</html>