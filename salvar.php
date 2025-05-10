<?php
session_start();
require 'conexao.php';

$texto = trim($_POST['texto'] ?? '');
$usuarioId = $_SESSION['usuario']['id'];

if ($texto !== '') {
    $stmt = $conn->prepare("INSERT INTO sugestoes (texto, usuario_id) VALUES (?, ?)");
    $stmt->bind_param("si", $texto, $usuarioId);
    $stmt->execute();
}

header('Location: index.php');
