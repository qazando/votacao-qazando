<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require 'conexao.php';

$sugestoes = [];
$resultado = $conn->query("SELECT id, texto, likes, usuario_id FROM sugestoes ORDER BY likes DESC");

while ($linha = $resultado->fetch_assoc()) {
    $sugestoes[] = $linha;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideias para a Qazando</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="user-info">
            <p><strong>Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>!</strong></p>
            <p class="user-curso">Curso: <?= htmlspecialchars($_SESSION['usuario']['curso']) ?></p>
            <a href="logout.php" class="logout-link">Sair</a>
        </div>

        <h1>Qual o próximo conteúdo que você gostaria de ter na Qazando?</h1>

        <form action="salvar.php" method="POST" class="form-sugestao">
            <input type="text" name="texto" id="sugestao" placeholder="Digite sua sugestão aqui" required>
            <button type="submit">Enviar</button>
        </form>

        <ul id="lista-sugestoes">
            <?php foreach ($sugestoes as $item): ?>
                <li class="sugestao-item" data-id="<?= $item['id'] ?>">
                    <?= htmlspecialchars($item['texto']) ?>
                    <div class="acoes">
                        <button class="like-btn" onclick="darLike(<?= $item['id'] ?>)">👍 <?= $item['likes'] ?></button>
                        <?php if (
                            $_SESSION['usuario']['tipo'] === 'admin' ||
                            $_SESSION['usuario']['id'] == $item['usuario_id']
                        ): ?>
                            <a href="excluir.php?id=<?= $item['id'] ?>" class="delete-btn" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir esta sugestão?')">🗑</a>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="script.js"></script>
</body>
</html>
