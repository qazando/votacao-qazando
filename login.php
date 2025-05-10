<?php
$sucesso = isset($_GET['sucesso']) && $_GET['sucesso'] == 1;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ESSA LINHA É ESSENCIAL -->
    <title>Login - Qazando</title>
    <link rel="stylesheet" href="login.css?v=46">


</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <?php if ($sucesso): ?>
                <div class="alerta-sucesso">✅ Cadastro realizado com sucesso!</div>
            <?php endif; ?>

            <h1>Login</h1>
            <form action="autenticar.php" method="POST" class="auth-form">
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Entrar</button>
            </form>
            <p class="auth-link">Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>
