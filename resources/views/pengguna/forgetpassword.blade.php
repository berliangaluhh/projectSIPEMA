<html>
    <head>
        <title>Pemulihan Akun - SIPEMA</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                height: 100vh;
                background: linear-gradient(135deg, #908CFF, #E1E7FF);
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                text-align: center;
                width: 100%;
                max-width: 550px;
                padding: 20px;
            }

            .logo {
                font-size: 26px;
                font-weight: 600;
                margin-bottom: 50px;
                letter-spacing: 2px;
            }

            .logo img {
                width: 40px;
                height: 40px;
            }

            h2 {
                font-size: 26px;
                margin-bottom: 15px;
                letter-spacing: 3px;
            }

            p {
                font-size: 15px;
                margin-bottom: 35px;
                color: #000000;
                line-height: 1.7;
            }

            .form-group {
                text-align: left;
                margin-bottom: 8px;
                font-weight: 500;
            }

            input {
                width: 100%;
                padding: 16px;
                border-radius: 12px;
                border: 2px solid #000000;
                background: #FFFFFF;
                margin-bottom: 30px;
                font-size: 14px;
                transition: 0.2s;
            }

            input::placeholder {
                color: #000000;
            }

            input:focus {
                border-color: #7C67E3;
                background: #FFFFFF;
                box-shadow: 0 0 8px rgba(124,103,227,0.3);
            }

            .btn {
                width: 100%;
                padding: 16px;
                border-radius: 12px;
                border: none;
                background:linear-gradient(90deg, #8165FD, #54639E);
                color: white;
                font-weight: 600;
                letter-spacing: 2px;
                cursor: pointer;
                transition: 0.25s;
            }

            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            }

            .back {
                margin-top: 30px;
                display: inline-block;
                font-size: 14px;
                color: #000000;
                text-decoration: none;
                letter-spacing: 2px;
                transition: 0.2s;
            }

            .back:hover {
                color: #FFFFFF;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="logo">
                <span>SIPEMA</span>
            </div>
            <h2>Pemulihan Akun</h2>
            <p>Masukkan email akun Anda yang sudah terdaftar kemudian ikuti langkah pada email yang Kami kirimkan.</p>
            <form action="/forgetpassword" method="POST">
                @csrf
                
                @if($errors->any())
                    <div style="color: #ff3b3b; margin-bottom: 25px; font-weight: 500;">
                        {{ $errors->first() }}
                    </div>
                @endif
                
                @if(session('status'))
                    <div style="background: #2ecc71; color: white; padding: 15px; border-radius: 8px; margin-bottom: 25px; font-weight: 600;">
                        {{ session('status') }}
                    </div>
                @endif
                
                <div class="form-group">Email</div>
                <input type="email" name="email" placeholder="Masukan Email yang Sudah Terdaftar" required>
                <button type="submit" class="btn">Kirimkan</button>
            </form>
            <a href="/login" class="back">Kembali ke Halaman Login</a>
        </div>
    </body>
</html>