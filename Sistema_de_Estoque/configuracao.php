<?php
include('protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>
    <link rel="stylesheet" href="./assets/css/estoque.css">
</head>

<body>
    <header>
        <h2 class="logo"><a href="index.php">Logo</a></h2>
        <nav>
            <ul class="nav_links">
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="index.php">Login</a></li>
                <li><a href="estoque.php">Estoque</a></li>
                <li><a href="configuracao.php">Configuração</a></li>

            </ul>
        </nav>
    </header>
    Bem vindo as Configurações,
    <?php echo $_SESSION['nome']; ?>.
    <p>
        Você deseja Sair:<a href="logout.php">Sair</a>
    </p>
</body>

</html>