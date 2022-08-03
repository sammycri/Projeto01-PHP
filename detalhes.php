<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>detalhes</title>
    <link rel="stylesheet" href="estilo.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
<?php
    require_once "includes/banco.php";
    require_once "includes/login.php";
    require_once "includes/funcoes.php";
?>
    <div id="corpo">
        <?php
            $c = isset($_GET['cod']) ? $_GET['cod']:0;
            $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1> Detalhes do Jogo</h1>
        <table class='detalhes'>
            <?php
                if(!$busca)
                {
                    echo "<tr><td>Busca falhou! $banco->error";
                }
                else
                {
                    if($busca->num_rows == 1)
                    {
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr><td rowspan='3'> <img src='$t' class='full' />";
                        echo "<td><h2>$reg->nome</h2>";
                        echo "Nota: " . number_format($reg->nota, 1) . "/10.0";
                        if(is_admin())
                        {
                            echo add();
                            echo edit();
                            echo excluir();

                        }
                        else if (is_editor())
                        {
                            echo edit();
                        }
                        echo "<tr><td>$reg->descricao";
                    }
                    else
                    {
                        echo "<tr><td> Nenhum registro encontrado";
                    }
                }


            ?>

    </table>
        <?php echo voltar() ?>
</div>
<?php include_once "rodape.php"; ?>
</body>

</html>