<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #0d0d0d;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
            width: 320px;
            text-align: center;
        }

        h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        .input-box {
            position: relative;
            margin: 20px;
        }

        .input-box input {
            width: 100%;
            padding: 12px 15px;
            background: none;
            border: none;
            outline: none;
            color: #fff;
            font-size: 18px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            transition: 0.4s;
        }

        .input-box input:focus {
            border-color: #00ffff;
            box-shadow: 0 5px 15px rgba(0, 255, 255, 0.3);
        }

        .input-box span {
            position: absolute;
            top: 50%;
            left: 15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 16px;
            pointer-events: none;
            transition: 0.4s;
            transform: translateY(-50%);
        }

        .input-box input:focus+span,
        .input-box input:not(:placeholder-shown)+span {
            top: 5px;
            font-size: 12px;
            color: #00ffff;
        }

        .submit-btn {
            background: linear-gradient(90deg, #00ffff, #00ff80);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            transition: 0.4s;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #00ff80, #00ffff);
            box-shadow: 0 5px 15px #00ffff80;
        }

        .error {
            background: red;
            color: white;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Connexion</h2>
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" name="email" placeholder="">
                <span>Email</span>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="">
                <span>Mot de passe</span>
            </div>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>
        <br>
        @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
        @endif
    </div>
</body>

</html>