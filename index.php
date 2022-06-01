<?php
  ob_start();
  session_start();

  if(isset($_SESSION["codigo"]) || isset($_SESSION["nome"])){
    header("Location: projects-ods.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ODS PARA TODOS </title>
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
                
                  <a class="nav-link" href="#">SUPORTE VISION</a>
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
    
    <!-- Login Modal -->
    <div class="modal fade form-modal" id="login" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog max-width-px-840 position-relative">
        <button type="button" class="circle-32 btn-reset bg-black-2 pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper" data-dismiss="modal"><i class="fas fa-times"></i></button>
        <div class="login-modal-main bg-white rounded-8 overflow-hidden">
          <div class="row no-gutters">
            <div class="col-lg-5 col-md-6">
              <div class="pt-10 pb-6 pl-11 pr-12 bg-gradient-1 h-100 d-flex flex-column dark-mode-texts">
                <div class="pb-9">
                  <h3 class="font-size-8 text-black-2 line-height-reset pb-4 line-height-1p4">
                  Bem vindo de volta
                  </h3>
                  <p class="mb-0 font-size-4 text-black-2">Faça login para continuar sua conta</p>
                </div>
                <div class="border-top border-default-color-2 mt-auto">
                  <div class="d-flex mx-n9 pt-6 flex-xs-row flex-column">
                    <div class="pt-5 px-9">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-6">
              <div class="bg-white-2 h-100 px-11 pt-11 pb-7">
                <div class="row">

                </div>
                <div class="or-devider">
                  <span class="font-size-3 line-height-reset ">LOGIN</span>
                </div>
                <form action="back/loginPessoa.php" method="POST">
                  <div class="form-group" >
                    <label for="email" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">E-mail</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="password" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Senha</label>
                    <div class="position-relative">
                      <input type="password" class="form-control" id="password" placeholder="Inserir senha" name="senha">
                      <a href="#" class="show-password pos-abs-cr fas mr-6 text-black-2" data-show-pass="password"></a>
                    </div>
                  </div>
                  <div class="form-group d-flex flex-wrap justify-content-between">
                    <label for="terms-check" class="gr-check-input d-flex  mr-3">
                      <input class="d-none" type="checkbox" id="terms-check">
                      <span class="checkbox mr-5"></span>
                      <span class="font-size-3 mb-0 line-height-reset mb-1 d-block">Lembrar senha</span>
                    </label>
                    
                  </div>
                  <div class="form-group mb-8">
                    <input class="btn btn-green btn-medium w-100 rounded-5 text-uppercase" type="submit" name="login" value="Enviar">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



<!-- Sign Up1 Modal -->
<div class="modal fade form-modal" id="signup1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog max-width-px-840 position-relative">
    <button type="button" class="circle-32 btn-reset bg-black-2 pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper" data-dismiss="modal"><i class="fas fa-times"></i></button>
    <div class="login-modal-main bg-white rounded-8 overflow-hidden">
      <div class="row no-gutters">
        <div class="col-lg-5 col-md-6">
          <div class="pt-10 pb-6 pl-11 pr-12 bg-bg-white-2 h-100 d-flex flex-column dark-mode-texts">
            <div class="pb-2">
              <h3 class="font-size-8 text-black-2 line-height-reset pb-4 line-height-1p4">
                Crie uma conta gratuita hoje
              </h3>
              <p class="mb-0 font-size-4 text-black-2">
                Crie sua conta para continuar e explorar projetos de Objetivos de Desenvolvimento Sustentável.</p>
            </div>
            <div class="border-top border-default-color-2 mt-auto">
              <div class="d-flex mx-n9 pt-6 flex-xs-row flex-column">

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-6">
          <div class="bg-white-2 h-100 px-11 pt-11 pb-7">
            
            <div class="or-devider">
              <span class="font-size-3 line-height-reset">ESCOLHA O TIPO DE USUARIO</span>
            </div>
            <form action="/">
              
              <div class="form-group d-flex flex-wrap justify-content-between mb-1">
                <label for="terms-check2" class="gr-check-input d-flex  mr-3"></label>
              </div>
              <div class="form-group mb-8">
              <center>
                <img class="img-cadastro" src="Empresa.jpg" alt=""><br>
              </center>
                <a class="btn btn-gray-home btn-h-60 btn-xl mx-4 mt-6 text-uppercase" href="#" data-toggle="modal" data-target="#signup-emp">Cadastre-se como empresa</a><br>
                <center>
                <img class="img-cadastro"  src="Pessoas.jpg" alt=""><br>
              </center>
                <a class="btn btn-gray-home btn-h-60 btn-xl mx-4 mt-6 text-uppercase" href="#" data-toggle="modal" data-target="#signup-user">Cadastre-se como pessoa</a><br>

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Sing up 1 -->


<!-- Sign Up empresa Modal -->
<div class="modal fade form-modal" id="signup-emp" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog max-width-px-840 position-relative">
    <button type="button" class="circle-32 btn-reset bg-black-2 pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper" data-dismiss="modal"><i class="fas fa-times"></i></button>
    <div class="login-modal-main bg-white rounded-8 overflow-hidden">
      <div class="row no-gutters">
        <div class="col-lg-5 col-md-6">
          <div class="pt-10 pb-6 pl-11 pr-12 bg-bg-white-2 h-100 d-flex flex-column dark-mode-texts">
            <div class="pb-2">
              <h3 class="font-size-8 text-black-2 line-height-reset pb-4 line-height-1p4">
                Cadastre-se como empresa
              </h3>
              <p class="mb-0 font-size-4 text-black-2">
                Cadastre-se como empresa.</p>
            </div>
            <div class="border-top border-default-color-2 mt-auto">
              <div class="d-flex mx-n9 pt-6 flex-xs-row flex-column">

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-6">
          <div class="bg-white-2 h-100 px-11 pt-11 pb-7">
            
            <div class="or-devider">
              <span class="font-size-3 line-height-reset">CADASTRO EMPRESARIAL</span>
            </div>
            <form enctype="multipart/form-data" action="back/cadastroPessoa.php" method="POST">

              <div>
                <label for="fileUpload" class="mb-0 font-size-4 text-smoke">Navege ou Arraste e Solte</label>
                <input type="file" name="imagem">
              </div><br>

              <div class="form-group">
                <label for="nome-empresa" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Nome da Empresa</label><label class="text-red">ㅤ*</label>
                <input type="nome-empresa" class="form-control" placeholder="Nome da empresa" id="inp-empresa" name="nome">
              </div>
              <div class="form-group">
                <label for="cnpj-empresa" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">CNPJ</label><label class="text-red">ㅤ*</label>
                <input type="cnpj-empresa" class="form-control" placeholder="CNPJ da empresa" id="inp-empresa" name="cpf" minlength="14" maxlength="14">
              </div>              
              <div class="form-group">
                <label for="tell-empresa" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Telefone</label><label class="text-red">ㅤ*</label>
                <input type="tel" class="form-control" placeholder="Telefone da empresa" id="inp-empresa" name="tel">
              </div>

              <div class="form-group">
                <label for="email2" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">E-mail</label><label class="text-red">ㅤ*</label>
                <input type="email" class="form-control" placeholder="Email Comercial" id="email2" name="email">
              </div>
              <div class="form-group">
                <label for="password2" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Senha</label><label class="text-red">ㅤ*</label>
                <div class="position-relative">
                  <input type="password" class="form-control" id="password2" placeholder="Inserir password" name="senha">
                  <a href="#" class="show-password pos-abs-cr fas mr-6 text-black-2" data-show-pass="password2"></a>
                </div>
              </div>
              <div class="form-group">
                
                <div class="position-relative">

                </div>
              </div>
              <div class="form-group d-flex flex-wrap justify-content-between mb-1">
                <label for="terms-check2" class="gr-check-input d-flex  mr-3">
                  <input class="d-none" type="checkbox" id="terms-check2">
                  <span class="checkbox mr-5"></span>
                  <span class="font-size-3 mb-0 line-height-reset d-block">Concordo com o <a href="" class="text-black-2">termos & Condições</a></span>
                </label>
              </div>
              <div class="form-group mb-8">
                <input class="btn btn-gray-home btn-medium w-100 rounded-5 text-uppercase"  type="submit" name="cadastrar" value="CADASTRAR">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Header start end -->



    <!-- Sign Up user Modal -->
    <div class="modal fade form-modal" id="signup-user" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog max-width-px-840 position-relative">
        <button type="button" class="circle-32 btn-reset bg-black-2 pos-abs-tr mt-md-n6 mr-lg-n6 focus-reset z-index-supper" data-dismiss="modal"><i class="fas fa-times"></i></button>
        <div class="login-modal-main bg-white rounded-8 overflow-hidden">
          <div class="row no-gutters">
            <div class="col-lg-5 col-md-6">
              <div class="pt-10 pb-6 pl-11 pr-12 bg-bg-white-2 h-100 d-flex flex-column dark-mode-texts">
                <div class="pb-2">
                  <h3 class="font-size-8 text-black-2 line-height-reset pb-4 line-height-1p4">
                    Cadastre-se como pessoa
                  </h3>
                  <p class="mb-0 font-size-4 text-black-2">
                    Cadastre-se como pessoa.</p>
                </div>
                <div class="border-top border-default-color-2 mt-auto">
                  <div class="d-flex mx-n9 pt-6 flex-xs-row flex-column">
    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-6">
              <div class="bg-white-2 h-100 px-11 pt-11 pb-7">
                
                <div class="or-devider">
                  <span class="font-size-3 line-height-reset">CADASTRO PESSOAL</span>
                </div>

                <form enctype="multipart/form-data" action="back/cadastroPessoa.php" method="POST">

                  <div align="center">
                    <label>Selecione sua imagem de perfil</label>
                    <input type="file" name="imagem">
                  </div><br>

                  <div class="form-group">
                    <label for="nome-user" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Nome Completo</label><label class="text-red">ㅤ*</label>
                    <input type="nome-empresa" class="form-control" placeholder="Nome da pessoa" id="inp-user" name="nome">
                  </div>
                  <div class="form-group">
                    <label for="cnpj-user" class="font-size-4 text-black-2 font-weight-semibold line-height-reset" >CPF</label><label class="text-red">ㅤ*</label>
                    <input type="cnpj-empresa" class="form-control" placeholder="CPF" id="inp-user" name="cpf" minlength="11" maxlength="11">
                  </div>              
                  <div class="form-group">
                    <label for="tell-user" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Telefone</label><label class="text-red">ㅤ*</label>
                    <input type="tel" class="form-control" placeholder="Telefone " id="inp-user" name="tel">
                  </div>
    
                  <div class="form-group">
                    <label for="email2" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">E-mail</label><label class="text-red">ㅤ*</label>
                    <input type="email" class="form-control" placeholder="Email" id="email2" name="email">
                  </div>
                  <div class="form-group">
                    <label for="password2" class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Senha</label><label class="text-red">ㅤ*</label>
                    <div class="position-relative">
                      <input type="password" class="form-control" id="password2" placeholder="Inserir password" name="senha">
                      <a href="#" class="show-password pos-abs-cr fas mr-6 text-black-2" data-show-pass="password2"></a>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="position-relative">
    
                    </div>
                  </div>
                  <div class="form-group d-flex flex-wrap justify-content-between mb-1">
                    <label for="terms-check2" class="gr-check-input d-flex  mr-3">
                      <input class="d-none" type="checkbox" id="terms-check2">
                      <span class="checkbox mr-5"></span>
                      <span class="font-size-3 mb-0 line-height-reset d-block">Concordo com o <a href="" class="text-black-2">termos & Condições</a></span>
                    </label>
                  </div>
                  <div class="form-group mb-8">
                    <input class="btn btn-gray-home btn-medium w-100 rounded-5 text-uppercase" type="submit" name="cadastrar" value="CADASTRAR">
                  </div>    
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header start end -->

        <!-- Hero Area -->
        <div class="position-relative z-index-1 bg-squeeze pt-26 dark-mode-texts">
          <div class="pos-abs-tr h-100">
            <img src="./image/patterns/globe-pattern.png" alt="" class="h-100">
          </div>
          <div class="container position-static">
            <div class="row position-relative align-items-center position-static">
              <div class="col-xxl-7 col-xl-8 col-lg-9 pt-lg-23 pb-lg-33 pb-md-28 pb-xs-26 pb-29 pt-md-20" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                <div class="row">
                  <div class="col-xxl-8 col-xl-7 col-md-8 col-sm-10">
                    <div class="text-primary font-size-5 font-weight-semibold mb-7">
                      <a class="mb-0 font-size-4 font-weight-bold" href="https://github.com/GroupVision/ODS-PARA-TODOS">GroupVision</a>
                    </div>
                    <h1 class="font-size-11 mb-9 text-black-2">Objetivos de Desenvolvimento Sustentável</h1>
                    <p class="font-size-5">Projeto fabrica de projetos V - Facens</p>
                  </div>
                </div>
              </div>
              <!-- Hero Form -->
              <div class="col-lg-11 col-12 translateY-50 pos-abs-bl">
                <form action="/" class="search-form" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
                    <center>
                      <?php
                            if(isset($_SESSION['mensagem'])){
                              $message = $_SESSION['mensagem']['0'];
                              $bs_class=$_SESSION['mensagem']['1']; 
                              ?>
                              <div class="alert alert-dismissible <?= $bs_class ?>">
                                <?= $message ?>
                                <butto type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              </div>
                              <?php
                              unset($_SESSION['mensagem']);
                            }
                      ?>
                      <br>
                      <a class="btn btn-gray-home btn-h-60 text-uppercase" href="#" data-toggle="modal" data-target="#login">ENTRAR</a><br>
                      <a class="btn btn-gray-home btn-h-60 text-uppercase" href="#" data-toggle="modal" data-target="#signup1">REGISTRAR</a>
          
          </center>
                   
                </form>
              </div>
              <!-- End Hero Form -->
            </div>
          </div>
        </div>
        <div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          </div>
        <!-- Hero Area -->
    <!-- Header start end -->
    <!-- Hero Area -->



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
                <p class="mb-0 font-size-4 text-white">Contato </p>
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
    <!-- cta section -->

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