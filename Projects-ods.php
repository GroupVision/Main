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
                <li class="nav-item dropdown active">
                  <a class="nav-link"  href="#features" role="button" aria-haspopup="true" aria-expanded="false">• Projetos ODS </a>
                  
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="#features" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Meus Projetos</a>
                  
                    <li class="drop-menu-item dropdown">
                      
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Agenda 2030</a>
                </li>

                <li class=""nav-item dropdown active">
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
              <h2 class="font-size-9 font-weight-bold">Confira os projetos de cada Objetivo de desenvolvimento sustentável</h2>
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
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-blue bg-blue-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-briefcase"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Business Development</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-spray bg-spray-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-headset"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Customer Service</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>235</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-coral bg-coral-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-layer-group"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Development</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>624</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-red bg-red-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-pen-nib"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Design</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>174</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-orange bg-orange-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-rocket"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Marketing &amp; Management</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>268</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-yellow bg-yellow-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-location-arrow"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Sales &amp; Communication</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>156</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-turquoise bg-turquoise-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="icon icon-sidebar-2"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Project Management</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>162</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-green bg-green-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-user"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Human Resource </h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>84</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Section Top -->
        <div class="row justify-content-center">
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-blue bg-blue-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-briefcase"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Business Development</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-spray bg-spray-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-headset"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Customer Service</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>235</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-coral bg-coral-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-layer-group"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Development</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>624</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-red bg-red-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-pen-nib"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Design</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>174</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-orange bg-orange-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-rocket"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Marketing &amp; Management</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>268</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-yellow bg-yellow-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-location-arrow"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Sales &amp; Communication</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>156</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-turquoise bg-turquoise-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="icon icon-sidebar-2"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Project Management</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>162</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-green bg-green-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-user"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Human Resource </h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>84</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Section Top -->
        <div class="row justify-content-center">
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-blue bg-blue-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-briefcase"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Business Development</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-spray bg-spray-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-headset"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Customer Service</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>235</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-coral bg-coral-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-layer-group"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Development</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>624</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-red bg-red-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-pen-nib"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Design</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>174</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-orange bg-orange-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-rocket"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Marketing &amp; Management</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>268</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-yellow bg-yellow-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-location-arrow"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Sales &amp; Communication</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>156</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-turquoise bg-turquoise-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="icon icon-sidebar-2"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Project Management</h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>162</span> Vacancy</p>
              </div>
            </a>
          </div>
          <!-- End Single Category -->
          <!-- Single Category -->
          <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
            <a href="#" class="bg-white border border-color-2 rounded-4 pl-9 pt-10 pb-3 pr-7 hover-shadow-1 mb-9 d-block w-100">
              <div class="text-green bg-green-opacity-1 square-70 rounded-4 mb-7 font-size-7">
                <i class="fa fa-user"></i>
              </div>
              <!-- Category Content -->
              <div class="">
                <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Human Resource </h5>
                <p class="font-size-4 font-weight-normal text-gray"><span>84</span> Vacancy</p>
              </div>
            </a>
          </div>
          
          
          <!-- End Single Category -->
        </div>
      </div>
    </div>
    <!-- End Category Area -->



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