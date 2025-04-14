<?php
    //Pagina com formulario de filtro(GET)
    
   
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/itens.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/functions/utils.php';

    $filtros = $_GET;
    $resultado = filtrarItens($itens, $filtros);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicas/Filtro</title>
    <link rel="stylesheet" href="/projeto/includes/header.css">
    <link rel="stylesheet" href="/projeto/includes/footer.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <form method="GET" class="container mt-4">
        <input type="text" name="titulo" placeholder="Título" class="form-control mb-2">
        <input type="text" name="autor" placeholder="Autor" class="form-control mb-2">
        <input type="text" name="categoria" placeholder="Categoria" class="form-control mb-2">
        <input type="text" name="idioma" placeholder="Idioma" class="form-control mb-2">
        <button class="btn btn-success">Filtrar</button>
    </form>

    <div class="container mt-4">
        <?php foreach ($resultado as $item): ?>
            <div>
                <a href="detalhes.php?id=<?= $item['id'] ?>"><?= $item['titulo'] ?> - <?= $item['autor'] ?></a>
            </div>
        <?php endforeach ?>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>


