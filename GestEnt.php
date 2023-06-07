<?php
    session_start();
    include('connect.php');
    include('includes/RhMenu.html');
    if(!isset($_SESSION['Auth']))
    {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="includes/RhMenu.css"> -->
    <link rel="stylesheet" href="includes/GestEnt.css">
</head>
<body>
<main id="main">

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gestion d'entreprise</h2>
        </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-plus-circle"></i></div>
                <h4><a href="ajouterEntreprise.php" >Ajouter entreprise</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Modifier entreprise</a></h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-window-close"></i></div>
                <h4><a href="" >supprimer entreprise</a></h4>
            </div>
        </div>
        </div>
    </div>
</section><!-- End Services Section -->
</main><!-- End #main -->
<footer id="footer">
    <?php
    include('footer.html');
    ?>
</footer><!-- End Footer -->

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
    <!-- <div class="card-container">
        <div class="row">
            <a href="ajouterEntreprise.php">
                <div class="card">
                    <h3 class="card-heading">Ajouter entreprise</h3>
                </div>
            </a>
            <a href="">
                <div class="card">
                    <h3 class="card-heading">Modifier entreprise</h3>
                </div>
            </a>
        </div>
        <div class="row">
            <a href="">
                <div class="card">
                    <h3 class="card-heading">Supprimer entreprise</h3>
                </div>
            </a>
        </div>
    </div> -->
</body>
</html>