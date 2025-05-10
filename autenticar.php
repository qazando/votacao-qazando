<?php
session_start();
require 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$stmt = $conn->prepare("SELECT id, nome, senha, curso, tipo FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($usuario = $resultado->fetch_assoc()) {
    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $email,
            'curso' => $usuario['curso'],
            'tipo' => $usuario['tipo']
        ];
        header('Location: index.php');
        exit;
    }
}

echo "E-mail ou senha inválidos. <a href='login.php'>Tentar novamente</a>";
