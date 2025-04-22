<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('{{ asset("images/bg_login.jpg") }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Times New Roman, sans-serif;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            font-size: 24px;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            padding: 12px;
            width: 100%;
            background-color: #1f2937;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -5px;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #111827;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="/login">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            @if ($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
