<html>
    <head>
        <title>Dashboard Admin - SIPEMA</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
                background:#EEF0FF;
                display:flex;
            }

            .content{
                flex:1;
                padding:35px;
            }

            .header{
                background:linear-gradient(135deg, #908CFF 15%, #200F8F 85%);
                color:white;
                padding:35px;
                border-radius:14px;
                text-align:center;
                margin-bottom:35px;
                box-shadow:0 8px 20px rgba(0,0,0,0.10);
                transition:0.3s;
            }

            .header:hover{
                transform:translateY(-5px);
            }

            .header h1{
                font-size:42px;
                letter-spacing:3px;
                font-weight:700;
            }

            .cards{
                display:grid;
                grid-template-columns:repeat(2,1fr);
                gap:30px;
            }

            .card{
                background:linear-gradient(135deg, #908CFF 15%, #200F8F 85%);
                color:white;
                padding:35px 25px;
                border-radius:14px;
                text-align:center;
                transition:0.3s;
                box-shadow:0 8px 20px rgba(0,0,0,0.10);
            }

            .card:hover{
                transform:translateY(-5px);
            }

            .card h3{
                font-size:26px;
                margin-bottom:15px;
                letter-spacing:2px;
                font-weight:600;
            }

            .card h1{
                font-size:55px;
                font-weight:700;
            }

            @media(max-width:768px){

            .cards{
                grid-template-columns:1fr;
            }

            .header h1{
                font-size:28px;
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebaradmin')

        <div class="content">
            <div class="header">
                <a href="/datapengaduan"><h1>Total Pengaduan ({{ $total }})</h1></a>
            </div>
            <div class="cards">
                <a href="/belumdiproses" class="card">
                    <h3>Belum Diproses</h3>
                    <h1>{{ $belumDiproses }}</h1>
                </a>
                <a href="/diproses" class="card">
                    <h3>Diproses</h3>
                    <h1>{{ $diproses }}</h1>
                </a>
                <a href="/selesai" class="card">
                    <h3>Selesai</h3>
                    <h1>{{ $selesai }}</h1>
                </a>
            </div>
        </div>
    </body>
</html>