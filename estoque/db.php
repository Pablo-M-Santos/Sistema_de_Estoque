<?php
$servername = "localhost:3312";
$username = "root";
$password = "";
$dbname = "db_estoque";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
