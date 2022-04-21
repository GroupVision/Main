<?php
    if(count($_POST) > 0) {
        //1. pegar os valores do form
        $nome = $_POST["nome"];
        $cnpj = $_POST["cnpj"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $imagem = $_POST["imagem"];
        // TODO pegar o código do usuário logado (chave estrangeira)
      
        try {
            include("configlocal.php");

            //3. verificar se email e senha estão no BD
            $sql = "INSERT INTO usuario_empresa (codigo, nome, cnpj, tel, email, senha, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            // TODO pegar o código do usuário logado:
            $stmt->execute([null, $nome, $cnpj, $tel, $email, $senha, $imagem]);

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