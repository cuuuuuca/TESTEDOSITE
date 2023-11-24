<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "tratamentos";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém o tratamento da consulta SQL
$tratamento = $_GET['tratamento'];
$sql = "SELECT * FROM tratamentos WHERE nome = '$tratamento'";
$resultado = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($resultado->num_rows > 0) {
    $tratamentoData = $resultado->fetch_assoc();
    echo json_encode($tratamentoData);
} else {
    echo json_encode(['error' => 'Tratamento não encontrado']);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>