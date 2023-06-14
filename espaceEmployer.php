<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Espace Employé</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php
    session_start();
    include('includes/RhMenu.html');
    if (!isset($_SESSION['Auth'])) {
        header('location: index.php');
    }
     ?>
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="RhLandingPage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <img src="images/user.png" class="user-pic2" onclick="ToggleMenu()">
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img src="images/user.png">
                <h3>ddddddd</h3>
            </div>
            <a href="myprofile.php" class="sub-menu-link">
                <img src="images/profile.png">
                <p>Profile</p>
            </a>
            <a href="#" class="sub-menu-link">
                <img src="images/setting.png">
                <p>paramètres</p>
                <span>></span>
            </a>
            <a href="#" class="sub-menu-link">
                <img src="images/help.png">
                <p>Changer mot de passe</p>
                <span></span>
            </a>
            <a href="deco.php" class="sub-menu-link">
                <img src="images/logout.png">
                <p>Déconnexion</p>
                <span>></span>
            </a>
        </div>
    </div>
    <script>
        let subMenu=document.getElementById('subMenu');
        function ToggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
  </header><!-- End Header --><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employer</title>
    <!-- <link rel="stylesheet" href="includes/RhMenu.css"> -->
    <link rel="stylesheet" href="includes/GestEnt.css">
</head>
<body>
<main id="main">

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Votre Espace</h2>
        </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-plus-circle"></i></div>
                <h4><a href="" >Visualiser Congés</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="demanderConge.php">Demander Congé</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-window-close"></i></div>
                <h4><a href="declarerHS.php" > Déclarer Heures supplimentaires</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-window-close"></i></div>
                <h4><a href="" >Visualiser Heures supplimentaires</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-window-close"></i></div>
                <h4><a href="" > Demander Avance</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-window-close"></i></div>
                <h4><a href="faireReclamation.php">Envoyer Réclamation</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-window-close"></i></div>
                <h4><a href="" >Visualiser Abscence</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-window-close"></i></div>
                <h4><a href="" > Saisir Abscence</a></h4>
            </div>
        </div>
    </div>
    </div>
</section><!-- End Services Section -->
</main><!-- End #main -->
<footer id="footer">
    <div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>Gp</span></strong>. All Rights Reserved
    <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
</div>
  <div class="credits">
    Réalisé par <a href="">ILISI</a>
    </div>
</div></footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>