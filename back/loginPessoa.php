<?php
    session_start();
    if(isset($_POST['loginPessoa']) && !empty($_POST['emailPessoaLogin']) && !empty($_POST['senhaPessoaLogin']))
    {
        // Acessa
        include_once('configheroku.php');
        //include_once('configlocal.php');
        
        $email = $_POST['emailPessoaLogin'];
        $senha = $_POST['senhaPessoaLogin'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        //$stmt = $conn->prepare("SELECT * FROM usuario_pessoa WHERE email = ? and senha = ?");
        //$stmt->bind_param("sss", $email, $senha);

        $sql = "SELECT * FROM usuario_pessoa WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($sql);
        //print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['emailPessoaLogin']);
            unset($_SESSION['senhaPessoaLogin']);
            header('Location: ../index.php');
        }
        else
        {
            
           header('Location: ../logadoPessoa.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: ../index.php');
    }
?>