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
        <title>Criar conta</title>
    </head>
    <body>
        <div id="corpo">
            <?php
            if(!is_admin())
            {
                echo msg_erro('Área restrita! Você não é administrador!');
            }
            else
            {
                if(!isset($_POST['usuario']))
                {
                    require "user-new-form.php";
                }
                else
                {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    if ($senha1 === $senha2)
                    {
                        if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo))
                        {
                            echo msg_erro("Todos os dados são obrigatórios, tente novamente!");
                        }
                        else
                        {
                            $senha = gerarHash($senha1);
                            $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                            if($banco->query($q))
                            {
                                echo msg_sucesso("Usuário $nome cadastrado com sucesso!");
                            }
                            else
                            {
                                echo msg_erro("Não foi possível criar o usuário $usuario. Talvez o login já esteja sendo usado.");
                            }
                        }
                    }
                    else
                    {
                        echo msg_erro("As senhas não conferem. Tente novamente!");
                    }
                }
            }
            echo voltar();
            ?>
        </div>
        <?php include_once "rodape.php"; ?>
    </body>
</html>