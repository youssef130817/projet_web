<?php
session_start();
include('connect.php');
include('includes/RhMenu.html');

if ($_SESSION['Cnx']['type'] !== 1) {
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="includes/RhMenu.css"> -->
  <link rel="stylesheet" href="includes/RhLandingPage.css">
</head>

<body>


  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>
            <?php
            echo "<p>Bonjour " . $_SESSION['Auth']['nom_emp'] . " </p>";
            ?>
          </h1>
        </div>
      </div>
      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-4 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3><a href="GestEnt.php">Gestion d'entreprise</a></h3>
          </div>
        </div>
        <div class="col-xl-4 col-md-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line"></i>
            <h3><a href="GestEmp.php">Gestion d'employé</a></h3>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>
<footer id="footer">
  <?php
  include('footer.html');
  ?>
</footer>
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

</html>