<?php
    if(count($_POST) > 0) {
        //1. pegar os valores do form
        $nome = $_POST["nome_projeto"];
        $problema = $_POST["problema_projeto"];
        $solucao = $_POST["solucao_projeto"];
        // TODO pegar o código do usuário logado (chave estrangeira)
      
        try {
            include("configlocal.php");

            //3. verificar se email e senha estão no BD
            $sql = "INSERT INTO projeto_usuario (cod_usuario_pessoa, nome, problema, solucao) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            // TODO pegar o código do usuário logado:
            $stmt->execute([null, $nome, $problema, $solucao]);

            $resultado["msg"] = "Projeto Lançado";
            $resultado["cod"] = 1;
            $resultado["style"] = "alert-success";
        } 
        catch(PDOException $e) {
            $resultado["msg"] = "Cadastro Falhou: " . $e->getMessage();
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
    }
    include("projeto.php");
?>