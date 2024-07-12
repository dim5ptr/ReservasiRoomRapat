<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ce66da, #570860);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;
            max-width: 1100px;
        }

        .login-box {
            display: flex;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .left, .right {
            flex: 1;
            padding: 60px;
        }

        .left {
            background-color: #1c273c;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            outline: none;
            width: 100%;
            padding: 10px;
            padding-left: 40px;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 1rem;
            background: azure;
            color: #000;
            background: #fff;
        }

        .input-group input:hover{
            outline: #ce66da;
            box-shadow: 0 0 5px #ce66da;
        }

        .input-group .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #bbb;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: white;
            color: #570860;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 10px;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #ce66da;
            color: white;
        }

        .left p {
            text-align: center;
            margin-top: 10px;
        }

        .left span {
            color: #ce66da;
        }

        .right {
            background: azure;
            font-family: 'Times New Roman';
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right h2 {
            color: #570860;
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .right p {
            color: #570860;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .left p {
            text-align: center;
            margin-top: 10px;
        }

        .left a {
            color: #ce66da;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="left">
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        <span class="icon"><i class="fas fa-user"></i></span>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="submit" value="Login" class="btn-login">
                </form>
                <br>
                <p>Belum punya akun? <a href="{{ route('signin') }}">Daftar Sekarang</a></p>
            </div>
            <div class="right">
                <h2>WELCOME BACK!</h2>
                <p>Masuk Sekarang Untuk Reservasi Ruangan Yang Anda Inginkan!</p>
            </div>
        </div>
    </div>
</body>
</html>
