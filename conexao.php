<?php
$servername = "";
$username   = "root";
$password   = "";
$dbname     = "db_produto";

$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die ("Erro conexao !!!" . $conn->connect_error);
}
?>