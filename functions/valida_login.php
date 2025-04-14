<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === $usuario_admin['usuario'] && password_verify($senha, $usuario_admin['senha'])) {
        $_SESSION['logado'] = true;
        header('Location: protegida.php');
        exit;
    } else {
        header('Location: login.php?erro=1');
        exit;
    }
}
?>