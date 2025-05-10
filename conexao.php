<?php
$host = 'localhost';
$usuario = 'root';
$senha = '123456'; // padrão do XAMPP
$banco = 'qazando';

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
