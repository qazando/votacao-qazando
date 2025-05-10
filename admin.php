<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    die("Acesso negado. <a href='index.php'>Voltar</a>");
}

$usuarios = file_exists('usuarios.json') ? json_decode(file_get_contents('usuarios.json'), true) : [];
$sugestoes = file_exists('data.json') ? json_decode(file_get_contents('data.json'), true) : [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Admin - Qazando</h1>
        <p>Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?> (<?= $_SESSION['usuario']['tipo'] ?>)</p>
        <a href="index.php">Voltar</a>
        <h2>Usuários cadastrados</h2>
        <ul>
            <?php foreach ($usuarios as $u): ?>
                <li><?= htmlspecialchars($u['nome']) ?> - <?= $u['email'] ?> - <?= $u['curso'] ?> - <?= $u['tipo'] ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Sugestões enviadas</h2>
        <ul>
            <?php foreach ($sugestoes as $s): ?>
                <li><?= htmlspecialchars($s['texto']) ?> - Likes: <?= $s['likes'] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
