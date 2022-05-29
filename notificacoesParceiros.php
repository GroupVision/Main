<?php
  ob_start();
    require "back/validacao.php";
    include_once('back/configlocal.php');
    
    $logado = $_SESSION['nome'];
    $arrayCodDeNomeUser = [];
    $arrayNomeUser = [];
    $arrayCodPara = [];
    $arrayCodDe = [];
    $codigoPara = null;
    $c = 0; $a = 0;
    
    unset($_SESSION['mensagem2B']);

    $sqlCodPara = mysqli_query($conexao, "SELECT codigo_para, codigo FROM parceiros GROUP BY codigo_para ORDER BY `parceiros`.`codigo` DESC");
    $sqlCodDe = mysqli_query($conexao, "SELECT codigo_de, codigo FROM parceiros GROUP BY codigo_de ORDER BY `parceiros`.`codigo` DESC");
    
    while($rowCodPara = mysqli_fetch_assoc($sqlCodPara)){
      $arrayCodPara[] = $rowCodPara['codigo_para'];
    }

    while($rowCodDe = mysqli_fetch_assoc($sqlCodDe)){
      $arrayCodDe[] = $rowCodDe['codigo_de'];
    }

    $codDe = $_SESSION['codigo'];
    $codPara = implode(',', $arrayCodPara);
    $mensagem = null;
    $mensagemB = null;

    //$queryBusca = mysqli_query($conexao, "SELECT projetos.*, parceiros.*, usuario_pessoa.codigo FROM projetos, usuario_pessoa, parceiros WHERE projetos.codigo IN ($codPara) AND usuario_pessoa.codigo = $codDe AND ((codigo_de = $codDe AND codigo_para IN ($codPara)) OR (codigo_para = $codDe AND codigo_de IN ($codPara))) AND (projetos.codigo = codigo_para) ORDER BY parceiros.codigo DESC");
    
    //$queryBusca = mysqli_query($conexao,"SELECT projetos.*, parceiros.*, COUNT(parceiros.codigo) FROM projetos, usuario_pessoa, parceiros WHERE ( codigo_de IN($codDe) AND codigo_para IN($codPara) AND projetos.codigo IN ($codPara)) OR(codigo_para IN($codDe) AND codigo_de IN($codPara) AND projetos.codigo IN ($codDe)) GROUP BY parceiros.codigo HAVING COUNT(parceiros.codigo) > 1 ORDER BY parceiros.codigo DESC");
    
    $queryBuscaEnviando = mysqli_query($conexao,"SELECT projetos.*, parceiros.*, COUNT(parceiros.codigo) FROM projetos, parceiros WHERE codigo_de = $codDe AND codigo_para = projetos.codigo GROUP BY parceiros.codigo ORDER BY parceiros.codigo DESC");

    $queryBuscaRecebendo = mysqli_query($conexao,"SELECT projetos.*, parceiros.*, COUNT(parceiros.codigo) FROM parceiros INNER JOIN projetos ON codigo_para = projetos.codigo, usuario_pessoa WHERE projetos.cod_usuario = $codDe GROUP BY parceiros.codigo ORDER BY parceiros.codigo DESC");

    foreach($queryBuscaRecebendo as $row){
        $arrayCodDeNomeUser[] = $row['codigo_de'];
    }
    $codDeNomeUser = implode(",", $arrayCodDeNomeUser);
    $queryBuscaNomeUser= mysqli_query($conexao,"SELECT parceiros.codigo_de, usuario_pessoa.nome, usuario_pessoa.codigo FROM parceiros, usuario_pessoa WHERE usuario_pessoa.codigo IN ($codDeNomeUser) GROUP BY usuario_pessoa.codigo DESC");

    foreach($queryBuscaNomeUser as $row){
      $arrayNomeUser[] = $row['nome'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Landing Page Template</title>
  <link rel="shortcut icon" href="image/Logo.svg" type="image/x-icon">
  <!-- Bootstrap , fonts & icons  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="fonts/icon-font/css/style.css">
  <link rel="stylesheet" href="fonts/typography-font/typo.css">
  <link rel="stylesheet" href="fonts/fontawesome-5/css/all.css">
  <!-- Plugin'stylesheets  -->
  <link rel="stylesheet" href="plugins/aos/aos.min.css">
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="plugins/nice-select/nice-select.min.css">
  <link rel="stylesheet" href="plugins/slick/slick.min.css">
  <link rel="stylesheet" href="plugins/ui-range-slider/jquery-ui.css">
  <!-- Vendor stylesheets  -->
  <link rel="stylesheet" href="css/main.css">
  <!-- Custom stylesheet -->
</head>

<body>
  <div class="site-wrapper overflow-hidden bg-default-2">
    <!-- Header Area -->
    <header class="site-header site-header--menu-right dynamic-sticky-bg py-7 py-lg-0 site-header--absolute site-header--sticky">
      <div class="container">
        <nav class="navbar site-navbar offcanvas-active navbar-expand-lg  px-0 py-0">
          <!-- Brand Logo-->
          <div class="brand-logo">
            <a href="./index.html">
              <!-- light version logo (logo must be black)-->
              <img src="image/logo-main-black.png" alt="" class="light-version-logo default-logo">
              <!-- Dark version logo (logo must be White)-->
            </a>
          </div>
          <div class="collapse navbar-collapse" id="mobile-menu">
            <div class="navbar-nav-wrapper">
              <ul class="navbar-nav main-menu">
                <li class="nav-item dropdown">
                  <a class="nav-link"  href="Projects-ods.php" role="button" aria-haspopup="true" aria-expanded="false">Projetos ODS </a>
                  
                </li>
                <li class="nav-item dropdown active">
                  <a class="nav-link " href="#features" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">• Meus Projetos</a>
                  
                    <li class="drop-menu-item dropdown">
                      
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://odsbrasil.gov.br/home/agenda">Agenda 2030</a>
                </li>

                <li class=""nav-item dropdown active>
                  <a class="nav-link dropdown-toggle gr-toggle-arrow" id="navbarDropdown" href="#features" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    echo "<p><u>$logado</u></p>";
                  ?> 
                  <i class="icon icon-small-down"></i></a>
                  <ul class="gr-menu-dropdown dropdown-menu" aria-labelledby="navbarDropdown">
                    <li class="drop-menu-item">
                      <a href="#">
                        Cofiguração
                      </a>
                    </li>
                    <li class="drop-menu-item">
                      <a href="#">
                        Editar perfil
                      </a>
                    </li>
                    <li class="drop-menu-item" style="color: red;">
                      <a href="#">
                            SAIR
                        
                      </a>
                    </li>
                  </ul>
                </li>

                  </a>
                </li>

                <li class=
                button class="d-block d-lg-none offcanvas-btn-close focus-reset" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true" aria-label="Toggle navigation">
                  
                </button>
              </div>
              <div class="header-btn-devider ml-auto ml-lg-5 pl-2 d-none d-xs-flex align-items-center">
                <div> 
                  
                   
                  
                </div>
                <div>
                  <div class="dropdown show-gr-dropdown py-5">
                    <a class="proile media ml-7 flex-y-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="circle-40">
                        
    
                      </div>
                      <i class="fas fa-chevron-down heading-default-color ml-6"></i>
                    </a>
                    <div class="dropdown-menu gr-menu-dropdown dropdown-right border-0 border-width-2 py-2 w-auto bg-default" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="notificacoesParceiros.php">MINHAS PARCERIAS </a>
                      <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="candidate-profile-main.html">EDITAR PERFIL</a>
                      <a style="color: red;" class="dropdown-item py-2 text-red font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="back/sair.php">Sair</a>
                        
    
                    </div>

              </ul>
            </div>
           
              </div>
            </div>
          </div>

         

          <!-- Mobile Menu Hamburger-->
          <button class="navbar-toggler btn-close-off-canvas  hamburger-icon border-0" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <i class="icon icon-simple-remove icon-close"></i> -->
            <span class="hamburger hamburger--squeeze js-hamburger">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
            </span>
            </span>
          </button>
          <!--/.Mobile Menu Hamburger Ends-->
        </nav>
      </div>
    </header>
      <div class="container">
        <div class="mb-14 pt-11 pt-lg-26 pb-lg-16">
          <div class="row mb-11 align-items-center">
            <div class="col-lg-4 mb-lg-0 mb-4">
              <h3 class="font-size-6 mb-0">Minhas parcerias</h3>
            </div>
            <div class="col-lg-8">
              <div class="d-flex flex-wrap align-items-center justify-content-lg-end">
                <p class="font-size-4 mb-0 mr-6 py-2">Filtrar:</p>
                  <select name="country" id="country" style="display: none;" class="form-control nice-select pl-6 arrow-3 h-px-48 w-70 font-size-4" >
                    <option value="">Nenhum</option>
                    <option value="">Aprendizado</option>
                    <option value="">Financeiro</option>
                    <option value="">Material</option>
                    <option value="">Outros</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="bg-white shadow-8 pt-7 rounded pb-8 px-11">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal">Usuário</th>
                      <th scope="col" class="pl-0  border-0 font-size-4 font-weight-normal">Foto do projeto</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal">Nome do projeto</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal">Tipo de Parceria</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal">Status</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                    </tr>
                  </thead>
                  <?php while ($row = $queryBuscaEnviando -> fetch_assoc()){ 
                    echo "<form method='POST' action=''>";
                    for($i = 0 ; $i < count($arrayCodPara) ; $i++){
                      if($row['codigo_para'] == $arrayCodPara[$i] && $row['codigo_de'] == $codDe && $row['status'] == 0){
                        $mensagem = ["Cancelar proposta", "btn btn-warning btn-sm"];
                        $_SESSION['mensagem'] = $mensagem;  
                        $_SESSION['codPara'] = $arrayCodPara[$i];
                      } else if($row['codigo_de'] == $arrayCodPara[$i] && $row['codigo_para'] == $codDe && $row['status'] == 0) {
                        $mensagem = ["Aceitar", "btn btn-success btn-sm"];
                        $mensagem2 = ["Recusar", "btn btn-danger btn-sm"];
                        $_SESSION['mensagem'] = $mensagem;
                        $_SESSION['mensagem2'] = $mensagem2;
                        $_SESSION['codPara'] = $arrayCodPara[$i];
                      }
                    } ?>
                  <?php if($c > 0){ ?> 
                    <table class='table table-striped'>
                      <thead>
                      <tr>
                        <th scope="col" class="pl-0  border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                      </tr>
                    </thead>
                  <?php }  ?> 
                  <tbody>
                    <tr class="border border-color-2">
                      <td class="table-y-middle py-7 min-width-px-235 pr-0">
                      <h4 class="font-size-4 mb-0 font-weight-semibold text-black-2"><?php echo $row['nome'] ?></h4>
                      </td>
                      <th scope="row" class="pl-6 border-0 py-7 pr-0">
                        <a href="candidate-profile.html" class="media min-width-px-235 align-items-center">
                          <div class="circle-85 mr-6">
                            <img src="<?php echo $row['imagem'] ?>" alt="" class="w-100" />
                          </div>
                        </a>
                      </th>
                      <td class="table-y-middle py-7 min-width-px-235 pr-0">
                      <h4 class="font-size-4 mb-0 font-weight-semibold text-black-2"><?php echo $row['nome'] ?></h4>
                      </td>
                      <td class="table-y-middle py-7 min-width-px-170 pr-0">
                        <a class="font-size-3 font-weight-bold text-black-2 text-uppercase"><?php echo $row['tipo_parceria'] ?></a>
                      </td>
                      <td class="table-y-middle py-7 min-width-px-170 pr-0">
                        <a class="font-size-3 font-weight-bold text-green text-uppercase"><?php if($mensagem == ["Aceitar", "btn btn-success btn-sm"]) echo "Proposta pendente"; if($mensagem == ["Desfazer parceria", "btn btn-danger btn-sm"]) echo "Parceiros"; if($mensagem == ["Cancelar proposta", "btn btn-warning btn-sm"]) echo "Proposta enviada"?></a>
                      </td>
                      <td class="table-y-middle py-7 min-width-px-170 pr-0">
                        <a class="font-size-3 font-weight-bold text-green text-uppercase"><?php
                          if(isset($_SESSION['mensagem'])){
                            $mensagemBtn = $_SESSION['mensagem']['0'];
                            $bs_class=$_SESSION['mensagem']['1']; 
                            $codigoPara = $_SESSION['codPara'];
                            
                            ?>
                            <div class="alert alert-dismissible ">  
                              <button class="<?= $bs_class ?>" type="submit" name="submitAceitar"><?= $mensagemBtn ?></button>
                            </div>
                          </form>
                            <?php
                          }?>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <?php $c++; }?>
            <?php foreach ($queryBuscaRecebendo as $row){ 
              echo "<form method='POST' action='back/aceitarOuRecusar.php'>";
                    for($i = 0 ; $i < count($arrayCodDe) ; $i++){
                      if($row['status'] == 0) {
                          $mensagemB = ["Aceitar", "btn btn-success btn-sm"];
                          $mensagem2B = ["Recusar", "btn btn-danger btn-sm"];
                          $_SESSION['mensagemB'] = $mensagemB;
                          $_SESSION['mensagem2B'] = $mensagem2B;
                      } else if($row['status'] == 1) {
                          $mensagemB = ["Desfazer parceria", "btn btn-danger btn-sm"];
                          $_SESSION['mensagemB'] = $mensagemB;
                      }
                    }
                   ?>
                  <?php if($c > 0){ ?> 
                    <table class='table table-striped'>
                      <thead>
                      <tr>
                        <th scope="col" class="pl-0  border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                        <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                      </tr>
                    </thead>
                  <?php }  ?> 
                  <tbody>
                    <tr class="border border-color-2">
                    <td class="table-y-middle py-7 min-width-px-235 pr-0"><input type="hidden" name="nomeUser" value="<?php echo $arrayNomeUser[$a] ?>">
                      <h4 class="font-size-4 mb-0 font-weight-semibold text-black-2"  ><?php echo $arrayNomeUser[$a]; $a++ ?></h4>
                      </td>
                      <th scope="row" class="pl-6 border-0 py-7 pr-0">
                        <a href="candidate-profile.html" class="media min-width-px-235 align-items-center">
                          <div class="circle-85 mr-6">
                            <img src="<?php echo $row['imagem'] ?>" alt="" class="w-100" />
                          </div>
                        </a>
                      </th>
                      <td class="table-y-middle py-7 min-width-px-235 pr-0">
                      <h4 class="font-size-4 mb-0 font-weight-semibold text-black-2"><?php echo $row['nome'] ?></h4>
                      </td>
                      <td class="table-y-middle py-7 min-width-px-170 pr-0">
                        <a class="font-size-3 font-weight-bold text-black-2 text-uppercase"><?php echo $row['tipo_parceria']; ?></a>
                      </td>
                      <td class="table-y-middle py-7 min-width-px-170 pr-0">
                        <a class="font-size-3 font-weight-bold text-green text-uppercase"><?php if($mensagemB == ["Aceitar", "btn btn-success btn-sm"]) echo "Proposta pendente"; if($mensagemB == ["Desfazer parceria", "btn btn-danger btn-sm"]) echo "Parceiros"; if($mensagemB == ["Cancelar proposta", "btn btn-warning btn-sm"]) echo "Proposta enviada"?></a>
                      </td>
                      <td class="table-y-middle py-7 min-width-px-170 pr-0">
                        <a class="font-size-3 font-weight-bold text-green text-uppercase"><?php
                          if(isset($_SESSION['mensagemB'])){
                            $mensagemBBtn = $_SESSION['mensagemB']['0'];
                            $bs_classB=$_SESSION['mensagemB']['1']; 
                            if(isset($_SESSION['mensagem2B'])){
                              $mensagem2BBtn = $_SESSION['mensagem2B']['0'];
                              $bs_class2B=$_SESSION['mensagem2B']['1']; 
                            }
                            ?>
                            <div class="alert alert-dismissible ">
                              <input type="hidden" name="mensagem" value="<?php echo $mensagemBBtn ?>">  
                              <button class="<?= $bs_classB ?>" type="submit" name="submitAceitarB"><?= $mensagemBBtn ?></button>
                            </div>
                            <?php
                            if(isset($_SESSION['mensagem2B'])){ ?>
                              <div class="alert alert-dismissible">
                              <button class="<?= $bs_class2B ?>" type="submit" name="submitRecusarB"><?= $mensagem2BBtn ?></button>
                            </div>
                            </form>
                            <?php }
                          }?>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <?php $c++; unset($_SESSION['mensagem2B']); }?>
          </div>
        </div>
      </div>
              <!-- Right Sidebar End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Vendor Scripts -->
  <script src="js/vendor.min.js"></script>
  <!-- Plugin's Scripts -->
  <script src="plugins/fancybox/jquery.fancybox.min.js"></script>
  <script src="plugins/nice-select/jquery.nice-select.min.js"></script>
  <script src="plugins/aos/aos.min.js"></script>
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/counter-up/jquery.counterup.min.js"></script>
  <script src="plugins/counter-up/jquery.waypoints.min.js"></script>
  <script src="plugins/ui-range-slider/jquery-ui.js"></script>
  <!-- Activation Script -->
  <!-- <script src="js/drag-n-drop.js"></script> -->
  <script src="js/custom.js"></script>
</body>

<?php
  if(isset($_POST['submitAceitar'])){
    header("Location: faq.php");  
    if($mensagem == ["Aceitar", "btn btn-success btn-sm"]){
      $sqlStatus = $conexao->prepare("UPDATE parceiros SET status = 1 WHERE codigo_para = ? AND codigo_de = ?");
      $sqlStatus->bind_param("ss", $codDe, $codigoPara);
      $sqlStatus->execute();
      header("Location: notificacoesParceiros.php");
    } else if($mensagem == ["Desfazer parceria", "btn btn-danger btn-sm"]){
      $sql = $conexao->prepare("DELETE FROM parceiros WHERE codigo_para = ?");
      $sql->bind_param("s", $codDe);
      $sql->execute();
      header("Location: notificacoesParceiros.php");
    } else if($mensagem == ["Cancelar proposta", "btn btn-warning btn-sm"]){
      $sql = $conexao->prepare("DELETE FROM parceiros WHERE codigo_para = ?");
      $sql->bind_param("s", $codDe);
      $sql->execute();
      header("Location: notificacoesParceiros.php");
    }
  } 


  
  if(isset($_POST['submitRecusar']) && $mensagem != null){
    if($mensagem2 == ["Recusar", "btn btn-danger btn-sm"]){
      $sql = $conexao->prepare("DELETE FROM parceiros WHERE codigo_para = ?");
      $sql->bind_param("s", $codDe);
      $sql->execute();
      header("Location: notificacoesParceiros.php");
    }
  }
  ob_end_flush();
  ?>

</html>