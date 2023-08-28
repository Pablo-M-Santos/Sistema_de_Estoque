<?php
include('db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM produtos WHERE id='$product_id'");
    $row = $result->fetch_assoc();
}

if (isset($_POST['edit_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE produtos SET nome='$product_name', quantidade='$quantity' WHERE id='$product_id'";
    $conn->query($sql);
    header('Location: estoque.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
</head>
<body>
    <h2>Editar Produto</h2>
    <form method="post">
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
        Nome do Produto: <input type="text" name="product_name" value="<?php echo $row['nome']; ?>"><br>
        Quantidade: <input type="number" name="quantity" value="<?php echo $row['quantidade']; ?>"><br>
        <input type="submit" name="edit_product" value="Editar">
    </form>
</body>
</html>
