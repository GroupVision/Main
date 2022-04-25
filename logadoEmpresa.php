<?php
    session_start();
    include_once('back/configlocal.php');
    // print_r($_SESSION);
    if(isset($_POST['loginEmpresa']) && (!isset($_SESSION['emailEmpresaLogin']) == true) and (!isset($_SESSION['senhaEmpresaLogin']) == true))
    {
        unset($_SESSION['emailEmpresaLogin']);
        unset($_SESSION['senhaEmpresaLogin']);
        header('Location: index.php');
    }
    $logado = $_SESSION['emailEmpresaLogin'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ODS PARA TODOS</title>
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
              <img src="image/Novo Projeto (2).png" alt="" class="light-version-logo default-logo">
              <!-- Dark version logo (logo must be White)-->
              <img src="image/Novo Projeto (2).png" alt="" class="dark-version-logo">
            </a>
          </div>
          
          <div class="collapse navbar-collapse" id="mobile-menu">
            <div class="navbar-nav-wrapper">
              <ul class="navbar-nav main-menu">
                
                  <a class="nav-link" href="#">Support</a>
                </li>
              </ul>
            </div>
            <button class="d-block d-lg-none offcanvas-btn-close focus-reset" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true" aria-label="Toggle navigation">
              <i class="gr-cross-icon"></i>
            </button>
          </div>
          <div class="header-btns header-btn-devider ml-auto pr-2 ml-lg-6 d-none d-xs-flex">
            
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

    <!-- Header start end -->
    <!-- Hero Area -->
    <div class="bg-gradient-1 pt-26 pt-md-32 pt-lg-33 pt-xl-35 position-relative z-index-1 overflow-hidden">
      <!-- .Hero pattern -->
      <div class="pos-abs-tr w-50 z-index-n2">
        <!-- cta-content start -->

        <!-- cta-content end -->
      </div>
      <div class="col-xl-5 col-lg-12" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
        <!-- cta-btns start -->
        <div class="btns d-flex justify-content-xl-end justify-content- align-items-xl-center flex-wrap h-100  mx-n4">
          <img src="Logo.svg" alt="" class="w-100 rounded-4" />
          <h1 class="text-black-2 font-size-8 mb-4">   Objetivos de Desenvolvimento Sustentável</h1>
          <?php
            echo "<h1>Bem vindo(a) <u>$logado</u></h1>";
          ?>
          <p class="text-hit-gray font-size-5 mb-0">   Projeto fabrica de projetos V - Facens</p>
        
        </div>
        <!-- cta-btns end -->
      </div>
      <br>
    </div>

    <div class="pt-11 pt-lg-27 pb-7 pb-lg-26 bg-black-2 dark-mode-texts">
      <div class="container">
        <!-- Section Top -->
        <div class="row align-items-center pb-14">
          <!-- Section Title -->

          <!-- Section Button -->

          <!-- Section Button End -->
        </div>
        <!-- End Section Top -->
        <div class="row justify-content-center">
          <div class="col-12 col-lg-4 col-md-6 px-xxl-7" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
            <!-- Start Feature One -->
            <div class="bg-white px-8 pt-9 pb-7 rounded-4 mb-9 feature-cardOne-adjustments">
              <div class="d-block mb-7">
                <a href="#"><img src="./image/l1/png/linha-test.png" alt=""></a>
              </div>
              <a href="#" class="font-size-3 d-block mb-0 text-gray">Google inc.</a>
              <h2 class="mt-n4"><a class="font-size-7 text-black-2 font-weight-bold mb-4" href="">Água, Semente da Vida</a></h2>
              <ul class="list-unstyled mb-1 card-tag-list">
                <li><a href="" class="bg-regent-opacity-15 text-denim font-size-3 rounded-3">
                    <i class="icon icon-pin-3 mr-2 font-weight-bold"></i> Rio Grande do Norte
                  </a></li>

                <li><a href="" class="bg-regent-opacity-15 text-eastern font-size-3 rounded-3">
                    <i class="fa fa-dollar-sign mr-2 font-weight-bold"></i> 100.000 Reais
                  </a></li>
              </ul>
              <p class="mb-7 font-size-4 text-gray">Água, Semente da Vida é o nome de uma solução que visa ao tratamento e reuso de águas cinzas em quintais agroecológicos de famílias agricultoras do Alto Oeste Potiguar, nos municípios de Encanto e São Miguel, na região do semiárido do Rio Grande do Norte. Tem a participação de 21 famílias agricultoras e adota a filosofia do reutilizar para produzir.</p>
              <div class="card-btn-group">

              </div>
            </div>
            <!-- End Feature One -->
          </div>
          <div class="col-12 col-lg-4 col-md-6 px-xxl-7" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
            <!-- Start Feature One -->
            <div class="bg-white px-8 pt-9 pb-7 rounded-4 mb-9 feature-cardOne-adjustments">
              <div class="d-block mb-7">
                <a href="#"><img src="./image/l1/png/linha-test.png" alt=""></a>
              </div>
              <a href="#" class="font-size-3 d-block mb-0 text-gray">Google .inc</a>
              <h2 class="mt-n4"><a class="font-size-7 text-black-2 font-weight-bold mb-4" href="">Protege BR</a></h2>
              <ul class="list-unstyled mb-1 card-tag-list">
                <li><a href="" class="bg-regent-opacity-15 text-denim font-size-3 rounded-3">
                    <i class="icon icon-pin-3 mr-2 font-weight-bold"></i> São Paulo
                  </a></li>
                <li><a href="" class="bg-regent-opacity-15 text-orange font-size-3 rounded-3">
                    <i class="fa fa-briefcase mr-2 font-weight-bold"></i> + de 100 Ajudantes
                  </a></li>
              </ul>
              <p class="mb-7 font-size-4 text-gray">Protege BR tem como sede São Paulo, mas abrange todo o país. A plataforma conecta as necessidades dos polos de saúde pública e seus profissionais com os fabricantes de produtos e tecnologias locais, para que dessa troca surjam soluções que resolvam problemas nas unidades. Recentemente trabalhou para aumentar o número de profissionais de saúde usando equipamentos de proteção individual durante a pandemia da Covid-19, nas áreas distantes dos grandes centros no Brasil, para reduzir o grande número de trabalhadores afastados por contágio.

              </p>
              <div class="card-btn-group">

              </div>
            </div>
            <!-- End Feature One -->
          </div>
          <div class="col-12 col-lg-4 col-md-6 px-xxl-7" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
            <!-- Start Feature One -->
            <div class="bg-white px-8 pt-9 pb-7 rounded-4 mb-9 feature-cardOne-adjustments">
              <div class="d-block mb-7">
                <a href="#"><img src="./image/l1/png/linha-test.png" alt=""></a>
              </div>
              <a href="#" class="font-size-3 d-block mb-0 text-gray">Google .inc</a>
              <h2 class="mt-n4"><a class="font-size-7 text-black-2 font-weight-bold mb-4" href="">Formigas de Embaúba</a></h2>
              <ul class="list-unstyled mb-1 card-tag-list">
                <li><a href="" class="bg-regent-opacity-15 text-denim font-size-3 rounded-3">
                    <i class="icon icon-pin-3 mr-2 font-weight-bold"></i> São Paulo
                  </a></li>
                <li><a href="" class="bg-regent-opacity-15 text-eastern font-size-3 rounded-3">
                    <i class="fa fa-dollar-sign mr-2 font-weight-bold"></i> +100.000 Reais
                  </a></li>
              </ul>
              <p class="mb-7 font-size-4 text-gray">Formigas de Embaúba, da Zona Sul de São Paulo, promove educação ambiental a partir do plantio de bosques de mata atlântica nas escolas públicas da grande São Paulo, feito pelo alunos. Objetivo é formar crianças e jovens críticos, conscientes socioambientalmente e capazes de agir para gerar impacto positivo no meio ambiente.</p>
              <div class="card-btn-group">

              </div>
            </div>
            <!-- End Feature One -->
          </div>
          <div class="col-12 col-lg-4 col-md-6 px-xxl-7" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
            
          </div>
          <div class="col-12 col-lg-4 col-md-6 px-xxl-7" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
            
          </div>
          <div class="col-12 col-lg-4 col-md-6 px-xxl-7" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
            
          </div>
        </div>
      </div>
    </div>
    <!-- featuredJobOne Area -->
    <!-- ContentTwo Area -->
    <!-- content-2 section -->
    <section class="py-13 py-lg-30">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-5 col-md-10 col-sm-11" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
            <div class="position-relative pr-lg-20 pr-md-15 pr-9">
              <!-- content img start -->
              <img src="Logo.svg" alt="" class="w-100 rounded-4" />
              <!-- content img end -->
              <!-- abs-content start -->
              
              <!-- abs-content end -->
            </div>
          </div>
          <div class="col-lg-6 col-md-9 col-xs-10" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
            <!-- content-2 start -->
            <div class="content-2 pl-lg-10 pl-0 d-flex flex-column justify-content-center h-100 pt-lg-0 pt-11 pr-md-13 pr-xl-15 pr-xxl-25 pr-0">
              <!-- content-2 section title start -->
              <p class="text-dodger font-size-4 font-weight-semibold mb-8">
                Publicado em 17/07/2020 por michelinebatista 2 Comentários
              </p>
              <h2 class="font-size-9 mb-8">
                CONHEÇA OS 10 PROJETOS CONSIDERADOS AS SOLUÇÕES MAIS INOVADORAS DE 2020 PARA O DESENVOLVIMENTO SUSTENTÁVEL NO BRASIL 
              </h2>
              <p class="text-default-color font-size-5 mb-12">
                Grupo de Trabalho da Sociedade Civil para a Agenda 2030 (GT Agenda 2030) e o Instituto Democracia e Sustentabilidade (IDS), em parceria com a Agência São Paulo de Desenvolvimento (ADE Sampa), divulgam a lista dos 10 projetos brasileiros considerados as soluções mais inovadoras de 2020 e que contribuem para a produção de importante impacto socioambiental positivo no país. As ideias foram selecionadas a partir de uma chamada pública que recebeu cerca de 100 inscrições e permaneceu aberta entre os dias 4 de maio e 4 de junho. As soluções escolhidas serão apresentadas no II Seminário Soluções Inovadoras, que acontece dia 6 de agosto, e representam as cinco regiões do país.
              </p>
              <!-- content-2 section title end -->
             
            </div>
            <!-- content-2 end -->
          </div>
        </div>
      </div>
    </section>
    <!-- ContentTwo Area -->


    <!-- footer area function start -->
    <!-- cta section -->
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
            <!-- footer logo start -->
            <img src="image/Novo Projeto (2).png" alt="" class="footer-logo mb-14">
            <!-- footer logo End -->
            <!-- media start -->
            <div class="media mb-11">
              <img src="image/l1/png/message.png" class="align-self-center mr-3" alt="">
              <div class="media-body pl-5">
                <p class="mb-0 font-size-4 text-white">Contato</p>
                <a class="mb-0 font-size-4 font-weight-bold" href="mailto:viinymafra@gmail.com">viinymafra@gmail.com</a>
              </div>
            </div>
            <!-- media start -->
            <!-- widget social icon start -->
            <div class="social-icons">
              <ul class="pl-0 list-unstyled d-flex align-items-end ">
                <li class="d-flex flex-column justify-content-center px-3 mr-3 font-size-4 heading-default-color">Follow us on:</li>
                <li class="d-flex flex-column justify-content-center px-3 mr-3"><a href="#" class="hover-color-primary heading-default-color"><i class="fab fa-facebook-f font-size-3 pt-2"></i></a></li>
                <li class="d-flex flex-column justify-content-center px-3 mr-3"><a href="#" class="hover-color-primary heading-default-color"><i class="fab fa-twitter font-size-3 pt-2"></i></a></li>
                <li class="d-flex flex-column justify-content-center px-3 mr-3"><a href="#" class="hover-color-primary heading-default-color"><i class="fab fa-linkedin-in font-size-3 pt-2"></i></a></li>
              </ul>
            </div>
            <!-- widget social icon end -->
          </div>

            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer area function end -->
  
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