<html>
    <head>
        <title>Profil - SIPEMA</title>
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

            .title{
                font-weight:600;
                margin-bottom:25px;
                font-size:28px;
            }

            .form-group{
                margin-bottom:25px;
            }

            .form-group label{
                display:block;
                margin-bottom:10px;
                font-weight:600;
            }

            .form-group input{
                width:100%;
                padding:15px;
                border-radius:10px;
                border:none;
                outline:none;
                background:#FFFFFF;
                font-size:14px;
                color:#000000;
            }

            .form-group input::placeholder{
                color:#000000;
                opacity:1;
            }

            .button-group{
                display:flex;
                gap:15px;
                margin-top:25px;
            }

            .btn {
                padding: 12px 25px;
                font-weight:600;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                color: white;
                background:linear-gradient(90deg, #8165FD, #54639E);
                margin-right: 10px;
                transition: 0.2s;
            }

            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }
        </style>
    </head>
    <body>

        @include('layouts.sidebar')

        <div class="content">
            <div class="form-box">
                @if(session('success'))
                    <div style="background: #2ecc71; color: white; padding: 15px; border-radius: 8px; margin-bottom: 25px; font-weight: 600;">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="title">
                    Hii! {{ Auth::user()->name }}
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" value="{{ Auth::user()->nim }}" readonly>
                </div>
                <div class="form-group">
                    <label>Program Studi</label>
                    <input type="text" value="{{ Auth::user()->program_studi }}" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="button-group">
                    <a href="/editprofil"><button class="btn">Edit Profil</button></a>
                    <a href="/gantipassword"><button class="btn">Ganti Password</button></a>
                </div>
            </div>
        </div>
    </body>
</html>