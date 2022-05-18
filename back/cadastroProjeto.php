<?php
    session_start();
    if(isset($_POST['submit']) && (!empty($_POST['nome']) || !empty($_POST['ckOds']) || !empty($_POST['problema']) || !empty($_POST['descricao_projeto']) || !empty($_POST['objetivo']) || !empty($_POST['expectativa']) || !empty($_POST['publico_alvo']) || !empty($_POST['recursos']) || !empty($_POST['tipo_parceria']) || !empty($_POST['status']))){

        include_once('configlocal.php');
        //include_once('configheroku.php');

        $nome = $_POST['nome'];
        $problema = $_POST['problema'];
        $descricao_projeto = $_POST['descricao_projeto'];
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

        $pastaImagemProjetoLocal = "../upload/imagens/projeto/";
        $pastaImagemProjeto = "upload/imagens/projeto/";
        $pathImagemProjeto = $pastaImagemProjeto . $novoImagemProjeto . "." . $extensaoImagemProjeto;
        $pathImagemProjetoLocal = $pastaImagemProjetoLocal . $novoImagemProjeto . "." . $extensaoImagemProjeto;

        $ods_grupo = isset($_POST['ckOds']) ? $_POST['ckOds'] : null;
        $colaboradores_grupo = isset($_POST['ckColaboradores']) ? $_POST['ckColaboradores'] : null;      
        $links_grupo = isset($_POST['ckLinks']) ? $_POST['ckLinks'] : null;   

        if($conexao->error || $status == null){
            //$mensagem = [mysqli_errno($conexao) . ":" . mysqli_error($conexao) . ". Verifique todos os campos.", "alert-danger"];
            $mensagem = ["Falha no cadastro. Verifique todos os campos.", "alert-danger"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../cadProjects.php");
            exit();
        } else {
            $conexao->query("INSERT INTO projetos (cod_usuario, nome, problema, descricao_projeto, objetivo, expectativa, publico_alvo, recursos, `tipo_parceria`, descricao_parceria, `status`, imagem) VALUES ('$cod_usuario', '$nome', '$problema', '$descricao_projeto', '$objetivo', '$expectativa', '$publico_alvo', '$recursos', '$tipo_parceria', '$descricao_parceria', '$status', '$pathImagemProjeto')");
            $cod_proj = $conexao->insert_id;
            move_uploaded_file($imagemProjeto["tmp_name"], $pathImagemProjetoLocal);

            if($ods_grupo != null){
                for($i = 0; $i < count($ods_grupo); $i++){
                    $conexao->query("INSERT INTO ods_projetos (ods_tipo, codigo_projeto) VALUES ('$ods_grupo[$i]', '$cod_proj')");
                }
            }
            if($links_grupo != null){
                for($i = 0; $i < count($links_grupo); $i++){
                    if($links_grupo[$i] != null)
                    $conexao->query("INSERT INTO links_projeto (link, codigo_projeto) VALUES ('$links_grupo[$i]', '$cod_proj')");
                }
            }

            $extensionImage = array('jpeg', 'jpg', 'png');
            $extensionFile = 'pdf';
            foreach ($_FILES['ckArquivos']['tmp_name'] as $key => $value){
                if(empty($value)) break;
                else {
                    $filename = $_FILES['ckArquivos']['name'][$key];
                    $filename_tmp = $_FILES['ckArquivos']['tmp_name'][$key];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $pathImage = '';
                    $pathImageProj = '';
                
                    $finalimg='';
                    if(in_array($ext, $extensionImage)){
                        if(!file_exists('../upload/imagens/projeto/relevantes/' .$filename)){
                            $pathImage = '../upload/imagens/projeto/relevantes/' .$filename;
                            $pathImageProj = 'upload/imagens/projeto/relevantes/' .$filename;
                            move_uploaded_file($filename_tmp, $pathImage);
                            $finalimg=$filename;
                        } else {
                            $filename = str_replace('.', '-', basename($filename, $ext));
                            $newfilename = $filename.time().'.'.$ext;
                            $pathImage = '../upload/imagens/projeto/relevantes/' .$newfilename;
                            $pathImageProj = 'upload/imagens/projeto/relevantes/' .$newfilename;
                            move_uploaded_file($filename_tmp, $pathImage);
                            $finalimg=$newfilename;
                        }
                        $conexao->query("INSERT INTO arquivos_projetos (nome, path ,cod_projetos) VALUES ('$finalimg', '$pathImageProj', '$cod_proj')");
                    } else if($ext == $extensionFile){
                        if(!file_exists('../upload/arquivos_projeto/' .$filename)){
                            $pathImage = '../upload/arquivos_projeto/' .$filename;
                            $pathImageProj = 'upload/arquivos_projeto/' .$filename;
                            move_uploaded_file($filename_tmp, $pathImage);
                            $finalimg=$filename;
                        } else {
                            $filename = str_replace('.', '-', basename($filename, $ext));
                            $newfilename = $filename.time().'.'.$ext;
                            $pathImage = '../upload/arquivos_projeto/' .$newfilename;
                            $pathImageProj = 'upload/arquivos_projeto/' .$newfilename;
                            move_uploaded_file($filename_tmp, $pathImage);
                            $finalimg=$newfilename;
                        }
                        $conexao->query("INSERT INTO arquivos_projetos (nome, path ,cod_projetos) VALUES ('$finalimg', '$pathImageProj', '$cod_proj')");
                    } else {
                        $mensagem = ["Arquivo ou imagem não aceitos" , "alert-danger"];
                        $_SESSION['mensagem'] = $mensagem;
                        header("location: ../cadProjects.php");
                        exit();
                    }
                }
            }
            
            if($colaboradores_grupo != null){
                for($i = 0; $i < count($colaboradores_grupo); $i++){
                    if($colaboradores_grupo[$i] != null)
                    $conexao->query("INSERT INTO colaboradores_projeto (nome, cod_projeto) VALUES ('$colaboradores_grupo[$i]', '$cod_proj')");
                }
            }
            $mensagem = ["Projeto cadastrado!" , "alert-success"];
            $_SESSION['mensagem'] = $mensagem;
            header("location: ../cadProjects.php");
            exit();
        }
    }
    $mensagem = ["Falha no cadastro! Campos faltando." , "alert-danger"];
    $_SESSION['mensagem'] = $mensagem;
    header("location: ../cadProjects.php");
?>