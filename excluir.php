<?php
include 'conexao.php';
include 'header.php';

$mensagem = "Preencha os campos !!!";

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $cd_produto    = $_POST['cd_produto'];

    if (empty($cd_produto) || !is_numeric($cd_produto) ) {
        $cd_produtoErr = "* 'Codigo do Produtor' é obrigatorio e deve ser numero !!!";
    }elseif (!preg_match('/^[0-9]+$/', $cd_produto)) {
        $cd_produtoErr = "* 'Codigo do Produtor' somente numeros !!!";
    }

    $sql_verificar = "SELECT cd_produto FROM tb_produto WHERE cd_produto ='$cd_produto'";

    $result = $conn->query($sql_verificar);

    if($result->num_rows == 0) {

        $mensagem = "Codigo: $cd_produto NÃO EXISTE !!!";
    }
    else {
        $sql = "DELETE FROM tb_produto WHERE cd_produto = $cd_produto";

        if($conn->query($sql) === TRUE) {
            $mensagem = "Codigo: $cd_produto foi EXCLUIDO !!!";
        }
    }
}
?>

<h2>Excluir:</h2>
<br>
<p> <span style="color:red"><?php echo $mensagem ?></span>  </p>
<br>
<form action="excluir.php" method="post">
    Codigo:     <input type="text" name="cd_produto">   <?php echo $cd_produtoErr   ?? '' ?>
    <br><br>
    <input type="submit">
</form>
<?php
include 'footer.php';
?>