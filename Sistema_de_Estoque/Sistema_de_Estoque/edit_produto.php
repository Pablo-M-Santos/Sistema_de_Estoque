<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $resultado = $mysqli->query("SELECT * FROM produtos WHERE id='$product_id'");
    $linha = $resultado->fetch_assoc();
}

if (isset($_POST['edit_produto'])) {
    $product_id = $_POST['product_id'];
    $nome_do_produto = $_POST['nome_do_produto'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produtos SET nome='$nome_do_produto', quantidade='$quantidade' WHERE id='$product_id'";
    $mysqli->query($sql);

    // Redirecionar de volta para a página de listagem após a edição
    header('Location: estoque.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
    <link rel="stylesheet" href="./assets/css/edit.css">
</head>
<body>
<div class="center-container">
        <form class="edit-form" method="post" action="">
            <h2>Edite os produtos</h2>
            <input type="hidden" name="product_id" value="<?php echo $linha['id']; ?>">
            <label for="nome_do_produto">Nome do Produto:</label>
            <input type="text" id="nome_do_produto" name="nome_do_produto" value="<?php echo $linha['nome']; ?>"><br>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="<?php echo $linha['quantidade']; ?>"><br>
            <input class="submit-button" type="submit" name="edit_produto" value="Salvar edição">
        </form>
    </div>

</body>
</html>