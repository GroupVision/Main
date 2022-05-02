<?php
    session_start();
    if(isset($_POST['submit']) && (!empty($_POST['nome']) || !empty($_POST['problema']) || !empty($_POST['solucao']) || !empty($_POST['objetivo']) || !empty($_POST['expectativa']) || !empty($_POST['publico_alvo']) || !empty($_POST['recursos']) || !empty($_POST['tipo_parceria']) || !empty($_POST['descricao_parceria']) || !empty($_POST['status']))){

        include_once('configlocal.php');
        //include_once('configheroku.php');

        $nome = $_POST['nome'];
        $problema = $_POST['problema'];
        //$solucao = $_POST['solucao'];
        $objetivo = $_POST['objetivo'];
        $expectativa = $_POST['expectativa'];
        $publico_alvo = $_POST['publico_alvo'];
        $recursos = $_POST['recursos'];
        $descricao_parceria = $_POST['descricao_parceria'];
        $status = $_POST['status'];
        $cod_usuario = $_SESSION['codigo'];
        $tipo_parceria = $_POST['tipo_parceria'];
        $imagemProjeto = $_FILES['imagemProjeto'];

        $nomeImagemProjeto = $imagemProjeto['name'];    
        $novoImagemProjeto = uniqid();
        $extensaoImagemProjeto = strtolower(pathinfo($nomeImagemProjeto, PATHINFO_EXTENSION));

        if($extensaoImagemProjeto != "jpg" && $extensaoImagemProjeto != 'png'){
            $mensagem = ["Imagem não aceita" , "alert-danger"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../cadProjects.php");
            exit();
        }

        $pastaImagemProjeto = "../upload/imagens/projeto/";
        $pathImagemProjeto = $pastaImagemProjeto . $novoImagemProjeto . "." . $extensaoImagemProjeto;

        $ods_grupo = isset($_POST['ckOds']) ? $_POST['ckOds'] : null;
        $imagens_grupo = isset($_FILES['ckImagens']) ? $_FILES['ckImagens'] : null;
        $arquivos_grupo = isset($_FILES['ckArquivos']) ? $_FILES['ckArquivos'] : null;
        $colaboradores_grupo = isset($_POST['ckColaboradores']) ? $_POST['ckColaboradores'] : null;      
        $links_grupo = isset($_POST['ckLinks']) ? $_POST['ckLinks'] : null;   

        $conexao->query("INSERT INTO projetos (cod_usuario, nome, problema, objetivo, expectativa, publico_alvo, recursos, `tipo_parceria`, descricao_parceria, `status`, imagem) VALUES ('$cod_usuario', '$nome', '$problema', '$objetivo', '$expectativa', '$publico_alvo', '$recursos', '$tipo_parceria', '$descricao_parceria', '$status', '$pathImagemProjeto')");
        $cod_proj = $conexao->insert_id;

        if($conexao->error){
            $mensagem = [mysqli_errno($conexao) . ":" . mysqli_error($conexao), "alert-danger"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../cadProjects.php");
            exit();
        } else {
            if($ods_grupo != null){
                for($i = 0; $i < count($ods_grupo); $i++){
                    if($ods_grupo[$i] != null)
                    $conexao->query("INSERT INTO ods_projetos (ods_tipo, codigo_projeto) VALUES ('$ods_grupo[$i]', '$cod_proj')");
                }
            }
            if($links_grupo != null){
                for($i = 0; $i < count($links_grupo); $i++){
                    $conexao->query("INSERT INTO links_projeto (ods_tipo, codigo_projeto) VALUES ('$links_grupo[$i]', '$cod_proj')");
                }
            }
            if($imagens_grupo != null){
                for($i = 0; $i < count($imagens_grupo); $i++){
                    $nomeDaImagem = $imagens_grupo[$i]['name'];    
                    $novoNomeDaImagem = uniqid();
                    $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

                    if($extensao != "jpg" && $extensao != 'png'){
                        $mensagem = ["Imagem não aceita" , "alert-danger"];
                        $_SESSION['mensagem'] = $mensagem;
                        header("location: ../cadProjects.php");
                        exit();
                    }

                    $pasta = "../upload/imagens/projeto/relevantes/";
                    $path = $pasta . $novoNomeDaImagem . "." . $extensao;

                    $conexao->query("INSERT INTO imagens_projetos (nome, cod_projetos, path) VALUES ('$nomeDaImagem', '$cod_proj', '$path')");
                    $deu_certo = move_uploaded_file($imagens_grupo[$i]["tmp_name"], $path);
                    $localImagemProjeto = move_uploaded_file($imagemProjeto["tmp_name"], $pathImagemProjeto);
                }
            }
            if($arquivos_grupo != null){
                for($i = 0; $i < count($arquivos_grupo); $i++){
                    $nomeDoArquivo = $arquivos_grupo[$i]['name'];    
                    $novoNomeDoArquivo = uniqid();
                    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

                    if($extensao != "pdf"){
                        $mensagem = ["Arquino não aceito" , "alert-danger"];
                        $_SESSION['mensagem'] = $mensagem;
                        header("location: ../cadProjects.php");
                        exit();
                    }

                    $pasta = "../upload/arquivos_projeto/";
                    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

                    $conexao->query("INSERT INTO arquivos_projetos (nome, path ,cod_projetos) VALUES ('$nomeDoArquivo', '$path', '$cod_proj')");
                    $deu_certo = move_uploaded_file($arquivos_grupo[$i]["tmp_name"], $path);
                }
            }
            if($colaboradores_grupo != null){
                for($i = 0; $i < count($colaboradores_grupo); $i++){
                    $conexao->query("INSERT INTO colaboradores_projeto (nome, cod_projeto) VALUES ('$colaboradores_grupo[$i]', '$cod_proj')");
                }
            }
            
            $mensagem = ["Projeto cadastrado com sucesso!" , "alert-success"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../cadProjects.php");
            exit();
        }
    }
    $mensagem = ["Falha no cadastro! Campos faltando." , "alert-danger"];
    $_SESSION['mensagem'] = $mensagem;
    header("location: ../cadProjects.php");
?>