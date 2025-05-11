<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Qazando</title>
    <link rel="stylesheet" href="cadastro.css?v=2">

</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h1>Cadastro</h1>
            <form action="registrar.php" method="POST" class="auth-form">
                <input type="text" name="nome" placeholder="Seu nome" required>
                <input type="email" name="email" placeholder="Seu e-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="password" name="confirmar" placeholder="Confirmar senha" required>

                <select name="curso" required>
                    <option value="">Selecione seu curso</option>
                    <option value="Trilha QA">Trilha QA</option>
                    <option value="Trilha Web">Trilha Web</option>
                    <option value="Trilha Mobile">Trilha Mobile</option>
                    <option value="Trilha de Performance">Trilha de Performance</option>
                    <option value="Masterclass">Masterclass</option>
                </select>

                <button type="submit">Cadastrar</button>
            </form>
            <p class="auth-link">Já tem conta? <a href="login.php">Faça login</a></p>
        </div>
    </div>
</body>
</html>
