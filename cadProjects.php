<?php
    require "back/validacao.php";
    include_once('back/configlocal.php');

    $logado = $_SESSION['nome'];
    $codigo = $_SESSION['codigo'];

    $queryFiltro=mysqli_query($conexao, "SELECT * FROM usuario_pessoa WHERE codigo != $codigo");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de Projetos</title>
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
              <img src="image/logo-main-white.png" alt="" class="dark-version-logo">
            </a>
          </div>
          <div class="collapse navbar-collapse" id="mobile-menu">
            <div class="navbar-nav-wrapper">
              <ul class="navbar-nav main-menu">

                <!--Imagem header-->

                <li class="brand-logo" >
                  <a href="./index.html">
                    <!-- light version logo (logo must be black)-->
                    <img src="image/Novo Projeto (2).png" alt="" class="light-version-logo default-logo">
                    <!-- Dark version logo (logo must be White)-->
                    <img src="image/Novo Projeto (2).png" alt="" class="dark-version-logo">
                  </a>
                </li>
                <li class="nav-item dropdown active">
                  
                  <a class="nav-link"  href="Projects-ods.php" role="button" aria-haspopup="true" aria-expanded="false">• Projetos ODS </a>
                  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="#features" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Meus Projetos</a>
                  
                    <li class="drop-menu-item dropdown">
                      
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Agenda 2030</a>
                </li>

                <li class="nav-item dropdown active">
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
                    <li class="drop-menu-item">
                      <a href="#">
                        SAIR
                      </a>
                    </li>
                  </ul>
                </li>

                  </a>
                </li>

                <li class=

                <button class="d-block d-lg-none offcanvas-btn-close focus-reset" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true" aria-label="Toggle navigation">
                  
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
                      <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="dashboard-settings.html">Settings </a>
                      <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="candidate-profile-main.html">Edit Profile</a>
                      <a class="dropdown-item py-2 text-red font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="back/sair.php">Log Out</a>
                        
    
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
    <div class="pt-11 pt-lg-26 pb-lg-16" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400" data-aos-once="true">
      <div class="container">
        <!-- Section Top -->
        <div class="row align-items-center pb-14">
          <!-- Section Title -->
          <div class="col-12 col-lg-6">
            <div class="text-center text-lg-left mb-13 mb-lg-0">
              <h2 class="font-size-9 font-weight-bold">Criando um novo projeto</h2>              
            </div>
          </div>
         </div>
  
                  <!-- Excerpt Start -->
                  <div class="pr-xl-11 p-5 pl-xs-12 pt-9 pb-11">
                    <form enctype="multipart/form-data" action="back/cadastroProjeto.php" method="POST">
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
                      <div class="row">
                        <!--<div class="col-lg-6 mb-7">
                          <label for="fileUpload" class="mb-0 font-size-4 text-smoke">Navege ou Arraste e Solte</label>
                          <input type="file" name="imagem">
                        </div> -->
                        
                        <div style="align-items: center;">
                          <label>Selecione sua imagem de perfil</label>
                          <input type="file" name="imagemProjeto">
                        </div>
                        <div class="col-lg-6 mb-7">
                          <label for="subject3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">Nome do Projeto</label>
                          <input id="subject3" type="text" class="form-control" name="nome" placeholder="Nome do Projeto">
                        </div>                          
                        
                        <div class="col-12 mb-7">
                      </div>
<br><br>
                      <b>1 - Qual ou quais ODS's o seu projeto melhor se encaixa? *</b>
                      <ul>                        
                        <li><input type="checkbox" id="cb1" name="ckOds[]" value="1"/>
                          <label for="cb1" ><img src="ODS/1.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb2" name="ckOds[]" value="2"/>
                          <label for="cb2" ><img src="ODS/2.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb3" name="ckOds[]" value="3"/>
                          <label for="cb3" ><img src="ODS/3.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb4" name="ckOds[]" value="4"/>
                          <label for="cb4" ><img src="ODS/4.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb5"name="ckOds[]" value="5" />
                          <label for="cb5" ><img src="ODS/5.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb6" name="ckOds[]" value="6"/>
                          <label for="cb6" ><img src="ODS/6.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb7"name="ckOds[]" value="7" />
                          <label for="cb7" ><img src="ODS/7.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb8" name="ckOds[]" value="8"/>
                          <label for="cb8" ><img src="ODS/8.png"  /></label>
                        </li>                        </li>
                        <li><input type="checkbox" id="cb9" name="ckOds[]" value="9"/>
                          <label for="cb9" ><img src="ODS/9.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb10" name="ckOds[]" value="10"/>
                          <label for="cb10" ><img src="ODS/10.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb11" name="ckOds[]" value="11"/>
                          <label for="cb11" ><img src="ODS/11.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb12" name="ckOds[]" value="12"/>
                          <label for="cb12" ><img src="ODS/12.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb13" name="ckOds[]" value="13"/>
                          <label for="cb13" ><img src="ODS/13.png"  /></label>
                        </li>                        </li>
                        <li><input type="checkbox" id="cb14" name="ckOds[]" value="14"/>
                          <label for="cb14" ><img src="ODS/14.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb15" name="ckOds[]" value="15"/>
                          <label for="cb15" ><img src="ODS/15.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb16" name="ckOds[]" value="16"/>
                          <label for="cb16" ><img src="ODS/16.png"  /></label>
                        </li>
                        <li><input type="checkbox" id="cb17" name="ckOds[]" value="17"/>
                          <label for="cb17" ><img src="ODS/17.png"  /></label>
                        </li>
                        
                      </ul>
                      
                        
                        <div class="col-12 mb-7">
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">2 - Qual o problema encontrado? *</label>
                          <input id="name3" type="text" class="form-control" placeholder="" name="problema">
                        </div>
                        <div class="col-12 mb-7">
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">3 - Qual o objetivo do seu projeto? *</label>
                          <input id="name3" type="text" class="form-control" placeholder="" name="objetivo">
                        </div>
                        <div class="col-12 mb-7">
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">4 - Qual o resultado esperado na conclusão do projeto? *</label>
                          <input id="name3" type="text" class="form-control" placeholder="" name="expectativa">
                        </div>
                        <div class="col-12 mb-7">
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">5 - Qual é o seu públicos alvos? *</label>
                          <input id="name3" type="text" class="form-control" placeholder="" name="publico_alvo">
                        </div>
                        <div class="col-12 mb-7">
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">6 - Quais são os recursos necessários para fazer esse projeto?</label>
                          <input id="name3" type="text" class="form-control" placeholder="" name="recursos">
                        </div>
                        <div class="col-lg-5 mb-7">
                          <label for="email3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">7 - Você tem colaboradores no projeto? *</label>
                          <div style="margin-left: 20px;" >
                              <input   type="radio" name="radio1" onclick="text(0)" >
                              Sim
                              <input type="radio" name="radio1"  onclick="text(1)" checked>
                              Não
                          </div>
                          <br>
                          <div id="col_mais" >
                            <div id="nome_colaborador" style="display: none;">
                            <input type="search" list="dtlist" placeholder="Digite o nome" name="ckColaboradores[]">
                            <datalist id="dtlist">
                              <?php
                                while ($row = $queryFiltro -> fetch_assoc()){
                                  echo "<option>$row[nome]</option>";
                                } 
                              ?>
                            </datalist>  
                          </div>
                          <input type="button" id="add_mais" class="btn btn-dark float-right mt-2" onclick="add_mais()" value="Adicione mais" style="display: none; ">
                          </div>
                        </div>
                        <div class="col-lg-7 mb-7">
                          <label for="subject3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">8 - Você precisa de parceria para dar andamento ao projeto? *</label>
                            <div style="margin-left: 20px;" >
                                <input id="sel" type="radio" name="radio2" onclick="text2(0)" >
                                Sim
                            
                                <input id="sel" type="radio" name="radio2"  onclick="text2(1)" checked>
                                Não
                                </div>
                            <br>
                            <div id="select_parceria" style="display: none;"> 
                          <select id="select2" name="tipo_parceria" class="form-control nice-select pl-6 arrow-3 h-px-48 w-100 font-size-4" >
                            <option value="">Selecionar opção</option>
                            <option value="Aprendizagem">Aprendizagem</option>
                            <option value="Financeira">Financeira</option> 
                            <option value="Material">Material</option>
                            <option value="Outros">Outros</option>
                          </select>
                          </div >
                        </div>

                        <div class="col-lg-12 mb-7" id="select_descricao" style="display: none; ">
                          <label for="message3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset"> Descreva do porque você precisa desse tipo de parceria para seu projeto *</label>
                          <textarea id="message3" name="descricao_parceria" class="form-control h-px-144"></textarea>
                        </div>
                        <div class="col-12 mb-7">
                          <label for="select2" class="d-block text-black-2 font-size-4 font-weight-semibold mb-4"> 9 - Status do projeto *</label>
                          <select id="select2" name="status" class="form-control nice-select pl-6 arrow-3 h-px-48 w-100 font-size-4">
                            <option value="">Selecionar opção</option> 
                            <option value="Andamento">Andamento</option>
                            <option value="Concluido">Concluído</option>
                            <option value="Em_criacao">Em criação</option>
                          </select>
                        </div>
                        <!-- O segundo valor estará selecionado inicialmente -->


                        <div class="col-lg-12 mb-7">
                          <label for="message3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">10 - Faça uma descrição do seu projeto *</label>
                          <textarea id="message3" placeholder="" class="form-control h-px-144" name="descricao_projeto"></textarea>
                        </div>
                        <div class="col-12 mb-7"> 
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset"> 11 - Adicionar arquivos</label>
                          <div id="col_mais2">
                            <input type="file" class="form-control" style="line-height: normal;" name="ckArquivos[]">
                          </div>
                          <br>
                          <input type="button" id="add_mais2" class="btn btn-dark" onclick="add_mais2()" value="Adicione mais">
                        </div>                         
                        <div class="col-12 mb-7">
                          <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">12- Adicionar links relevantes do seu projeto</label>
                          <div id="col_mais3">
                            <input name="ckLinks[]" type="text" class="form-control">
                          </div>
                          <br>
                          <input type="button" id="add_mais3" class="btn btn-dark" onclick="add_mais3()" value="Adicione mais">
                        </div>
                        <div class="col-lg-12 pt-4">
                          <input class="btn btn-primary text-uppercase w-100 h-px-48" type="submit" name="submit" value="Criar">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Excerpt End -->

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
  <script src="js/projeto.js"></script>

</body>

</html>