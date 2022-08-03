<?php
function thumb($arq)
{
    $caminho = "fotos/$arq";
    if(is_null($arq) || !file_exists($caminho))
    {
        return "fotos/indisponivel.png";
    }
    else
    {
        return $caminho;
    }
}
function voltar()
{
    return "<a href='index.php'> <i class='material-symbols-outlined'> arrow_back </i> <a/>";
}
function add()
{
    return "<a href='index.php'> <i class='material-symbols-outlined'> add_circle </i> <a/>";
}
function edit()
{
    return "<a href='index.php'> <i class='material-symbols-outlined'> edit</i> <a/>";
}
function excluir()
{
    return "<a href='index.php'> <i class='material-symbols-outlined'> delete </i> <a/>";
}

function msg_sucesso($m)
{
    $resp = "<div class='sucesso'> <i class='material-symbols-outlined'> check_circle </i> $m </div>";
    return $resp;
}

function msg_aviso($m)
{
    $resp = "<div class='aviso'> <i class='material-symbols-outlined'> report_problem </i> $m </div>";
    return $resp;
}

function msg_erro($m)
{
    $resp = "<div class='erro'> <i class='material-symbols-outlined'> dangerous </i> $m </div>";
    return $resp;
}