<?php
    //Pagina inicial com exibição do catálogo

    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/functions/utils.php';

    $dadosJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/projeto/data/itens.json');
        $tudo_musica = json_decode($dadosJson, true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="icon" type="image/x-icon" href="/assets/img/favico.ico">
    <title>Musicas</title>
    <link rel="stylesheet" href="./style.css"/> 
    <link rel="stylesheet" href="/projeto/includes/header.css">
    <link rel="stylesheet" href="/projeto/includes/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <div class="container mt-5">
        <br>
        <br>
        <div class="row">

            <?php foreach ($tudo_musica as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card">

                    <div class="card-img">
                        <img src="<?= $item['imagem'] ?>" class="card-img-top" alt="<?= $item['titulo'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['titulo'] ?></h5>
                        <p class="card-text"><?= $item['categoria'] ?></p>
                        <a href="/projeto/main/detalhes.php?id=<?= $item['id'] ?>" class="btn btn-primary">Ver mais</a>
                    </div>

                </div>
            </div>
            <?php endforeach ?>
        </div>

    </div>
</body>
<footer>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/footer.php'; ?>
</footer>
</html>