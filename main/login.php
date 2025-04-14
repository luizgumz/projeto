<?php
    //Pagina de login(POST)
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if ($usuario === $usuario_admin['usuario'] && password_verify($senha, $usuario_admin['senha'])) {
            $_SESSION['logado'] = true;
            header('Location: index.php');
            exit;
        } else {
            $erro = 'Usuário ou senha inválidos.';
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
    <form method="POST" class="container mt-5">
        <h3>Login</h3>
        <?php if ($erro): ?>
            <p class="text-danger"><?= $erro ?></p>
        <?php endif; ?>
        <div>
            <input name="usuario" class="form-control mb-2" placeholder="Usuário">
        </div>
        <div>
            <input name="senha" type="password" class="form-control mb-2" placeholder="Senha">
        </div>
        <div>
            <button class="btn btn-primary">Login</button>
        </div>
    </form>
</body>
</html>


