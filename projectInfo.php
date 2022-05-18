<?php
    require "back/validacao.php";
    include_once('back/configlocal.php');
  
    $logado = $_SESSION['nome'];
    $arrayOds = null;
    $arrayLinks = null;
    $arrayArquivos = null;
    $arrayCol = null;
  
    if(isset($_GET['projeto']) && isset($_GET['user'])){
      $projetoCodigo = $_GET['projeto'];
      $userCodigo = $_GET['user'];
      $queryBusca=mysqli_query($conexao, "SELECT projetos.*, usuario_pessoa.nome FROM usuario_pessoa INNER JOIN projetos ON usuario_pessoa.codigo = projetos.cod_usuario WHERE usuario_pessoa.codigo = $userCodigo");

      $queryBuscaImagem=mysqli_query($conexao, "SELECT imagens_pessoa.path FROM usuario_pessoa INNER JOIN imagens_pessoa ON usuario_pessoa.codigo = imagens_pessoa.cod_pessoa WHERE imagens_pessoa.cod_pessoa = $userCodigo");
      
      $sqlOds = "SELECT ods_projetos.ods_tipo FROM projetos INNER JOIN ods_projetos ON ods_projetos.codigo_projeto = projetos.codigo WHERE ods_projetos.codigo_projeto = $projetoCodigo";
      $result = mysqli_query($conexao, $sqlOds);

      $sqlColaboradores = "SELECT colaboradores_projeto.nome FROM projetos INNER JOIN colaboradores_projeto ON colaboradores_projeto.cod_projeto = projetos.codigo WHERE colaboradores_projeto.cod_projeto = $projetoCodigo";
      $resultColaboradores = mysqli_query($conexao, $sqlColaboradores);

      $sqlArquivos = "SELECT arquivos_projetos.path FROM projetos INNER JOIN arquivos_projetos ON arquivos_projetos.cod_projetos = projetos.codigo WHERE arquivos_projetos.cod_projetos = $projetoCodigo";
      $resultArquivos = mysqli_query($conexao, $sqlArquivos);

      $sqlLinks = "SELECT links_projeto.link FROM projetos INNER JOIN links_projeto ON links_projeto.codigo_projeto = projetos.codigo WHERE links_projeto.codigo_projeto = $projetoCodigo";
      $resultLinks = mysqli_query($conexao, $sqlLinks);

      while($rowTemp = mysqli_fetch_assoc($result)){
        $arrayOds[] = $rowTemp['ods_tipo'];
      }

      while($rowCol = mysqli_fetch_assoc($resultColaboradores)){
        $arrayCol[] = $rowCol['nome'];
      }

      while($rowLinks = mysqli_fetch_assoc($resultLinks)){
        $arrayLinks[] = $rowLinks['link'];
      }

      while($rowArquivos = mysqli_fetch_assoc($resultArquivos)){
        $arrayArquivos[] = $rowArquivos['path'];
      }

      $row = $queryBusca -> fetch_assoc();
      $rowImagem = $queryBuscaImagem -> fetch_assoc();
    } else {
      header("location: listProjects-ods.php");
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
              <!-- light version logo (logo must be black)-->
              <img src="image/logo-main-black.png" alt="" class="light-version-logo default-logo">
              <!-- Dark version logo (logo must be White)-->
            </a>
          </div>
          <div class="collapse navbar-collapse" id="mobile-menu">
            <div class="navbar-nav-wrapper">
              <ul class="navbar-nav main-menu">
                <li class="nav-item dropdown">
                  <a class="nav-link"  href="Projects-ods.html" role="button" aria-haspopup="true" aria-expanded="false">Projetos ODS </a>
                  
                </li>
                <li class="nav-item dropdown active">
                  <a class="nav-link " href="#features" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">• Meus Projetos</a>
                  
                    <li class="drop-menu-item dropdown">
                      
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Projects-ods.html">Agenda 2030</a>
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
    <div class="pt-11 pt-lg-26 pb-lg-10" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
      <div class="container">
        <!-- Section Top -->
        
<!-- Main Content Start -->

          <!--<img src="image/Novo Projeto (2).png" class="bricon font-size-4 font-weight-bold pr-10">Projetos ODS > Erradicação da pobreza <b>> Informações</b></p>-->

            <div class="border border-color-2 rounded-4  pt-7 pb-7  mb-9 bg-white" >
             <!-- Main Body ODS  
              <img
              style="width: 100px; right: 100px; margin-left: 10px;margin-right: 10px; " src="ODS/1.png"></i>
              <img
              style="width: 100px; right: 100px; margin-left: 10px;margin-right: 10px; " src="ODS/2.png"></i>
            </div>  
            Main ODS -->
            
                  <!-- Excerpt Start 
                  <div class="pr-xl-0 pr-xxl-14 p-5 px-xs-12 pt-7 pb-5">
                    <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold"><b>Preciso de parceria FINANCEIRA</b></h4>
                    <p class="font-size-4 mb-8">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five
                      Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    
                  </div>
                  <!-- Excerpt End -->




        <!-- back Button End -->
        <div class="row">
          <!-- Left Sidebar Start -->
          <div class="col-12 col-xxl-3 col-lg-4 col-md-5 mb-11 mb-lg-0">
            <div class="pl-lg-5">
              <!-- Top Start -->
              <div class="bg-white shadow-9 rounded-4">
                <div class="px-5 py-11 text-center border-bottom border-mercury">
                  <a class="mb-4" href="#"><img class="circle-54" src="<?php echo $rowImagem['path'] ?>" alt=""></a>
                  <h4 class="mb-0"><a class="text-black-2 font-size-6 font-weight-semibold" href="#"><?php echo $row['nome'] ?></a></h4>
                  <p class="mb-8"><a class="text-gray font-size-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a></p>
                  <!-- Top End 
                  <div class="icon-link d-flex align-items-center justify-content-center flex-wrap">
                    <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-twitter"></i></a>
                  </div>-->
                </div>
                

              </div>
            </div>
          </div>
          <!-- Left Sidebar End -->
          <!-- Middle Content -->
          <div class="col-12 col-xxl-6 col-lg-8 col-md-7 order-2 order-xl-1">
            <div class="bg-white rounded-4 shadow-9">
              <!-- Tab Section Start -->
              <ul class="nav border-bottom border-mercury pl-12" id="myTab" role="tablist">
                <li class="tab-menu-items nav-item pr-12">
                  <a class="active text-uppercase font-size-3 font-weight-bold text-default-color py-3" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DESCRIÇÃO</a>
                </li>
                <li class="tab-menu-items nav-item pr-12">
                  <a class="text-uppercase font-size-3 font-weight-bold text-default-color py-3" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">CONTATO</a>
                </li>
              </ul>
              <!-- Tab Content -->
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <!-- Excerpt Start -->
                  <div class="pr-xl-0 pr-xxl-14 p-5 px-xs-12 pt-7 pb-5">
                    <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold"><?php  ?></h4>

                    <p class="font-size-4 mb-8">Descrição do Projeto:
                      <?php echo $row['descricao_projeto'] ?></p>
                  </div>
                  <!-- Excerpt End -->
                  <!-- Skills -->
                  <div class="border-top pr-xl-0 pr-xxl-14 p-5 pl-xs-12 pt-7 pb-5">
                    <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">ODS</h4>
                    <ul class="list-unstyled d-flex align-items-center flex-wrap">
                      <li>
                        <?php if(in_array(1, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/1.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(2, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/2.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(3, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/3.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(4, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/4.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(5, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/5.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(6, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/6.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(7, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/7.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(8, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/8.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(9, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/9.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(10, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/10.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(11, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/11.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(12, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/12.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(13, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/13.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(14, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/14.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(15, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/15.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(16, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/16.png'></i>";
                        } ?>
                      </li>
                      <li>
                        <?php if(in_array(17, $arrayOds)){
                          echo "<img style='width: 100px; right: 100px; margin: 20px; ' src='ODS/17.png'></i>";
                        } ?>
                      </li>
                    </ul>
                  </div>
                  <!-- Skills End -->
                  <!-- Skills -->
                  <div class="border-top pr-xl-0 pr-xxl-14 p-5 pl-xs-12 pt-7 pb-5">
                    <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">Colaboradores</h4>
                    <ul class="list-unstyled d-flex align-items-center flex-wrap">
                    <?php if(!empty($arrayCol)) foreach($arrayCol as $value){
                      echo "
                      <li>
                        <img class='circle-54' style='margin-left: 40px;margin-right: 40px; align-items: center;' src='./image/l3/png/pro-img.png'></i>
                        <p>$value</p>
                      </li>";
                    } else echo "<a class='font-size-3 text-black-2 font-weight-semibold'>Não há Colaboradores neste projeto.</a>"?>

                    </ul>
                  </div>
                  <!-- Skills End -->
                  <!-- Card Section Start -->
                  <div class="border-top p-5 pl-xs-12 pt-7 pb-5">
                    
                    <!-- Single Problema -->
                    <div class="w-100">
                      <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                        <div class="w-100 mt-n2">
                          <h3 class="mb-0">
                            <a class="font-size-6 text-black-2 font-weight-semibold">Problema</a>
                          </h3>
                          <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="" class="font-size-4 text-gray mr-5"><?php echo $row['problema'] ?>
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Single Card End -->
                    <!-- Single Objetivo -->
                    <div class="w-100">
                      <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                        <div class="w-100 mt-n2">
                          <h3 class="mb-0">
                            <a class="font-size-6 text-black-2 font-weight-semibold">Objetivo</a>
                          </h3>
                          <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="" class="font-size-4 text-gray mr-5"><?php echo $row['objetivo'] ?>
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Single Card End -->
                    <!-- Single Problema -->
                    <div class="w-100">
                      <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                        <div class="w-100 mt-n2">
                          <h3 class="mb-0">
                            <a class="font-size-6 text-black-2 font-weight-semibold">Resultados Esperados</a>
                          </h3>
                          <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="" class="font-size-4 text-gray mr-5"><?php echo $row['expectativa'] ?>
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Single Card End -->
                    <!-- Single publico alvo -->
                    <div class="w-100">
                      <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                        <div class="w-100 mt-n2">
                          <h3 class="mb-0">
                            <a class="font-size-6 text-black-2 font-weight-semibold">Público Alvo</a>
                          </h3>
                          <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="" class="font-size-4 text-gray mr-5"><?php echo $row['publico_alvo'] ?>
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Single Card End -->
                    <!-- Single publico alvo -->
                    <div class="w-100">
                      <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                        <div class="w-100 mt-n2">
                          <h3 class="mb-0">
                            <a class="font-size-6 text-black-2 font-weight-semibold">Recursos Necessários</a>
                          </h3>
                          <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="" class="font-size-4 text-gray mr-5"><?php echo $row['recursos'] ?>
                              </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Single Card End -->
                   
                  </div>
                  <!-- Card Section End -->
                  <!-- Card Section Start -->
                  <div class="border-top p-5 pl-xs-12 pt-7 pb-5">
                    <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">Imagens</h4>
                    
                    <!-- Single Card -->
                    <div class="w-100">
                      <div class="">
                        <div class="   mr-8 mb-7 mb-sm-0">
                          <?php if(!empty($arrayArquivos)) foreach($arrayArquivos as $value){
                            echo "<img src='$value'>";
                          }?> 
                        </div>
                      </div>
                    </div>
                    <!-- Single Card End -->

                  </div>
                  <div class="border-top p-5 pl-xs-12 pt-7 pb-5">
                    <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">Links</h4>
                    
                    <!-- Single Card -->
                    <div class="w-100">
                      <div class="">
                        <div class="   mr-8 mb-7 mb-sm-0">
                          <?php if(!empty($arrayLinks)) foreach($arrayLinks as $value){
                            echo "<a href='$value' class='font-size-4 text-gray mr-5'>$value</a>";
                          }?> 
                        </div>
                      </div>
                    </div>
                    <!-- Single Card End -->

                  </div>
                  
                  <!-- Card Section End -->
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <!-- Excerpt Start -->
                  <div class="pr-xl-11 p-5 pl-xs-12 pt-9 pb-11">
                    <form action="/">
                      <div class="row">
                        <div class="col-12 mb-7">
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">Your Name</label>
                          <input id="name3" type="text" class="form-control" placeholder="Jhon Doe">
                        </div>
                        <div class="col-lg-6 mb-7">
                          <label for="email3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">E-mail</label>
                          <input id="email3" type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="col-lg-6 mb-7">
                          <label for="subject3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">Subject</label>
                          <input id="subject3" type="text" class="form-control" placeholder="Special contract">
                        </div>
                        <div class="col-lg-12 mb-7">
                          <label for="message3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">Message</label>
                          <textarea name="message" id="message3" placeholder="Type your message" class="form-control h-px-144"></textarea>
                        </div>
                        <div class="col-lg-12 pt-4">
                          <button class="btn btn-primary text-uppercase w-100 h-px-48">Send Now</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Excerpt End -->
                </div>
              </div>
              <!-- Tab Content End -->
              <!-- Tab Section End -->
            </div>
          </div>
          <!-- Middle Content -->



                
              </div>
              <div class="mb-8">
                <!-- End Single Featured Job -->
              </div>
              <div class="text-center pt-5 pt-lg-13">
                <a class="text-green font-weight-bold text-uppercase font-size-3" href="#">
                  Load More <i class="fas fa-sort-down ml-3"></i>
                </a>
              </div>
            </div>
            <!-- form end -->
          </div>
        </div>
      </div>
    </div>
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
  <!-- Activation Script -->
  <!-- <script src="js/drag-n-drop.js"></script> -->
  <script src="js/custom.js"></script>
</body>

</html>