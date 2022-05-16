<?php

    if(!empty($_GET['codigo']))
    {
        include_once('config.php');

        $codigo = $_GET['codigo'];

        $sqlSelect = "SELECT *  FROM usuario_pessoa WHERE codigo=$codigo";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuario_pessoa WHERE codigo=$codigo";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: sistema.php');
   
?>