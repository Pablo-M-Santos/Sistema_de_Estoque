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
<form method="post" action="">
    <input type="hidden" name="product_id" value="<?php echo $linha['id']; ?>">
    Nome do Produto: <input type="text" name="nome_do_produto" value="<?php echo $linha['nome']; ?>"><br>
    Quantidade: <input type="number" name="quantidade" value="<?php echo $linha['quantidade']; ?>"><br>
    <input type="submit" name="edit_produto" value="Salvar Edição">
</form>