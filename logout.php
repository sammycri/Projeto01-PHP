<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>????</title>
</head>
<body>
<div id="corpo">

<?php
    echo msg_aviso('Você foi deslogado');
    echo voltar();
    if(isset($_SESSION['user']))
    {
        $_SESSION['user'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['tipo'] = "";
    }
?>
</div>
<?php include_once "rodape.php"; ?>
</body>
</html>