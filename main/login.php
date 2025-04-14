<?php
    //Pagina de login(POST)
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';

    $erro = "Usuário ou senha inválidos. Tente novamente!";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];


        if ($usuario === $usuario_admin['usuario'] && password_verify($senha, $usuario_admin['senha'])) {
            $expiracao = time() + 3600; // 1 Hora
            setcookie('logado', true, $expiracao, '/');
            header('Location: /projeto/main/protegida.php');
            exit;
        } else {
            $erro = 'Usuário ou senha inválidos. Tente novamente!';
            exit;
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musica/login</title>
    <link rel="stylesheet" href="/projeto/includes/header.css">
    <link rel="stylesheet" href="/projeto/includes/footer.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <form action="/projeto/functions/valida_login.php" method="POST" class="container mt-5">
        <h3>Login</h3>
        
        <div>
            <input type="text" name="usuario" required placeholder="Usuário"><br>
        </div>
        <div>
            <input type="password" name="senha" required placeholder="Senha"><br>
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>

    <?php if (isset($_GET['erro'])): ?>
            <p style="color:red;">Usuário ou senha inválidos. Tente novamente!</p>
    <?php endif; ?>
</body>
<footer>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/footer.php'; ?>
</footer>
</html>


