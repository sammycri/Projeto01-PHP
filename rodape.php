<?php

    echo "<footer>";
    echo "<p> Acessado por ". $_SERVER['REMOTE_ADDR'] . " em " . date('d/m/Y') . "</p>";
    echo "<p> Desenvolvido por Sammy Cristino &copy; 2022. </p>";
    echo "<footer/>";
    $banco->close();