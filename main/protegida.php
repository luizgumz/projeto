<?php
    //Area administrativa
    session_start();

    /* Include para puxar os usuário, implementado dessa forma porque o php não estava reconhecendo outras pastas, então o server aponta para o root(raiz) antes de entrar na pasta do projeto*/
    include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/data/usuarios.php';

    //Mais uma verificação para ver se o usuário tá logado, importante por causa da expiração depois de 1 hora
    if (!$_SESSION['logado']) {
        header("Location: login.php");
        exit;
    }

    /* Ao receber os seguintes dados do formulário e armazenalos nas variáveis a baixo o sistema vai armazenálos no itens.json com um novo id e então enviará um feedback visual ao usuário */
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $categoria = $_POST["categoria"];
        $idioma = $_POST["idioma"];
        $descricao = $_POST["descricao"];
        $imagem = $_POST["url"];

        $jsonPath = $_SERVER['DOCUMENT_ROOT'] . '/projeto/data/itens.json';

            $dadosJson = file_get_contents($jsonPath);
            $musicas = json_decode($dadosJson, true);

            $novoId = count($musicas) + 1;

            $novaMusica = [
                'id' => $novoId,
                'titulo' => $titulo,
                'autor' => $autor,
                'categoria' => $categoria,
                'idioma' => $idioma,
                'descricao' => $descricao,
                'imagem' => $imagem,
            ];

            $musicas[] = $novaMusica;

            $salvo = file_put_contents($jsonPath, json_encode($musicas, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            if (!$salvo) {
                $resposta = "Erro ao cadastrar.";
            } else {
                $resposta = "Cadastrado com sucesso!";
            }

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
    <link rel="stylesheet" href="/projeto/main/style_secundario.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/projeto/includes/header.php'; ?>
    <div class="container-mt-5">
        
        <br>
        <h2>Bem-vindo, <strong>Admin!</strong></h2>

        <form method="POST" action="protegida.php">
            <div>
                <h3>Título</h3>
                <input name="titulo:" class="form-control mb-2" placeholder="Título" required>
            </div> 
            <div>
                <h3>Autor</h3>   
                <input name="autor:" class="form-control mb-2" placeholder="Autor" required>
            </div>
            <div>
                <h3>Categoria</h3>
                <input name="categoria:" class="form-control mb-2" placeholder="Categoria" required>
            </div>
            <div>
                <h3>Idioma</h3>
                <input name="idioma:" class="form-control mb-2" placeholder="Idioma" required>
            </div>
            <div>
                <h3>Descrição</h3>
                <textarea name="descricao:" class="form-control mb-2" placeholder="Descrição" required></textarea>
            </div>
            <div>
                <h3>Imagem</h3>
                <h4><strong>Atenção!</strong></h4>
                <h4>Deve-se colocar um link http para que a imagem funcione corretamente.</h4>
                <input type="text" name="url" class="form-control mb-2" placeholder="Link" required>
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




