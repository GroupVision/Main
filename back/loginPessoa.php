<?php
    session_start();
    if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('configlocal.php');

        $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

        $query = ("SELECT codigo, cpf, nome, tel  FROM usuario_pessoa WHERE email = '$usuario' AND senha = '$senha'");

        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        $usuario = $result->fetch_assoc();

        if($row == 1)
        {
            $_SESSION['codigo'] = $usuario['codigo'];
            $_SESSION['nome'] = $usuario['nome'];
            header('Location: ../logadoPessoa.php');
            exit;
            

            //unset($_SESSION['email']);
            //unset($_SESSION['senha']);
            //header('Location: ../index.php');
        }
        else
        {
            $_SESSION['nao_autenticado'] = true;
            header('Location: ../index.php');
            exit;
            //$_SESSION['UsuarioID'] = $result['codigo'];
            //$_SESSION['UsuarioNome'] = $result['nome'];
            //$_SESSION['UsuarioNivel'] = $result['email'];
            //header('Location: ../logadoPessoa.php');
        }
    }
    else
    {
        // Não acessa
        echo "Email ou senha inválidos!";
        exit;
    }
?>