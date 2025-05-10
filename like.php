<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario'])) {
    echo json_encode(['status' => 'error']);
    exit;
}

$usuarioId = $_SESSION['usuario']['id'];
$sugestaoId = intval($_POST['sugestao_id']);

$resultado = $conn->query("SELECT * FROM votos WHERE usuario_id = $usuarioId AND sugestao_id = $sugestaoId");

if ($resultado->num_rows > 0) {
    // Já votou — vamos remover o voto
    $conn->query("DELETE FROM votos WHERE usuario_id = $usuarioId AND sugestao_id = $sugestaoId");
    $conn->query("UPDATE sugestoes SET likes = likes - 1 WHERE id = $sugestaoId");
} else {
    // Ainda não votou — vamos adicionar
    $conn->query("INSERT INTO votos (usuario_id, sugestao_id) VALUES ($usuarioId, $sugestaoId)");
    $conn->query("UPDATE sugestoes SET likes = likes + 1 WHERE id = $sugestaoId");
}

// Consultar número atualizado de likes
$likes = 0;
$contagem = $conn->query("SELECT likes FROM sugestoes WHERE id = $sugestaoId");
if ($row = $contagem->fetch_assoc()) {
    $likes = $row['likes'];
}

echo json_encode(['status' => 'ok', 'likes' => $likes]);
