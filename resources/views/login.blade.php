<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Login</title>
    <style>
        body {
            background-image: url('/images/fundo.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
        }

        h1, h2, p {
            text-align: center;
            color: white;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
        }

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(10, 10, 10, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 25px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome Tales Lima's Library</h1>
    <p>Here you can travel wherever you want!</p>

    <div class="login-container">
        <h2>Login</h2>

        <!-- Exibe mensagem de erro -->
        @if($errors->any())
            <div style="color: red; font-weight: bold; margin-bottom: 10px;">
                {{ $errors->first('login') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Usuário ou E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>

        <p class="register-link">Não tem uma conta? <a href="{{ route('register.form') }}">Cadastre-se</a></p>
    </div>
</body>
</html>
