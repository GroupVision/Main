<?php
    session_start();
    if(!empty($_POST['email']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('configlocal.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

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
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ../index.php');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
           header('Location: ../faq.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: ../index.php');
    }
?>