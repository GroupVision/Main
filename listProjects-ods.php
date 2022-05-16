<?php
ob_start();
    require "back/validacao.php";
    include_once('back/configlocal.php');

    $logado = $_SESSION['nome'];
    $odsSelecionadas = null;
    $ods = null;
    
    if(isset($_GET['ods']) && isset($_GET['search'])){
      $ods = $_GET['ods'];
      $data = $_GET['search'];
      $odsStr = implode($ods);
      $queryBusca=mysqli_query($conexao, "SELECT projetos.nome, projetos.problema, projetos.status, projetos.descricao_projeto, projetos.imagem FROM projetos INNER JOIN ods_projetos ON ods_projetos.codigo_projeto = projetos.codigo WHERE ods_projetos.ods_tipo IN ($odsStr) AND (projetos.nome LIKE '%$data%' OR projetos.problema LIKE '%$data%')");
    } else if(isset($_GET['ods'])){
      $ods = $_GET['ods'];
      $odsStr = implode($ods);
      $queryBusca=mysqli_query($conexao, "SELECT projetos.nome, projetos.problema, projetos.status, projetos.descricao_projeto, projetos.imagem FROM projetos INNER JOIN ods_projetos ON ods_projetos.codigo_projeto = projetos.codigo WHERE ods_projetos.ods_tipo = $odsStr");
    } else if(isset($_GET['search'])){
      $data = $_GET['search'];
      $queryBusca=mysqli_query($conexao, "SELECT projetos.nome, projetos.problema, projetos.status, projetos.descricao_projeto, projetos.imagem FROM projetos WHERE projetos.nome LIKE '%$data%' OR projetos.problema LIKE '%$data%'");
    } else {
      $queryBusca=mysqli_query($conexao, "SELECT projetos.nome, projetos.problema, projetos.status, projetos.descricao_projeto, projetos.imagem FROM projetos");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Meus Projetos</title>
  <link rel="shortcut icon" href="image/Logo.svg" type="image/x-icon">
  <!-- Bootstrap , fonts & icons  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="fonts/icon-font/css/style.css">
  <link rel="stylesheet" href="fonts/typography-font/typo.css">
  <link rel="stylesheet" href="fonts/fontawesome-5/css/all.css">
  <link rel="stylesheet" href="css/cadProject.css">
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
  <div class="site-wrapper overflow-hidden ">
    <!-- Header start  -->
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
                <li class="nav-item dropdown active">
                  <a class="nav-link"  href="Projects-ods.html" role="button" aria-haspopup="true" aria-expanded="false">Projetos ODS </a>
                  
                </li>
                <li class="nav-item dropdown ">
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
                      <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="dashboard-settings.html">CONFIGURAÇÕES </a>
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
    <!-- navbar- -->
    <!-- Brand1Section Area -->
    <!-- category Area -->
    <!-- Category Area -->
    <br><br>
    <form method="post" action="">
    <div class="pt-11 pt-lg-26 pb-lg-10" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
      <div class="container">
        <!-- Section Top -->
        <ul>                        
          <li><input type="checkbox" id="cb1" name="ods[]" value="1" <?php if(isset($ods)){ if(in_array(1, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb1" ><img src="ODS/1.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb2" name="ods[]" value="2" <?php if(isset($ods)){ if(in_array(2, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb2" ><img src="ODS/2.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb3" name="ods[]" value="3" <?php if(isset($ods)){ if(in_array(3, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb3" ><img src="ODS/3.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb4" name="ods[]" value="4" <?php if(isset($ods)){ if(in_array(4, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb4" ><img src="ODS/4.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb5" name="ods[]" value="5" <?php if(isset($ods)){ if(in_array(5, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb5" ><img src="ODS/5.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb6" name="ods[]" value="6" <?php if(isset($ods)){ if(in_array(6, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb6" ><img src="ODS/6.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb7" name="ods[]" value="7" <?php if(isset($ods)){ if(in_array(7, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb7" ><img src="ODS/7.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb8" name="ods[]" value="8" <?php if(isset($ods)){ if(in_array(8, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb8" ><img src="ODS/8.png"  /></label>
          </li>                        </li>
          <li><input type="checkbox" id="cb9" name="ods[]" value="9" <?php if(isset($ods)){ if(in_array(9, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb9" ><img src="ODS/9.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb10" name="ods[]" value="10" <?php if(isset($ods)){ if(in_array(10, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb10" ><img src="ODS/10.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb11" name="ods[]" value="11" <?php if(isset($ods)){ if(in_array(11, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb11" ><img src="ODS/11.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb12" name="ods[]" value="12" <?php if(isset($ods)){ if(in_array(12, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb12" ><img src="ODS/12.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb13" name="ods[]" value="13" <?php if(isset($ods)){ if(in_array(13, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb13" ><img src="ODS/13.png"  /></label>
          </li>                        </li>
          <li><input type="checkbox" id="cb14" name="ods[]" value="14" <?php if(isset($ods)){ if(in_array(14, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb14" ><img src="ODS/14.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb15" name="ods[]" value="15" <?php if(isset($ods)){ if(in_array(15, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb15" ><img src="ODS/15.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb16" name="ods[]" value="16" <?php if(isset($ods)){ if(in_array(16, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb16" ><img src="ODS/16.png"  /></label>
          </li>
          <li><input type="checkbox" id="cb17" name="ods[]" value="17" <?php if(isset($ods)){ if(in_array(17, $ods)) echo 'checked="checked"'; } ?>/>
            <label for="cb17" ><img src="ODS/17.png"  /></label>
          </li>
          
        </ul>
<!-- Main Content Start -->
          <!-- Main Body -->
          <div class="col-12 col-xl-8 col-lg-8">
            <!-- form -->
            <!--Botão criar-->
            <div class="button-block">
              <input onclick="window.location.href = 'cadProjects.php'" class="btn btn-primary line-height-reset h15 btn-submit w-100 text-uppercase" value="Criar Projeto">
            </div>
            
              <div class="filter-search-form-2 search-1-adjustment bg-white rounded-sm shadow-7 pr-6 py-6 pl-6">
                <div class="filter-inputs">
                  <div class="form-group position-relative w-lg-45 w-xl-40 w-xxl-45">
                    <input class="form-control focus-reset pl-13" type="search" id="buscar" name="buscar" placeholder="Nome do Projeto">
                    <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6">
                    <i class="icon icon-zoom-2 text-primary font-weight-bold"></i>
                  </span>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary line-height-reset h15 btn-submit w-50 text-uppercase">Buscar</button>
                </div>
              </div>
            </form>
            <?php  while ($row = $queryBusca -> fetch_assoc()){ ?>
            <div class="pt-12">
              <div class="mb-8">
                <!--Listagem de ODS-->
                  <div class="pt-9 px-xl-9 px-lg-7 px-7 pb-7 light-mode-texts bg-white rounded hover-shadow-3 ">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="media align-items-center">
                        <!-- start div -->
                        
                        <div class="square-72 d-block mr-8">
                          <img style="width: 70px; right: 70px;" src="<?php echo $row['imagem']?>" alt="">
                        </div>
                        <div>
                          <h3 class='mb-0'><a class='font-size-6 heading-default-color'><?php echo $row['nome']?></a></h3>
                          <a href="#" class="font-size-3 text-default-color line-height-2"><?php echo $row['problema']?></a>

                  <div class="row pt-8">
                    <div class="col-md-7">
                      <ul class="d-flex list-unstyled mr-n3 flex-wrap">
                        <li>
                          <a class=" min-width-px-96 mr-3 text-center rounded-3 px-6 py-1 font-size-3 text-black-2 mt-2" ><?php echo $row['descricao_projeto']?></a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-5">
                      <ul class="d-flex list-unstyled mr-n3 flex-wrap mr-n8 justify-content-md-end">
                        <li class="mt-2 mr-8 font-size-small text-black-2 d-flex">
                          <span class="mr-4" style="margin-top:1; "></span> 
                            <img style="margin-top:1; width: 30px; right: 30px;" src="./image/done.png" alt="" echo=".$user_data['imgstatus']">
                          <span style="align-items: center; margin-left: 4px; margin-top: 4px;" class="font-weight-semibold"><?php echo $row['status']?></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div> 
                </div>              
            </div>
          </div>
        </div>
      </div>
    </div>
                <?php } ?>
                <!--fechando lista -->




    <!-- Main Content end -->



   <!-- Brand1Section Area -->
    <!-- category Area -->


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
  
</body>



<?php 
  if(isset($_POST['submit'])){
    $nome = $_POST['buscar'];
    $odsSelecionadas = $_POST['ods'];
    $queryOds = null;
    for($i = 0 ; $i < count($odsSelecionadas) ; $i++){
      if(!empty($odsSelecionadas[$i])){
        $queryOds .= "&ods[]=".$odsSelecionadas[$i];
      }
    }
    header("location: listProjects-ods.php?".$queryOds."&search=".$nome, true, 303);
    ob_end_flush();
  } ?>
  <!-- Activation Script -->
  <!-- <script src="js/drag-n-drop.js"></script> -->
  <script src="js/custom.js"></script>
</html>