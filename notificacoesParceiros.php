<?php
    require "back/validacao.php";
    include_once('back/configlocal.php');
    
    $logado = $_SESSION['nome'];
    $_SESSION['mensagem'][] = null;
    $arrayCodPara = null;
    $c = 0;

    $sqlCodPara = mysqli_query($conexao, "SELECT codigo_para FROM parceiros");
    
    while($rowCodPara = mysqli_fetch_assoc($sqlCodPara)){
      $arrayCodPara[] = $rowCodPara['codigo_para'];
    }

    $codDe = $_SESSION['codigo'];
    $codPara = implode(',', $arrayCodPara);

    //print_r($arrayCodPara);
    
    /*$sql = $conexao->prepare("SELECT * FROM parceiros WHERE (codigo_de = ? AND codigo_para = ?) OR (codigo_para = ? AND codigo_de = ?)");
    $sql->bind_param("ssss", $codDe, $codPara, $codDe, $codPara);
    $sql->execute();
    $get = $sql->get_result();
    $total = $get->num_rows;
    */
    $queryBusca = mysqli_query($conexao, "SELECT projetos.*, parceiros.*, usuario_pessoa.codigo FROM projetos, usuario_pessoa, parceiros WHERE projetos.codigo IN ($codPara) AND usuario_pessoa.codigo = $codDe AND ((codigo_de = $codDe AND codigo_para IN ($codPara)) OR (codigo_para = $codDe AND codigo_de IN ($codPara))) AND (projetos.codigo = codigo_para) ORDER BY parceiros.codigo DESC");
    
    /*if($total > 0){
			$dados = $get->fetch_assoc();

			if($dados['status'] == 1){
				$mensagem = ["Desfazer parceria", "btn btn-danger btn-sm"];
        $_SESSION['mensagem'] = $mensagem;
			}

      for($i = 0 ; $i < count($arrayCodPara) ; $i++){
        if($dados['codigo_para'] == $arrayCodPara[$i] && $dados['codigo_de'] == $codDe && $dados['status'] == 0){
          $mensagem = ["Cancelar proposta", "btn btn-warning btn-sm"];
          $_SESSION['mensagem'][$i] = $mensagem;  
        }
      }

			if($dados['codigo_de'] == $codPara && $dados['codigo_para'] == $codDe && $dados['status'] == 0){
        $mensagem = ["Aceitar proposta", "btn btn-success btn-sm"];
        $mensagem2 = ["Recusar proposta", "btn btn-danger btn-sm"];
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem2'] = $mensagem2;
			}
		}/*else if($total <= 0  && $codPara != $codDe){
      $mensagem = ["Pendente. Desfazer proposta", "btn btn-danger btn-sm"];
			echo "<a href='?pagina=solicitar-amizade&id={$codPara}' class='btn btn-success btn-sm'>Adicionar Amigo</a>";
		}*/

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
                  <a class="nav-link" href="Projects-ods.php">Agenda 2030</a>
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
              <p>
                - Troca de listagem do usuario > Lista de projetos!
              </p>
              <p>
                - Botão de pesquisa!
              </p>
              <p>
                - 
              </p>
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
            <?php while ($row = $queryBusca -> fetch_assoc()){ 
              for($i = 0 ; $i < count($arrayCodPara) ; $i++){
                if($row['codigo_para'] == $arrayCodPara[$i] && $row['codigo_de'] == $codDe && $row['status'] == 0){
                  $mensagem = ["Cancelar proposta", "btn btn-warning btn-sm"];
                  $_SESSION['mensagem'] = $mensagem;  
                  $_SESSION['codPara'] = $arrayCodPara[$i];
                } else {
                  if($row['codigo_de'] == $arrayCodPara[$i] && $row['codigo_para'] == $codDe && $row['status'] == 0){
                    $mensagem = ["Aceitar", "btn btn-success btn-sm"];
                    $mensagem2 = ["Recusar", "btn btn-danger btn-sm"];
                    $_SESSION['mensagem'] = $mensagem;
                    $_SESSION['mensagem2'] = $mensagem2;
                    $_SESSION['codPara'] = $arrayCodPara[$i];
                  }
              } 
              }?>
            <form method="POST" action="">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col" class="pl-0  border-0 font-size-4 font-weight-normal">Foto</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal">Nome</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal">Tipo de Parceria</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal">Status</th>
                      <th scope="col" class="border-0 font-size-4 font-weight-normal"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border border-color-2">
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
                        <a class="font-size-3 font-weight-bold text-green text-uppercase"><?php if($mensagem == ["Cancelar", "btn btn-warning btn-sm"] || $mensagem == ["Aceitar", "btn btn-success btn-sm"]) echo "Proposta pendente"?></a>
                      </td>
                      <td class="table-y-middle py-7 min-width-px-170 pr-0">
                        <a class="font-size-3 font-weight-bold text-green text-uppercase"><?php
                          if(isset($_SESSION['mensagem'])){
                            $message = $_SESSION['mensagem']['0'];
                            $bs_class=$_SESSION['mensagem']['1']; 
                            $codigoPara = $_SESSION['codPara'];
                            if(isset($_SESSION['mensagem2'])){
                              $message2 = $_SESSION['mensagem2']['0'];
                              $bs_class2=$_SESSION['mensagem2']['1']; 
                            }
                            ?>
                            <div class="alert alert-dismissible <?= $bs_class ?>">
                              <?= $message ?>
                              <input type="submit" onclick="submit($codigoPara)" name="submit" class="btn-close" data-bs-dismiss="alert">
                            </div>
                            <?php
                            if(isset($_SESSION['mensagem2'])){ ?>
                              <div class="alert alert-dismissible <?= $bs_class2 ?>">
                              <?= $message2 ?>
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php }
                            unset($_SESSION['mensagem']);
                            unset($_SESSION['mensagem2']);
                          }?>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </form>
            <?php $c++; } ?>
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
  function submit($codigoPara){
    include_once('back/configlocal.php');
    if($_POST('submit') != null ){
      $sql = $conexao->prepare("SELECT * FROM parceiros WHERE codigo_de = ? AND codigo_para = ? AND status = 0");
      $sql->bind_param("ss", $codDe, $codigoPara);
      $sql->execute();
      $get = $sql->get_result();
      $total = $get->num_rows;
  
      if($total > 0){
        $dados = $get->fetch_assoc();
  
        if($dados['codigo_para'] == $codigoPara){
          $sqlStatus = $conexao->prepare("UPDATE parceiros SET status = 1 WHERE id_de = ? AND id_para = ?");
          $sqlStatus->bind_param("ss", $id_de, $codigoPara);
          $sqlStatus->execute();
          if($sqlStatus->affected_rows > 0){
            header("Location: notificacoesParceiros.php");
          }else{
            echo "erro ao atualizar;";
          }
          
        }else{
          return false;
        }
      }
    }
  }
?>

</html>