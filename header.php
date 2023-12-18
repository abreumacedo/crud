<html>
    <body>
    <h1>CRUD</h1>
    <nav>
        <hr>
        <a href="index.php">     <?= (basename($_SERVER['PHP_SELF']) == 'index.php')     ? 'INICIO'    : 'inicio';    ?></a>|
        <a href="adicionar.php"> <?= (basename($_SERVER['PHP_SELF']) == 'adicionar.php') ? 'CADASTRAR' : 'cadastrar'; ?></a>|
        <a href="listar.php">    <?= (basename($_SERVER['PHP_SELF']) == 'listar.php')    ? 'RELATÓRIO' : 'relatório'; ?></a>|
        <a href="editar.php">    <?= (basename($_SERVER['PHP_SELF']) == 'editar.php')    ? 'ATUALIZAR' : 'atualizar'; ?></a>|
        <a href="excluir.php">   <?= (basename($_SERVER['PHP_SELF']) == 'excluir.php')   ? 'EXCLUIR'   : 'excluir';   ?></a>    
        <hr>
    </nav>
    

