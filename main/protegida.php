<?php
    //Area administrativa
    session_start();
    if (!$_SESSION['logado']) {
        header("Location: login.php");
        exit;
    } else {
        header("Location: index.php");
    }

    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/itens.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicas/Admin</title>
    <link rel="stylesheet" href="/projeto/includes/header.css">
    <link rel="stylesheet" href="/projeto/includes/footer.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <div class="container mt-5">
        <h3>Administração</h3>
        <h2>Bem-vindo, <strong>Admin!</strong></h2>

        <!-- Tomar cuido com Enctyme -->
        <form method="POST" action="criar_item.php" enctype="multipart/form-data">
            <input name="titulo" class="form-control mb-2" placeholder="Título">
            <input name="autor" class="form-control mb-2" placeholder="Autor">
            <input name="categoria" class="form-control mb-2" placeholder="Categoria">
            <input name="idioma" class="form-control mb-2" placeholder="Idioma">
            <textarea name="descricao" class="form-control mb-2" placeholder="Descrição"></textarea>
            <input type="file" name="imagem" class="form-control mb-2">
            <button class="btn btn-success">Cadastrar</button>
        </form>
        
    </div>
</body>
</html>



<?php include 'includes/footer.php'; ?>
