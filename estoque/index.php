<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | PHP</title>
</head>
<body>
    <header class="header">
        <h1>Cadastro</h1>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="?page=novo">Novo Usuário</a>
            <a href="?page=listar">Usuários Listado</a>
            <a href="?page=estoque">Estoque</a>

        </nav>
    </header>
    <?php
        include("db.php");
        switch(@$_REQUEST["page"]){
            case "novo":
                include("novo-usuario.php");
            break;
            case "listar":
                include("listar-usuario.php");
            break;
            case "salvar":
                include("salvar-usuario.php");
            break;
            case "editar":
                include("editar-usuario.php");
            break;
            case "estoque":
                include("estoque.php");
            break;
            default:
                print "<h1>Bem vindos!</h1>";
        }
    ?>
</body>
</html>