<?php
    session_start();
    unset($_SESSION['emailPessoaLogin']);
    unset($_SESSION['senhaPessoaLogin']);
    header("Location: ../index.php");
?>