<?php 
    session_start();
    if(isset($_POST['submitAceitarB']) && $_POST['mensagem']){
        //include_once('configlocal.php');
        include_once('configheroku.php');

        $codDeRow = null;
        $codProjRow = null;
        $nomeUser = $_POST['nomeUser'];
        $mensagem = $_POST['mensagem'];
        $nomeProjeto = $_POST['nomeProjeto'];
        $codigoProjeto = $_SESSION['codigo'];

        $sql = "SELECT codigo_de, usuario_pessoa.nome, usuario_pessoa.codigo FROM parceiros, usuario_pessoa WHERE parceiros.codigo_de = usuario_pessoa.codigo AND usuario_pessoa.nome = '$nomeUser' GROUP BY codigo_de";

        $sql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        while($row = mysqli_fetch_assoc($sql)){
            $codDeRow = $row['codigo_de'];
        }
        
        $sqlProjeto = mysqli_query($conexao, "SELECT codigo FROM projetos WHERE nome = '$nomeProjeto' AND cod_usuario = $codigoProjeto");
        
        while($row = mysqli_fetch_assoc($sqlProjeto)){
            $codProjRow = $row['codigo'];
        }
        var_dump($codProjRow);
        var_dump($codDeRow);
        var_dump($nomeUser);
        var_dump($mensagem);

        if($mensagem == "Aceitar"){
            $sqlStatus = $conexao->prepare("UPDATE parceiros SET status = 1 WHERE codigo_para = ? AND codigo_de = ?");
            $sqlStatus->bind_param("ss", $codProjRow, $codDeRow);
            $sqlStatus->execute();
            header("Location: ../notificacoesParceiros.php");
        } else if ($mensagem == "Desfazer parceria"){
            $sqlStatus = $conexao->prepare("DELETE FROM parceiros WHERE codigo_para = ? AND codigo_de = ?");
            $sqlStatus->bind_param("ss", $codProjRow, $codDeRow);
            $sqlStatus->execute();
            header("Location: ../notificacoesParceiros.php");
        } else if ($mensagem == "Cancelar proposta"){
            $sqlProjeto2 = mysqli_query($conexao, "SELECT codigo FROM projetos WHERE nome = '$nomeProjeto'");
        
            while($row = mysqli_fetch_assoc($sqlProjeto2)){
                $codProjRow = $row['codigo'];
            }

            $sqlStatus = $conexao->prepare("DELETE FROM parceiros WHERE codigo_para = ? AND codigo_de = ?");
            $sqlStatus->bind_param("ss", $codProjRow, $_SESSION['codigo']);
            $sqlStatus->execute();
            header("Location: ../notificacoesParceiros.php");
        }
    } else if (isset($_POST['submitRecusarB']) && isset($_POST['mensagem2'])){
        include_once('configlocal.php');
        //include_once('configheroku.php');

        $mensagem2 = $_POST['mensagem2'];
        $codDeRow = null;
        $codProjRow = null;
        $nomeUser = $_POST['nomeUser'];
        $nomeProjeto = $_POST['nomeProjeto'];
        $codigoProjeto = $_SESSION['codigo'];

        $sql = "SELECT codigo_de, usuario_pessoa.nome, usuario_pessoa.codigo FROM parceiros, usuario_pessoa WHERE parceiros.codigo_de = usuario_pessoa.codigo AND usuario_pessoa.nome = '$nomeUser' GROUP BY codigo_de";

        $sql = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        while($row = mysqli_fetch_assoc($sql)){
            $codDeRow = $row['codigo_de'];
        }

        $sqlProjeto = "SELECT codigo FROM projetos WHERE nome = '$nomeProjeto' AND cod_usuario = $codigoProjeto";
        
        $sqlProjeto = mysqli_query($conexao, $sqlProjeto) or die(mysqli_error($conexao));

        while($row = mysqli_fetch_assoc($sqlProjeto)){
            $codProjRow = $row['codigo'];
        }

        var_dump($mensagem2);
        var_dump($codDeRow);
        var_dump($nomeUser);
        var_dump($codProjRow);

        if($mensagem2 == "Recusar"){
            $sqlStatus = $conexao->prepare("DELETE FROM parceiros WHERE codigo_para = ? AND codigo_de = ?");
            $sqlStatus->bind_param("ss", $codProjRow, $codDeRow);
            $sqlStatus->execute();
            unset($_SESSION['mensagemB']);
            unset($_SESSION['mensagem2B']);
            header("Location: ../notificacoesParceiros.php");
        }
    }
?>