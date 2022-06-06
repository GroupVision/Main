<?php
    require "back/validacao.php";
    include_once('back/configlocal.php');

    $logado = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Projetos ODS</title>
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
                <li class="nav-item dropdown active">
                  <a class="nav-link"  href="Projects-ods.php" role="button" aria-haspopup="true" aria-expanded="false">• Projetos ODS </a>
                  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="myprojects.php" role="button" aria-haspopup="true" aria-expanded="false">Meus Projetos</a>
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
    <div class="pt-11 pt-lg-26 pb-lg-16" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
      <div class="container">
        <!-- Section Top -->
        <div class="row align-items-center pb-14">
          <!-- Section Title -->
          <div class="col-12 col-lg-6">
            <div class="text-center text-lg-left mb-13 mb-lg-0">
              <li class="brand-logo" >
                <a href="./index.html">
                  <!-- light version logo (logo must be black)-->
                 
                </a>
              </li>
              <img src="image/Novo Projeto (2).png" class="bricon font-size-4 font-weight-bold pr-10">PROJETOS ODS</p>
              <h2 class="font-size-4 ">Confira os projetos de cada <b>Objetivo de desenvolvimento sustentável</b></h2>
              
            </div>
          </div>
          <!-- Section Button -->
          <div class="col-12 col-lg-6">
            <div class="text-center text-lg-right">
            </div>
          </div>
          <!-- Section Button End -->
        </div>
        <!-- End Section Top -->
        <div class="row justify-content-center">
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=1" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods1">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods1.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->
                  <!-- Single Category -->
                  <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                    <a href="listprojects-ods.php?ods[]=2" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods2">
                      <div class=" ">
                        <img style="width: 100%; right: 150%;" src="ODS/ods2.jpg"></i>
                      </div>
                      <!-- Category Content -->
                      <div class="">
                      </div>
                    </a>
                  </div>
                  <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=3" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods3">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods3.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=4" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods4">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods4.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->
                              <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=5" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods5">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods5.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=6" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods6">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods6.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->
                              <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=7" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods7">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods7.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=8" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods8">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods8.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->
                              <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=9" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods9">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods9.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=10" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods10">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods10.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->  

                              <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=11" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods11">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods11.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=12" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods12">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods12.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->
                              <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=13" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods13">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods13.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=14" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods14">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods14.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->
                              <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=15" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods15">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods15.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->
                    <!-- Single Category -->
                    <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
                      <a href="listprojects-ods.php?ods[]=16" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods16">
                        <div class=" ">
                          <img style="width: 100%; right: 150%;" src="ODS/ods16.jpg"></i>
                        </div>
                        <!-- Category Content -->
                        <div class="">
                        </div>
                      </a>
                    </div>
                    <!-- End Single Category -->
                              <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="listprojects-ods.php?ods[]=17" class=" border border-color-2 rounded-4 pl- pt-7 pb-7 pr- mb-9 d-block w-100 corods17">
              <div class=" ">
                <img style="width: 100%; right: 150%;" src="ODS/ods17.jpg"></i>
              </div>
              <!-- Category Content -->
              <div class="">
              </div>
            </a>
          </div>
          <!-- End Single Category -->

          <!-- End Section Top -->
        
    <!-- End Category Area -->



    </div>

   <!-- Brand1Section Area -->
    <!-- category Area -->

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
                <a class="mb-0 font-size-4 font-weight-bold" href="https://github.com/GroupVision/ODS-PARA-TODOS">GroupVision</a>
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
</html>