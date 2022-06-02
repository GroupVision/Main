<?php 
    session_start();
    if(isset($_POST['enviar'])){
        //include_once('configlocal.php');
        include_once('configheroku.php');
        
        $id_para = $_GET['projeto'];

        $sql = $conexao->prepare("INSERT parceiros (codigo_de, codigo_para) VALUES (?, ?)");
        $sql->bind_param("ss", $_SESSION['codigo'], $id_para);
        $sql->execute();

        if($sql->affected_rows > 0) header("Location: ../notificacoesParceiros.php");
        else echo "Erro ao enviar a solicitação!";
    }
?>