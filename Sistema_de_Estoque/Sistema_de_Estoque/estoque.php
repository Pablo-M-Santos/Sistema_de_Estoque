<?php
include('conexao.php');
include('protect.php');

$sucesso_message = "";
$mensagem_erro = "";

if (isset($_POST['add_produto'])) {
    $product_name = $_POST['product_name'];
    $quantidade = $_POST['quantidade'];

    if (empty($product_name) || empty($quantidade)) {
        $mensagem_erro = "Preencha todos os campos.";
    } elseif ($quantidade <= 0) {
        $mensagem_erro = "A quantidade deve ser maior que 0.";
    } else {
        $sql = "INSERT INTO produtos (nome, quantidade) VALUES ('$product_name', '$quantidade')";
        if ($mysqli->query($sql)) {
            $sucesso_message = "Produto cadastrado com sucesso!";
        } else {
            $cadastro_message = "Erro ao cadastrar o produto.";
        }
    }
}

if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];
    $sql = "DELETE FROM produtos WHERE id='$product_id'";
    if ($mysqli->query($sql)) {
        $sucesso_mensagem = "Produto excluído com sucesso!";
    } else {
        $mensagem_erro = "Erro ao excluir o produto.";
    }
}

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

    <div class="content">
        <h2>Administração de Estoque</h2>

        <div class="add-product">
            <?php
            if (!empty($sucesso_message)) {
                echo '<script type="text/javascript">';
                echo 'alert("' . $sucesso_message . '");';
                echo '</script>';
            }
            if (!empty($mensagem_erro)) {
                echo '<script type="text/javascript">';
                echo 'alert("' . $mensagem_erro . '");';
                echo '</script>';
            }
            if (!empty($product_message)) {
                echo '<script type="text/javascript">';
                echo 'alert("' . $cadastro_message . '");';
                echo '</script>';
            }
            ?>
            <form method="post" action="">
                Nome do Produto: <input type="text" name="product_name"><br>
                Quantidade: <input type="number" name="quantidade"><br>
                <input type="submit" name="add_produto" value="Adicionar produto">
            </form>
        </div>

        <h3>Lista de Produtos</h3>
        <table border="1" class="product-table">
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>

            <?php
            $result = $mysqli->query("SELECT * FROM produtos");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nome']}</td>";
                echo "<td>{$row['quantidade']}</td>";
                echo "<td>
                <a href=\"edit_produto.php?id={$row['id']}\">Editar</a>
                <a href=\"estoque.php?delete_product={$row['id']}\">Excluir</a>
            </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>