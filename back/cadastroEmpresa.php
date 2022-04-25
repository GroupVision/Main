<?php
//isset($_POST['cadastrarPessoa']) && 
    if(isset($_FILES['imagemEmpresaCadastro'])){
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

        $nome = $_POST['nomeEmpresaCadastro'];
        $email = $_POST['emailEmpresaCadastro'];
        $senha = $_POST['senhaEmpresaCadastro'];
        $telefone = $_POST['telEmpresaCadastro'];
        $cnpj = $_POST['cnpjCadastro'];

        $imagem = $_FILES['imagemEmpresaCadastro'];

        if($imagem['error'])
            die("Falha ao enviar imagem");

        if($imagem['size'] > 2097152)
            die("Imagem muito grande. Tamanho máximo de 2MB");
        
        $pasta = "../upload/imagens/empresa/";
        $nomeDaImagem = $imagem['name'];    
        $novoNomeDaImagem = uniqid();
        $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png")
            die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDaImagem . "." . $extensao;

        $deu_certo = move_uploaded_file($imagem["tmp_name"], $path);
        if($deu_certo){
            $conexao->query("INSERT INTO usuario_empresa (nome, email, senha, cnpj, tel) VALUES ('$nome', '$email', '$senha', '$cnpj', '$telefone')");
            //$cad_usuario = $conexao->prepare($query_usuario);
            //$cad_usuario->execute([$nome, $email, $senha, $cpf, $telefone]);
            //$conexao->query("INSERT INTO usuario_pessoa (nome, email, senha, cpf, tel) VALUES ('$nome', '$email', '$senha', '$cpf','$telefone')") or die($conexao->error);
            $cod_usuario = $conexao->insert_id;
            $conexao->query("INSERT INTO imagens_empresa (nome, path, cod_usuario) VALUES ('$nomeDaImagem', '$path', '$cod_usuario')") or die($conexao->error);
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