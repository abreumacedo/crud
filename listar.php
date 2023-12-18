<?php
include 'conexao.php';
include 'header.php';

$mensagem = "Nenhum Produto cadastrado !!!";

$sql = "SELECT * FROM tb_produto";

$result = $conn->query($sql);
?>

<h2>Relatório do Estoque:</h2>
<br>
<?php
if ($result->num_rows > 0) {
    echo "<table border='1'> <tr> <th>Codigo</th> <th>Nome</th> <th>Descrição</th> <th>Categoria</th> <th>Valor</th> <th>Quantidade</th> </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['cd_produto']   . "</td>";
        echo "<td>" . $row['nm_produto']   . "</td>"; 
        echo "<td>" . $row['ds_produto']   . "</td>";
        echo "<td>" . $row['nm_categoria'] . "</td>";
        echo "<td>" . $row['vl_produto']   . "</td>";
        echo "<td>" . $row['qt_produto']   . "</td>";
        echo "</tr>"; 
    }
    echo "</table>";
}
else {
    echo $mensagem;
}

include 'footer.php';
?>


