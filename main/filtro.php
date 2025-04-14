<?php
    //Pagina com formulario de filtro(GET)
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/functions/utils.php';

    $dadosJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/projeto/data/itens.json');
        $tudo_musica = json_decode($dadosJson, true);

    

    $filtros = $_GET;
    $filtro_musica = filtrarItens($tudo_musica, $filtros);
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
    <br> 
    <br>
    <form method="GET" class="container mt-4">
        <div>
            <h3>Título</h3>
            <input type="text" name="titulo" placeholder="Título" class="form-control mb-2">
        </div>
        <div>
            <h3>Autor</h3>
            <input type="text" name="autor" placeholder="Autor" class="form-control mb-2">
        </div>
        <div>
            <h3>Categoria</h3>
            <input type="text" name="categoria" placeholder="Categoria" class="form-control mb-2">
        </div>
        </div>
            <h3>Idioma</h3>
            <input type="text" name="idioma" placeholder="Idioma" class="form-control mb-2">
        </div>
        <div>
            <br>
            <button class="btn btn-success">Filtrar</button>
        </div>
    </form>

    <div class="container mt-4">
        <br>
        <?php foreach ($filtro_musica as $item): ?>
            <div>
                <a href="detalhes.php?id=<?= $item['id'] ?>"><?= $item['titulo'] ?> - <?= $item['autor'] ?></a>
            </div>
        <?php endforeach ?>
    </div>

    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/footer.php'; ?>
</body>
</html>


