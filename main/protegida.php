<?php
    //Area administrativa
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/itens.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';

    if (!$_SESSION['logado']) {
        header("Location: login.php");
        exit;
    }
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
        <div>
            <br>
            <h3>Administração</h3>
        </div>
        <h2>Bem-vindo, <strong>Admin!</strong></h2>

        <!-- Tomar cuido com Enctyme -->
        <form method="POST" action="criar_item.php" enctype="multipart/form-data">
            <div>
                <h3>Título</h3>
                <input name="titulo" class="form-control mb-2" placeholder="Título">
            </div> 
            <div>
                <h3>Autor</h3>   
                <input name="autor" class="form-control mb-2" placeholder="Autor">
            </div>
            <div>
                <h3>Categoria</h3>
                <input name="categoria" class="form-control mb-2" placeholder="Categoria">
            </div>
            <div>
                <h3>Idioma</h3>
                <input name="idioma" class="form-control mb-2" placeholder="Idioma">
            </div>
            <div>
                <h3>Descrição</h3>
                <textarea name="descricao" class="form-control mb-2" placeholder="Descrição"></textarea>
            </div>
            <div>
                <h3>Imagem</h3>
                <input type="file" name="imagem" class="form-control mb-2">
            </div>
            <div>
                <br>
                <button class="btn btn-success">Cadastrar</button>
            </div>
        </form>
        
    </div>
</body>
<footer>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/footer.php'; ?>
</footer>
</html>




