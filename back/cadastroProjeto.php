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
        $problema = $_POST['problema'];
        $solucao = $_POST['solucao'];
        $objetivo = $_POST['objetivo'];
        $expectativa = $_POST['expectativa'];
        $publico_alvo = $_POST['publico_alvo'];
        $recursos = $_POST['recursos'];
        $tipo_parceria = $_POST['tipo_parceria'];
        $descricao_parceria = $_POST['descricao_parceria'];
        $links = $_POST['links'];
        $status = $_POST['status'];
        $codigo = $_SESSION['codigo'];
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
        
        $pasta = "../upload/imagens/projeto/";
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

        $conexao->query("INSERT INTO projetos (nome, email, senha, cpf, tel) VALUES ('$nome', '$email', '$senha', '$cpf', '$telefone')");
        $cod_proj = $conexao->insert_id;

        if($conexao->error){
            $mensagem = ["Falha no cadastro de projeto!" , "alert-danger"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../projects-ods.php");
            exit();
        } else {
            $deu_certo = move_uploaded_file($imagem["tmp_name"], $path);
            $conexao->query("INSERT INTO imagens_projetos (nome, cod_pessoa, path) VALUES ('$nomeDaImagem', '$cod_proj', '$path')");
            $mensagem = ["Cadastro realizado com sucesso!" , "alert-success"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../index.php");
            exit();
        }
    }
    $mensagem = ["Falha no cadastro! Campos faltando." , "alert-danger"];
    $_SESSION['mensagem'] = $mensagem;
    header("location: ../index.php");
?>