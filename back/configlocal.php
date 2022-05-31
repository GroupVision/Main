<?php
    //conexão com o banco localhost
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'ods_db';
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // if($conexao->connect_errno)
    // {
    //     echo "Erro";dadasdas
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>