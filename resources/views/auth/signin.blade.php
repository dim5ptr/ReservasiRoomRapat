<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>

* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ce66da, #570860);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            background: azure;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 30%;
            height: 70vh;
        }

        .form-box {
            text-align: center;
        }

        .form-box h2 {
            font-size: 2em;
            font-weight: 800;
            margin-bottom: 10px;
            color:  #570860;
        }

        .form-box p {
            font-weight: bold;
            margin-bottom: 30px;
            color: #666;
        }

        .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .input-box input {
            background-color: azure;
            width: 100%;
            padding: 10px 40px;
            font-size: 1em;
            border: 1px solid #570860;
            border-radius: 25px;
            outline: none;
        }

        .input-box input:hover{
            border: 2px solid #570860;
        }

        .input-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 1.2em;
        }

        .btn {
            width: 100%;
            height: 40px;
            padding: 8px 0;
            background: #9b59b6;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            font-weight: bold;
            background: #8e44ad;
        }

        .logreg-link {
            margin-top: 20px;
        }

        .logreg-link p {
            font-weight: bold;
            color: #666;
        }

        .logreg-link a {
            color: #9b59b6;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .logreg-link a:hover {
            color: #8e44ad;
            text-decoration: underline;
        }

        @media (max-width: 40%) {
            .wrapper {
                padding: 30px 20px;
            }

            .form-box h2 {
                font-size: 1.5em;
            }

            .form-box p {
                font-size: 0.9em;
            }

            .input-box input {
                padding: 10px 30px;
                font-size: 0.9em;
            }

            .btn {
                font-size: 1em;
            }

            .password-box {
                position: relative;
                margin-bottom: 20px;
            }
            .password-box input {
                width: 100%;
                padding: 10px 40px;
                font-size: 1em;
                border: 1px solid #ccc;
                border-radius: 25px;
                outline: none;
            }

            .password-box i {
                position: absolute;
                left: 15px;
                top: 50%;
                transform: translateY(-50%);
                color: #666;
                font-size: 1.2em;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="form-box login">
            <br>
            <h2>WELCOME TO SIJI</h2>
            <p>Registrasi Untuk Reservasi Yang Anda Inginkan</p>
            <br>
            <br>
            <form method="POST" action="{{ route('signin') }}">
                @csrf
                <div class="input-box">
                    <input type="text" id="name" name="name" placeholder="Name" required autofocus>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="logreg-link">
                    <p>Already have an account? <a href="{{ route('login') }}" class="register-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
