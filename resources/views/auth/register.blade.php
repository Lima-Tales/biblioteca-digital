<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        /* Definindo o estilo para o corpo da página */
        body {
            font-family: Arial, sans-serif; /* Define a fonte padrão */
            background-image: url('/images/fundo.jpg'); /* Define a imagem de fundo */
            background-size: cover; /* Garante que a imagem de fundo cubra toda a tela */
            margin: 0; /* Remove as margens */
            padding: 0; /* Remove o preenchimento */
            display: flex; /* Usa flexbox para centralizar o conteúdo */
            justify-content: center; /* Centraliza o conteúdo horizontalmente */
            align-items: center; /* Centraliza o conteúdo verticalmente */
            height: 100vh; /* Define a altura da tela para 100% da altura da janela */
        }

        /* Estilo para o formulário */
        form {
            background-color: rgba(255, 255, 255, 0.6); /* Cor de fundo branca com 60% de transparência */
            padding: 20px; /* Adiciona o preenchimento interno */
            border-radius: 8px; /* Cantos arredondados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Adiciona uma sombra suave */
            width: 50%; /* Largura do formulário ocupa 50% da largura da tela */
            max-width: 400px; /* Largura máxima do formulário */
}

        /* Estilo para o título */
        form h2 {
            margin-bottom: 20px; /* Margem inferior */
            color: #333; /* Cor do texto */
            text-align: center; /* Alinha o texto ao centro */
        }

        /* Estilo para os campos de entrada do formulário */
        form div {
            margin-bottom: 15px; /* Margem inferior para cada campo */
        }

        /* Estilo para os rótulos de entrada */
        form label {
            display: block; /* Faz o label ser um bloco, ocupando toda a linha */
            margin-bottom: 5px; /* Margem inferior */
            font-weight: bold; /* Define o texto em negrito */
            color: #555; /* Cor do texto */
        }

        /* Estilo para os inputs do formulário */
        form input {
            width: 95%; /* Largura total do campo */
            padding: 10px; /* Preenchimento interno */
            border: 1px solid #ddd; /* Borda fina e clara */
            border-radius: 5px; /* Cantos arredondados */
            font-size: 14px; /* Tamanho da fonte */
        }

        /* Estilo para o botão de envio */
        form button {
            width: 100%; /* Largura total */
            padding: 10px; /* Preenchimento interno */
            background-color: #007bff; /* Cor de fundo azul */
            color: #fff; /* Cor do texto branco */
            border: none; /* Remove a borda */
            border-radius: 5px; /* Cantos arredondados */
            font-size: 16px; /* Tamanho da fonte */
            cursor: pointer; /* Mostra o cursor de ponteiro ao passar sobre o botão */
        }

        /* Estilo do botão ao passar o mouse */
        form button:hover {
            background-color: #0056b3; /* Cor de fundo mais escura */
        }

        /* Estilo para o texto de link abaixo do formulário */
        form p {
            text-align: center; /* Centraliza o texto */
            margin-top: 10px; /* Margem superior */
        }

        /* Estilo do link */
        form p a {
            color: #007bff; /* Cor azul do link */
            text-decoration: none; /* Remove o sublinhado */
        }

        /* Estilo do link ao passar o mouse */
        form p a:hover {
            text-decoration: underline; /* Adiciona sublinhado ao passar o mouse */
        }

        /* Estilo para a mensagem de sucesso */
        .success-message {
            color: green; /* Cor verde para a mensagem de sucesso */
            text-align: center; /* Centraliza a mensagem */
            margin-bottom: 20px; /* Margem inferior */
            font-weight: bold; /* Negrito */
        }
    </style>
</head>
<body>
    <!-- Formulário de cadastro -->
    <form action="{{ route('register') }}" method="POST">
        @csrf <!-- Proteção contra CSRF -->
        <h2>Cadastro de Novo Usuário</h2>

        <!-- Exibição da mensagem de sucesso -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Campo de nome -->
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <!-- Campo de email -->
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <!-- Campo de senha -->
        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <!-- Campo de confirmação de senha -->
        <div>
            <label for="password_confirmation">Confirmar Senha:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <!-- Botão de envio -->
        <button type="submit">Cadastrar</button>

        <!-- Link para página de login -->
        <p>Já tem uma conta? <a href="{{ route('login.form') }}">Login</a></p>
    </form>
</body>
</html>
