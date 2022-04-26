<?php
//isset($_POST['cadastrarPessoa']) && 
    session_start();
    if(isset($_FILES['imagemPessoaCadastro'])){
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
        
        
        //include_once('configlocal.php');
        include_once('configheroku.php');

        $nome = $_POST['nomePessoaCadastro'];
        $email = $_POST['emailPessoaCadastro'];
        $senha = $_POST['senhaPessoaCadastro'];
        $telefone = $_POST['telPessoaCadastro'];
        $cpf = $_POST['cpfCadastro'];

        $imagem = $_FILES['imagemPessoaCadastro'];

        if($imagem['error'])
            die("Falha ao enviar imagem");

        if($imagem['size'] > 2097152)
            die("Imagem muito grande. Tamanho máximo de 2MB");
        
        $pasta = "../upload/imagens/";
        $nomeDaImagem = $imagem['name'];    
        $novoNomeDaImagem = uniqid();
        $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDaImagem . "." . $extensao;

        $deu_certo = move_uploaded_file($imagem["tmp_name"], $path);
        if($deu_certo){
            $conexao->query("INSERT INTO usuario_pessoa (nome, email, senha, cpf, tel) VALUES ('$nome', '$email', '$senha', '$cpf', '$telefone')");
            //$cad_usuario = $conexao->prepare($query_usuario);
            //$cad_usuario->execute([$nome, $email, $senha, $cpf, $telefone]);
            //$conexao->query("INSERT INTO usuario_pessoa (nome, email, senha, cpf, tel) VALUES ('$nome', '$email', '$senha', '$cpf','$telefone')") or die($conexao->error);
            $cod_usuario = $conexao->insert_id;
            $conexao->query("INSERT INTO imagens_pessoa (nome, path, cod_pessoa) VALUES ('$nomeDaImagem', '$path', '$cod_usuario')") or die($conexao->error);
            header('Location: ../index.php');
            $_SESSION['emailPessoaLogin'] = $email;
            $_SESSION['senhaPessoaLogin'] = $senha;
            $_SESSION['nomePessoaLogin'] = $nome;
            //echo "<p>Enviado com sucesso!</p>";
        }
        else
            //echo "<p>Falha ao enviar imagem</p>";

        //$sql = "INSERT INTO usuario_pessoa (codigo, nome, email, senha, cpf, tel) VALUES (?, ?, ?, ?, ?, ?)";
        //$stmt = $conexao->prepare($sql);
        //$stmt->execute([null, $nome, $email, $senha, $cpf, $telefone]);

        header('Location: ../index.php');
    }

?>