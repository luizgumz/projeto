<?php
    //Pagina de login(POST)
    session_start();
    /* Include para puxar os usuário, implementado dessa forma porque o php não estava reconhecendo outras pastas, então o server aponta para o root(raiz) antes de entrar na pasta do projeto*/
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';

    /*Mensagem de erro que precisa ser inicializada fora do if */
    $erro = "Usuário ou senha inválidos. Tente novamente!";

    //Recebe os usuário com método post
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        /*Verificação de credencias de usuário do lado, também um função de expiração de sessão depois de uma hora */
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
    <link rel="stylesheet" href="/projeto/main/style_login.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <form action="/projeto/functions/valida_login.php" method="POST" class="container-mt-5">
        
        <br>
        <h2>Faça login para acessar a área de administração</h2>
        
        <div>
            <h2>Login:</h2>
            <input type="text" name="usuario" required placeholder="Usuário"><br>
        </div>
        <div>
            <h2>Senha:</h2>
            <input type="password" name="senha" required placeholder="Senha"><br>
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>
    <!-- Mensagem de erro caso o usuário digite uma credencial inválida -->
    <?php if (isset($_GET['erro'])): ?>
            <p style="color:red;">Usuário ou senha inválidos. Tente novamente!</p>
    <?php endif; ?>
</body>
<footer>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/footer.php'; ?>
</footer>
</html>


