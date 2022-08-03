<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de jogos</title>
    <link rel="stylesheet" href="estilo.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/login.php";
        require_once "includes/funcoes.php";
        $ordem = $_GET['o']??"n";
        $chave = $_GET['c']??"";
    ?>
    <div id="corpo">
        <header><?php include_once "topo.php"; ?></header>
        <h1> Escolha seu jogo</h1>
        <form method="get"  id="busca" action="index.php">
            Ordernar:
            <a href="index.php?o=n&c=<?php echo "$chave"; ?>"> Nome</a> |
            <a href="index.php?o=p&c=<?php echo "$chave"; ?>">Produtora</a> |
            <a href="index.php?o=n1&c=<?php echo "$chave"; ?>">Nota Alta</a> |
            <a href="index.php?o=n2&c=<?php echo "$chave"; ?>">Nota Baixa</a> |
            <a href="index.php">Mostrar Todos </a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40"/>
            <input type="submit" value="Ok"/>

        </form>
        <table class="listagem">
            <?php
            $q = "select j.cod, j.nome, g.genero, p.produtora, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
            if(!empty($chave))
            {
                $q .= "WHERE j.nome like '%$chave%'  OR p. produtora like '%$chave%' OR g.genero like '%$chave%' ";
            }
            switch ($ordem)
            {
                case "p":
                    $q .= "order by p.produtora";
                    break;
                case "n1":
                    $q .= "order by j.nota DESC";
                    break;
                case "n2":
                    $q .= "order by j.nota ASC";
                    break;
                default:
                    $q .= "order by j.nome";

            }

                $busca = $banco->query($q);
                if(!$busca)
                {
                    echo "<tr><td> Infelizmente a busca deu errado ";
                }
                else
                {
                    if($busca->num_rows > 0)
                    {
                        while ($reg=$busca->fetch_object())
                        {
                            $t = thumb($reg->capa);
                            echo "<tr><td><img src='fotos/$reg->capa' class='mini' />";
                            echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome </a>";
                            echo "[$reg->genero]";
                            echo "<br/>$reg->produtora";
                            if(is_admin())
                            {
                                echo "<td>" . add();
                                echo edit();
                                echo excluir();

                            }
                            else if (is_editor())
                            {
                                echo "<td>" . edit();
                            }
                        }
                    }
                    else
                    {
                        echo "<tr><td> Nenhum registro encontrado";
                    }
                }
            ?>

        </table>
    </div>
    <?php include_once "rodape.php"; ?>
</body>
</html>