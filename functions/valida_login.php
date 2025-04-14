<?php
session_start();
/* Include para puxar os usuário, implementado dessa forma porque o php não estava reconhecendo outras pastas, então o server aponta para o root(raiz) antes de entrar na pasta do projeto*/
include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';

//Requisição do tipo post para trazer para o lado do servidor os inputs de usuário e senha
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    //Validação de credencias e redirecionamento
    if ($usuario === $usuario_admin['usuario'] && password_verify($senha, $usuario_admin['senha'])) {
        $_SESSION['logado'] = true;
        header('Location: /projeto/main/protegida.php');
        exit;
    } else {
        header('Location: login.php?erro=1');
        exit;
    }
}
?>