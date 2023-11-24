<?php
$servername = "127.0.0.1";  // Endereço do servidor MariaDB
$username = "root";         // Nome de usuário do banco de dados
$password = "";             // Senha do banco de dados (deixe em branco se não houver senha)
$dbname = "contato_db";     // Nome do banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die('Erro de Conexão: ' . $conexao->connect_error);
}

// Inicializa a variável de controle para a exibição da mensagem
$exibirMensagem = false;

// Processa o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $mensagem = $_POST['message'];

    // Usa declaração preparada para evitar injeção de SQL
    $stmt = $conexao->prepare("INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    // Executa a declaração preparada
    $resultado = $stmt->execute();

    // Verifica se a inserção foi bem-sucedida
    if ($resultado) {
        $exibirMensagem = true;
    }

    // Fecha a declaração preparada
    $stmt->close();

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (seu código HTML existente) ... -->
    <style>
        /* Adicione estilos CSS para a mensagem de sucesso */
        .mensagem-sucesso {
            background: #b5f4bd; /* Fundo floral */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .mensagem-sucesso h2 {
            color: #297464; /* Cor secundária */
        }

        .mensagem-sucesso p {
            color: #555;
        }

        .botao-voltar {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #297464; /* Cor secundária */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .botao-voltar:hover {
            background-color: #185852;
        }
    </style>
</head>
<body>
    <!-- ... (seu código HTML existente) ... -->

    <?php
    // Exibe a mensagem de sucesso se necessário
    if ($exibirMensagem) {
        echo '<div class="container my-5">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-8 text-center mensagem-sucesso">';
        echo '<h2>Entraremos em contato!</h2>';
        echo '<p>Obrigado por entrar em contato. Sua mensagem foi recebida com sucesso.</p>';
        echo '<a href="contato.html" class="botao-voltar">Voltar para a página de contato</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>

    <!-- ... (seu código HTML existente) ... -->
</body>
</html>