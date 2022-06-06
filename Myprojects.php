<?php
    require "back/validacao.php";
    include_once('back/configlocal.php');
  
    $logado = $_SESSION['nome'];
    $codUser = $_SESSION['codigo'];

    $queryBusca=mysqli_query($conexao, "SELECT *, projetos.nome AS nomeProjeto, imagens_pessoa.path AS imagemUser FROM projetos, imagens_pessoa WHERE cod_usuario = $codUser AND cod_pessoa = $codUser");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Meus Projetos</title>
  <link rel="shortcut icon" href="image/Logo.svg" type="image/x-icon">
  <!-- Bootstrap , fonts & icons  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="fonts/icon-font/css/style.css">
  <link rel="stylesheet" href="fonts/typography-font/typo.css">
  <link rel="stylesheet" href="fonts/fontawesome-5/css/all.css">
  <!-- Plugin'stylesheets  -->
  
  <link rel="stylesheet" href="css/projectsods.css">
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
                      <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="candidate-profile-main.html"> </a>
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
    <div class="pt-11 pt-lg-26 pb-lg-10" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
      <div class="container">
        <!-- Section Top -->
        
<!-- Main Content Start -->

          <!--<img src="image/Novo Projeto (2).png" class="bricon font-size-4 font-weight-bold pr-10">Projetos ODS > Erradicação da pobreza <b>> Informações</b></p>-->
          <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold"><b>Projetos Criados</b></h4>
           
        <div class="row">
        <?php while ($row = $queryBusca -> fetch_assoc()){ ?>  
          <!-- Left Sidebar Start -->
          <div class="col-12 col-xxl-3 col-lg-4 col-md-5 mb-11 mb-lg-0">
            <div class="pl-lg-5">
              <!-- Top Start -->
              <div class="bg-white shadow-9 rounded-4">
                <div class="px-5 py-11 text-center border-bottom border-mercury">
                  <a class="mb-4" href="#"><img class="circle-54" src="<?php echo $row['imagemUser'] ?>" alt=""></a>
                  <h4 class="mb-0"><a class="text-black-2 font-size-6 font-weight-semibold" href="#"><?php echo $logado ?></a></h4>

                </div>
              </div>
            </div>
          </div>
          <!-- Left Sidebar End -->
          <!-- Middle Content -->
          <div class="col-12 col-xxl-6 col-lg-8 col-md-7 order-2 order-xl-1">
            <div class="bg-white rounded-4 shadow-9">
              <!-- Tab Section Start -->
                          
              <?php $cod_usuario = $row['cod_usuario']; $codigo = $row['codigo']; ?>
              <div onclick= "window.location.href = 'projectInfo.php?projeto=<?php echo $codigo?>&user=<?php echo $cod_usuario ?>'" class='pt-12'>
              
              <div class="mb-8">
                <!--Listagem de ODS-->
                  <div class="pt-9 px-xl-9 px-lg-7 px-7 pb-7 light-mode-texts bg-white rounded hover-shadow-3 ">
                  <div class="row">
                  
                    <div class="col-md-9">
                      <div class="media align-items-center">
                        <!-- start div -->
                        
                        <div class="square-72 d-block mr-8">
                          <img style="width: 70px; right: 70px;" src="<?php echo $row['imagem']?>" alt="">
                        </div>
                        <div>
                          <h3 class='mb-0'><a class='font-size-6 heading-default-color'><?php echo $row['nomeProjeto']?></a></h3>
                          <div class="col-md-10 font-size-3 text-default-color line-height-2" style="word-wrap: break-word;">
                            <?php echo $row['problema']?>
                          </div>
                            <div class="col-md-12">
                              <div class="min-width-px-273 mr-3 rounded-3 px-6 py-1 font-size-3 text-black-2 mt-2" style="word-wrap: break-word;">
                                <?php echo $row['descricao_projeto']?>
                              </div>
                          </div>
                      </div> 
                      </div>              
                  </div>
                  <div class="col-md-3" style="float: right;">
                    <ul class="d-flex list-unstyled mr-n3 flex-wrap mr-n8 justify-content-md-right" >
                      <li class="mt-2 mr-8 font-size-small text-black-2 d-flex">
                        <span class="mr-4" style="margin-top:1; "></span> 
                          <?php if($row['status'] == "Andamento")  echo "<img style='margin-top:1; width: 30px; right: 30px;' src='./image/in_progress.png'"; else if($row['status'] == "Concluido") echo "<img style='margin-top:1; width: 30px; right: 30px;' src='./image/done.png'"; else if($row['status'] == "Em criacao") echo "<img style='margin-top:1; width: 30px; right: 30px;' src='./image/in_creation.png'";?>
                        <span style="align-items: center; margin-left: 4px; margin-top: 4px;" class="font-weight-semibold"><b><?php echo $row['status']?></b></span>
                        </div>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
          </div>

                <?php pular: } ?>
              
          </div>
              </div>
            </div>
            <!-- form end -->
          </div>
        </div>
      </div>
    </div>
    <!-- Main Content end -->

 <!-- footer logo start -->
 <footer class="footer bg-ebony-clay dark-mode-texts">
      <div class="container">
        <!-- Cta section -->
        <div class="pt-11 pt-lg-20 pb-13 pb-lg-20 border-bottom border-width-1 border-default-color-2">
          <div class="row justify-content-center ">
            <div class="col-xl-7 col-lg-12" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
              <!-- cta-content start -->
              <div class="pb-xl-0 pb-9 text-xl-left text-center">
                <h2 class="text-white font-size-8 mb-4"> Objetivos de Desenvolvimento Sustentável</h2>
                <p class="text-hit-gray font-size-5 mb-0"> Objetivos de Desenvolvimento Sustentável - Facens</p>

                <br>
              </div>
              <!-- cta-content end -->
            </div>
            <div class="col-xl-5 col-lg-12" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
              <!-- cta-btns start -->
              <div class="btns d-flex justify-content-xl-end justify-content-center align-items-xl-center flex-wrap h-100  mx-n4">

            </div>
          </div>
        </div>
      </div>
      <div class="container  pt-12 pt-lg-19 pb-10 pb-lg-19">
        <div class="row">
          <div class="col-lg-4 col-sm-6 mb-lg-0 mb-9"> 
           

            <!-- footer logo End -->
            <!-- media start -->
            <div class="media mb-11">
              <img src="image/l1/png/message.png" class="align-self-center mr-3" alt="">
              <div class="media-body pl-5">
                <p class="mb-0 font-size-4 text-white">Contato</p>
                <a class="mb-0 font-size-4 font-weight-bold" href="https://github.com/GroupVision/ODS-PARA-TODOS">GroupVision - Facens</a>
              </div>
            </div>
            <!-- media start -->
            <!-- widget social icon start -->

            <!-- widget social icon end -->
          </div>

            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- footer area function start -->
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

</html>