<html>
    <head>
        <title>Login SIPEMA</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                display: flex;
                height: 100vh;
            }

            .left {
                flex: 1;
                background: url('{{ asset('images/bg-login.png') }}');
                background-size: cover;
                background-position: center;
                color: white;

                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 40px;
            }

            .left h1 {
                font-size: 40px;
                margin-bottom: 20px;
                letter-spacing: 3px;
            }

            .left p {
                max-width: 400px;
                line-height: 1.6;
            }

            .right {
                flex: 1;
                background: #E1E7FF;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .login-box {
                background: #FFFFFF;
                padding: 40px;
                border-radius: 10px;
                width: 500px;
                border: 2px solid #8A90C7;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            }

            .login-box h2 {
                margin-bottom: 5px;
            }

            .login-box small {
                display: block;
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 2px solid #7C67E3;
            }

            .login-box label {
                font-weight: 500;
            }

            .login-box input {
                width: 100%;
                padding: 10px;
                margin: 10px 0 15px;
                border-radius: 8px;
                border: 1px solid #8A90C7;
                outline: none;
            }

            .forgot {
                text-align: right;
                font-size: 12px;
                margin-bottom: 20px;
            }

            .forgot a {
                text-decoration: none;
                color: #000000;
            }

            .btn-primary {
                width: 100%;
                padding: 12px;
                border: none;
                border-radius: 8px;
                background:linear-gradient(90deg, #8165FD, #54639E);
                color: white;
                font-weight: 600;
                margin-bottom: 15px;
                letter-spacing: 2px;
                cursor: pointer;
                transition: 0.25s;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            }

            .btn-secondary {
                width: 100%;
                padding: 12px;
                border-radius: 10px;
                border: 2px solid #000000;
                background: #E1E7FF;
                cursor: pointer;
            }

            .bottom-text {
                text-align: center;
                margin-top: 10px;
                font-size: 13px;
            }

            .bottom-text span {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="left">
            <div>
                <h1>Welcome to SIPEMA</h1>
                <p>
                    Sampaikan keluhan atau kendala fasilitas secara transparan.
                    Kami siap membantu menindaklanjuti laporanmu.
                </p>
            </div>
        </div>
        <div class="right">
            <div class="login-box">
                <h2>Login</h2>
                <small>Masukkan akun SIPEMA yang sudah dimiliki</small>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    @if($errors->any())
                        <div style="color: red; margin-bottom: 15px; font-size: 14px; font-weight: 500;">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    
                    @if(session('success'))
                        <div style="color: green; margin-bottom: 15px; font-size: 14px; font-weight: 500;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukan Email" required value="{{ old('email') }}">
                    
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukan Password" required>
                    
                    <div class="forgot">
                        <a href="/forgetpassword"><b>Lupa Sandi?</b></a>
                    </div>
                    
                    <button type="submit" class="btn-primary">Sign In</button>
                </form>
                
                <a href="/register"><button class="btn-secondary">
                    Belum Memiliki Akun? <span>Register</span>
                </button></a>
            </div>
        </div>
    </body>
</html>