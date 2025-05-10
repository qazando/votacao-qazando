<?php
session_start();
require 'conexao.php';

$id = intval($_GET['id'] ?? 0);
$usuario = $_SESSION['usuario'];

if ($id > 0) {
    // Verifica se o usuário é dono da sugestão ou admin
    $stmt = $conn->prepare("SELECT usuario_id FROM sugestoes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $sugestao = $resultado->fetch_assoc();

    if (!$sugestao) {
        die("Sugestão não encontrada.");
    }

    if ($usuario['tipo'] === 'admin' || $usuario['id'] === $sugestao['usuario_id']) {
        $stmt = $conn->prepare("DELETE FROM sugestoes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header("Location: index.php");
    } else {
        die("Você não tem permissão para excluir esta sugestão.");
    }
}
