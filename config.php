<?php

    $dbHost = 'us-cdbr-east-05.cleardb.net';
    $dbUsername = 'b220b114472b51';
    $dbPassword = 'a215c1d8';
    $dbName = 'ods_db';
    $database = 'heroku_5491e5553e154f5';
    
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName,$database);

    // if($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>