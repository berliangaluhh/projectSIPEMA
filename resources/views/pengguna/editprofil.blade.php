<html>
    <head>
        <title>Edit Profil - SIPEMA</title>
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
                padding:50px;
                border-radius:15px;
                color:white;
                min-height:90vh;
            }

            .title{
                font-weight:600;
                margin-bottom:35px;
                font-size:28px;
            }

            .form-group{
                margin-bottom:25px;
            }

            .form-group label{
                display:block;
                margin-bottom:10px;
                font-weight:600;
                letter-spacing:3px;
                color:#000;
                font-size:14px;
            }

            .form-group input{
                width:100%;
                padding:18px 20px;
                border-radius:10px;
                border:none;
                outline:none;
                background:#F5F5F5;
                font-size:15px;
                color:#000;
                box-shadow:0 3px 8px rgba(0,0,0,0.2);
            }

            .form-group input::placeholder{
                color:#444;
            }

            .button-group{
                display:flex;
                gap:25px;
                margin-top:35px;
            }

            .btn{
                padding:14px 65px;
                border:none;
                border-radius:10px;
                font-size:15px;
                font-weight:600;
                color:white;
                cursor:pointer;
                background:linear-gradient(90deg, #8165FD, #54639E);
                box-shadow:0 5px 10px rgba(0,0,0,0.2);
                transition:0.3s;
                letter-spacing:3px;
                text-decoration:none;
                display:inline-block;
                text-align:center;
            }

            .btn:hover{
                transform:translateY(-3px);
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="form-box">
                <div class="title">
                    Edit Profil
                </div>
                <form action="/editprofil" method="POST">
                    @csrf
                    
                    @if($errors->any())
                        <div style="color: #ff3b3b; margin-bottom: 25px; font-weight: 500;">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" placeholder="Masukan Nama" value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>NPM / NIM</label>
                        <input type="text" name="nim" placeholder="Masukan NIM" value="{{ Auth::user()->nim }}" required>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <input type="text" name="program_studi" placeholder="Masukan Program Studi" value="{{ Auth::user()->program_studi }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Masukan Email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn">Kirim</button>
                        <a href="/profil" class="btn">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>