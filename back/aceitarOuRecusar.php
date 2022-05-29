<?php 
    session_start();
    if(isset($_POST['submitAceitarB']) && isset($_SESSION['mensagemB'])){
        include_once('configlocal.php');
        //include_once('configheroku.php');

        $codDeRow = null;
        $nomeUser = $_POST['nomeUser'];
        $mensagem = $_POST['mensagem'];

        $sql = "SELECT codigo_de, usuario_pessoa.nome, usuario_pessoa.codigo FROM parceiros, usuario_pessoa WHERE parceiros.codigo_de = usuario_pessoa.codigo AND usuario_pessoa.nome = '$nomeUser' GROUP BY codigo_de";

        $sql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        while($row = mysqli_fetch_assoc($sql)){
            $codDeRow = $row['codigo_de'];
        }
        var_dump($nomeUser);
        if($mensagem == "Aceitar"){
            $sqlStatus = $conexao->prepare("UPDATE parceiros SET status = 1 WHERE codigo_para = ? AND codigo_de = ?");
            $sqlStatus->bind_param("ss", $_SESSION['codigo'], $codDeRow);
            $sqlStatus->execute();
            header("Location: ../notificacoesParceiros.php");
        } else if ($mensagem == "Desfazer parceria"){
            $sql = $conexao->prepare("DELETE FROM parceiros WHERE codigo_para = ? AND codigo_de = ?");
            $sql->bind_param("ss", $_SESSION['codigo'], $codDeRow);
            $sql->execute();
            header("Location: ../notificacoesParceiros.php");
        }
    }
?>