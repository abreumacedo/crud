<?php
include 'conexao.php';
include 'header.php';

$mensagem = "Preencha os campos !!!";

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $cd_produto    = $_POST['cd_produto'];
    $nm_produto    = $_POST['nm_produto'];
    $ds_produto    = $_POST['ds_produto'];
    $nm_categoria  = $_POST['nm_categoria'];
    $vl_produto    = $_POST['vl_produto'];
    $qt_produto    = $_POST['qt_produto'];


    if (empty($cd_produto) || !is_numeric($cd_produto) ) {
        $cd_produtoErr = "* 'Codigo do Produtor' é obrigatorio e deve ser numerico !!!";
    }elseif (!preg_match('/^[0-9]+$/', $cd_produto)) {
        $cd_produtoErr = "* 'Codigo do Produtor' somente numeros !!!";
    }

    if (empty($nm_produto) || trim($nm_produto) === '') {
        $nm_produtoErr = "* 'Nome do Produtor' é obrigatorio !!!";
    } elseif (!preg_match('/^[A-Za-zÀ-Öà-ö\s]+$/', $nm_produto)){
        $nm_produtoErr = "* Nome Produtor - Somente letras e espaço. Sem espaços consecutivos !!!";
    }

    if (empty($ds_produto) || trim($ds_produto) === '') {
        $ds_produtoErr = "* 'Descrição do Produtor' é obrigatorio !!!";
    } elseif (!preg_match('/^[A-Za-zÀ-Öà-ö\s]+$/', $ds_produto) || preg_match('/\s{2,}/', $ds_produto)){
        $ds_produtoErr = "* 'Descrição do Produtor' - Somente letras e espaço. Sem espaços consecutivos !!!";
    }

    if (empty($nm_categoria) || trim($nm_categoria) === '') {
        $nm_categoriaErr = "* 'Descrição do Produtor' é obrigatorio !!!";
    } elseif (!preg_match('/^[A-Za-zÀ-Öà-ö\s]+$/', $nm_categoria) || preg_match('/\s{2,}/', $nm_categoria)){
        $nm_categoriaErr = "* 'Descrição do Produtor' - Somente letras e espaço. Sem espaços consecutivos !!!";
    }

    if (empty($vl_produto) || !is_numeric($vl_produto) ) {
        $vl_produtoErr = "* 'Valor do Produtor' é obrigatorio e deve ser numerico !!!";
    }elseif (!preg_match('/^[0-9.]+$/', $vl_produto)) {
        $vl_produtoErr = "* 'Valor do Produtor' soemnte numeros e ponto !!!";
    }

    if (empty($qt_produto) || !is_numeric($qt_produto) ) {
        $qt_produtoErr = "* 'Quantidade do Produtor' é obrigatorio e deve ser numerico !!!";
    }elseif (!preg_match('/^[0-9]+$/', $qt_produto)) {
        $qt_produtoErr = "* 'Valor do Produtor' somente numeros e ponto !!!";
    }

    if (empty($nm_produtoErr) && empty($nm_produtoErr) && empty($ds_produtoErr) && empty($nm_categoriaErr) && empty($vl_produtoErr) && empty($vl_produtoErr) ) {

        $sql_verificar = "SELECT cd_produto FROM tb_produto WHERE cd_produto ='$cd_produto'";

        $result = $conn->query($sql_verificar);
    
        if($result->num_rows == 0) {
    
            $mensagem = "Codigo: $cd_produto NÃO EXISTE !!!";
        }
        else {

            $sql = "UPDATE tb_produto 
                    SET
                        nm_produto   = '$nm_produto', 
                        ds_produto   = '$ds_produto', 
                        nm_categoria = '$nm_categoria', 
                        vl_produto   = $vl_produto, 
                        qt_produto   = $qt_produto
                    WHERE 
                    cd_produto =  $cd_produto";

            if($conn->query($sql) === TRUE) {
                $mensagem = "Produto ATUALIZADO com sucesso !!!";
            }
            else {
                $mensagem = "Error !!!" . $sql . $conn->error;
            }
        }
    }
}
?>
<h2>Atualizar Produto:</h2>
<br>
<p> <span style="color:green"><?php echo $mensagem ?></span>  </p>
<br>
<form action="editar.php" method="post">
    Codigo:     <input type="text" name="cd_produto">   <?php echo $cd_produtoErr   ?? '' ?>
    <br><br>
    Produto:    <input type="text" name="nm_produto">   <?php echo $nm_produtoErr   ?? '' ?>
    <br><br>
    Descrição:  <input type="text" name="ds_produto">   <?php echo $ds_produtoErr   ?? '' ?>
    <br><br>
    Categoria:  <input type="text" name="nm_categoria"> <?php echo $nm_categoriaErr ?? '' ?>
    <br><br>
    Quantidade: <input type="text" name="qt_produto">   <?php echo $qt_produtoErr   ?? '' ?>
    <br><br>
    Valor:      <input type="text" name="vl_produto">   <?php echo $vl_produtoErr   ?? '' ?>
    <br><br>
    <input type="submit">
</form>
<?php
include 'footer.php';
?>
