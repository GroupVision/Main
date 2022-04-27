<?php
//isset($_POST['cadastrarPessoa']) && 
    session_start();
    if(isset($_FILES['imagem']) && isset($_POST['cadastrar']) || !empty($_POST['nome']) || !empty($_POST['email']) || !empty($_POST['tel']) || !empty($_POST['cpf'])){
        //print_r('Nome: ' . $_POST['nomePessoaCadastro']);
        //print_r('<br>');
        //print_r('Email: ' . $_POST['emailPessoaCadastro']);
        //print_r('<br>');
        //print_r('Telefone: ' . $_POST['telPessoaCadastro']);
        //print_r('<br>');
        //print_r('Senha: ' . $_POST['senhaPessoaCadastro']);
        //print_r('<br>');
        //print_r('Cpf: ' . $_POST['cpfCadastro']);
        //print_r('<br>');
        //print_r('Imagem: ' . $_POST['imagemPessoaCadastro']);
        
        
        include_once('configlocal.php');
        //include_once('configheroku.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['tel'];
        $cpf = $_POST['cpf'];

        $imagem = $_FILES['imagem'];

        if($imagem['error']){
            $mensagem = ["Falha ao enviar imagem" , "alert-danger"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../index.php");
            exit();
        }


        if($imagem['size'] > 2097152) {
            $mensagem= ["Imagem muito grande. Tamanho máximo de 2MB", "alert-danger"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../index.php");
            exit();
        }
        
        $pasta = "../upload/imagens/";
        $nomeDaImagem = $imagem['name'];    
        $novoNomeDaImagem = uniqid();
        $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != 'png'){
            $mensagem = ["Imagem não aceita" , "alert-danger"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../index.php");
            exit();
        }

        $path = $pasta . $novoNomeDaImagem . "." . $extensao;

        $deu_certo = move_uploaded_file($imagem["tmp_name"], $path);
        if($deu_certo){
            $conexao->query("INSERT INTO usuario_pessoa (nome, email, senha, cpf, tel) VALUES ('$nome', '$email', '$senha', '$cpf', '$telefone')");
            //$cad_usuario = $conexao->prepare($query_usuario);
            //$cad_usuario->execute([$nome, $email, $senha, $cpf, $telefone]);
            //$conexao->query("INSERT INTO usuario_pessoa (nome, email, senha, cpf, tel) VALUES ('$nome', '$email', '$senha', '$cpf','$telefone')") or die($conexao->error);
            $cod_usuario = $conexao->insert_id;
            if($conexao->error){
                $mensagem = ["Falha no cadastro! Cadastrar todo os campos." , "alert-danger"];
                $_SESSION['mensagem'] = $mensagem;
                header("location: ../index.php");
                exit();
            } else {
                $conexao->query("INSERT INTO imagens_pessoa (nome, path, cod_pessoa) VALUES ('$nomeDaImagem', '$path', '$cod_usuario')");
                $mensagem = ["Cadastro realizado com sucesso!" , "alert-success"];
                $_SESSION['mensagem'] = $mensagem;
                header("location: ../index.php");
                exit();
            }
        }
    }
    $mensagem = ["Falha no cadastro! Campos faltando." , "alert-danger"];
    $_SESSION['mensagem'] = $mensagem;
    header("location: ../index.php");
?>