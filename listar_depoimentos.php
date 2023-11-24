<?php
// Conexão com o banco de dados (substitua as credenciais conforme necessário)
$servername = "127.0.0.1";  // Endereço do servidor MariaDB
$username = "root";         // Nome de usuário do banco de dados
$password = "";             // Senha do banco de dados (deixe em branco se não houver senha)
$dbname = "depoimentos";    // Nome do banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para obter os depoimentos
$sql = "SELECT nome, email, depoimento FROM depoimentos";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Armazena os depoimentos em um array
    $depoimentos = array();
    while ($row = $result->fetch_assoc()) {
        $depoimentos[] = $row;
    }

    // Retorna os depoimentos em formato JSON
    header('Content-Type: application/json');
    echo json_encode($depoimentos);
} else {
    echo "Nenhum depoimento encontrado.";
}

$conn->close();
?>