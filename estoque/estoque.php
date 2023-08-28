<?php
include('db.php');


// Adicionar Produto
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $sql = "INSERT INTO produtos (nome, quantidade) VALUES ('$product_name', '$quantity')";
    $conn->query($sql);
}

// Editar Produto
if (isset($_POST['edit_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE produtos SET nome='$product_name', quantidade='$quantity' WHERE id='$product_id'";
    $conn->query($sql);
}

// Excluir Produto
if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];
    $sql = "DELETE FROM produtos WHERE id='$product_id'";
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administração de Estoque</title>
</head>
<body>
    <h2>Administração de Estoque</h2>

    <h3>Adicionar Produto</h3>
    <form method="post">
        Nome do Produto: <input type="text" name="product_name"><br>
        Quantidade: <input type="number" name="quantity"><br>
        <input type="submit" name="add_product" value="Adicionar">
    </form>

    <h3>Lista de Produtos</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['quantidade']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="estoque.php?delete_product=<?php echo $row['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>