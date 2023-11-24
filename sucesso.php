<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Sucesso</title>
    <!-- Adicione seus estilos aqui -->
    <style>
        body {
            background-color: #70c853c1; /* Cor de fundo da empresa */
            color: #803838; /* Cor do texto */
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #297464; /* Cor do título */
        }

        p {
            color: #232928; /* Cor do texto regular */
            font-size: 18px;
        }

        a {
            display: inline-block;
            background-color: #297464; /* Cor do botão */
            color: #fff; /* Cor do texto do botão */
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Conteúdo HTML aqui -->

    <h1>Depoimento Enviado com Sucesso!</h1>

    <!-- Dados do Depoimento -->
    <?php
    // Inicia a sessão para acessar os dados
    session_start();

    // Recupera os dados do depoimento da sessão, se disponíveis
    if (isset($_SESSION["nome"], $_SESSION["email"], $_SESSION["depoimento"])) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $depoimento = $_SESSION["depoimento"];

        // Exibe os dados do depoimento
        echo "<p>Nome: $nome</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Depoimento: $depoimento</p>";

        // Limpa os dados da sessão
        session_unset();
        session_destroy();
    } else {
        echo "<p>Dados do depoimento não disponíveis.</p>";
    }
    ?>

    <!-- Botão Voltar para a Página Inicial -->
    <a href="index.html">VOLTAR PARA A PÁGINA INICIAL</a>

    <!-- Seus scripts adicionais aqui -->
</body>

</html>