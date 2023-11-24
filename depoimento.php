<?php
$servername = "127.0.0.1";  // Endereço do servidor MariaDB
$username = "root";         // Nome de usuário do banco de dados
$password = "";             // Senha do banco de dados (deixe em branco se não houver senha)
$dbname = "depoimentos";    // Nome do banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Inicia a sessão para armazenar os dados
session_start();

// Processa o formulário se for uma requisição POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $depoimento = $_POST["depoimento"];

    // Armazena os dados do depoimento na sessão
    $_SESSION["nome"] = $nome;
    $_SESSION["email"] = $email;
    $_SESSION["depoimento"] = $depoimento;

    // Prepara a consulta SQL para inserir o depoimento no banco de dados
    $stmt = $conn->prepare("INSERT INTO depoimentos (nome, email, depoimento) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $depoimento);

    // Executa a consulta
    if ($stmt->execute()) {
        // Redireciona para a página de sucesso
        header("Location: sucesso.php");
        exit();
    } else {
        echo "Erro ao enviar depoimento: " . $stmt->error;
    }

    // Fecha a consulta
    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>