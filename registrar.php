<?php
require 'conexao.php';

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];
$curso = $_POST['curso'];

if ($senha !== $confirmar) {
    die("Senhas não conferem. <a href='cadastro.php'>Voltar</a>");
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// Verifica se e-mail já existe
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    die("E-mail já cadastrado. <a href='login.php'>Login</a>");
}

$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, curso) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $senhaHash, $curso);
$stmt->execute();

header('Location: login.php?sucesso=1');

