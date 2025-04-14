<?php
    //Pagina com detalhes de um item a partir da seleção do item via (GET ID)

    /* Include para puxar os usuário, implementado dessa forma porque o php não estava reconhecendo outras pastas, então o server aponta para o root(raiz) antes de entrar na pasta do projeto*/
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/functions/utils.php';

    /*puxa dos dados do json e decodifica para que o php entenda */
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
    <link rel="stylesheet" href="/projeto/main/style_secundario.css">
    <link rel="stylesheet" href="/projeto/includes/header.css">
    <link rel="stylesheet" href="/projeto/includes/footer.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <div class="container-mt-5">
        <br>
        <?php if ($item): ?>
            <h1><?= $item['titulo'] ?></h1>
            <br>
            <img src="<?= $item['imagem'] ?>" class="img-fluid-mb-3" alt="<?= $item['titulo'] ?>">
            <h3><strong>Autor: </strong> <?= $item['autor'] ?></h3>
            <h3><strong>Categoria: </strong> <?= $item['categoria'] ?></h3>
            <h3><strong>Idioma: </strong> <?= $item['idioma'] ?></h3>
            <h3><?= $item['descricao'] ?></h3>
        <?php else: ?>
            <p>Item não encontrado.</p>
        <?php endif ?>
    </div>
</body>
<footer>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/footer.php'; ?>
</footer>
</html>



