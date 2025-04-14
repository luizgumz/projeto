<?php
    //Pagina com detalhes de um item (GET ID)

    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/functions/utils.php';

    $dadosJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/projeto/data/itens.json');
        $tudo_musica = json_decode($dadosJson, true);

    $id = $_GET['id'] ?? 0;
    $item = buscarItemPorId($id, $tudo_musica);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicas/<?php $item['titulo'] ?></title>
    <link rel="stylesheet" href="/projeto/includes/header.css">
    <link rel="stylesheet" href="/projeto/includes/footer.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <div class="container mt-5">
        <br>
        <?php if ($item): ?>
            <h1><?= $item['titulo'] ?></h1>
            <br>
            <img src="<?= $item['imagem'] ?>" class="img-fluid mb-3" alt="<?= $item['titulo'] ?>">
            <p><strong>Autor: </strong> <?= $item['autor'] ?></p>
            <p><strong>Categoria: </strong> <?= $item['categoria'] ?></p>
            <p><strong>Idioma: </strong> <?= $item['idioma'] ?></p>
            <p><?= $item['descricao'] ?></p>
        <?php else: ?>
            <p>Item não encontrado.</p>
        <?php endif ?>
    </div>
</body>
<footer>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/footer.php'; ?>
</footer>
</html>



