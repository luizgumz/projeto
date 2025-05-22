<?php
    //Pagina com detalhes de um item (GET ID)
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/itens.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/functions/utils.php';

    $id = $_GET['id'] ?? 0;
    $item = buscarItemPorId($id, $itens);
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
        <?php if ($item): ?>
            <h2><?= $item['titulo'] ?></h2>
            <img src="<?= $item['imagem'] ?>" class="img-fluid mb-3" alt="<?= $item['titulo'] ?>">
            <p><strong>Autor:</strong> <?= $item['autor'] ?></p>
            <p><strong>Categoria:</strong> <?= $item['categoria'] ?></p>
            <p><strong>Idioma:</strong> <?= $item['idioma'] ?></p>
            <p><?= $item['descricao'] ?></p>
        <?php else: ?>
            <p>Item não encontrado.</p>
        <?php endif ?>
    </div>
</body>
</html>



