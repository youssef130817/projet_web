<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="includes/RhMenu.css"> -->
  <link rel="stylesheet" href="includes/RhLandingPage.css">
</head>

<body>
  <?php
  session_start();
  include('includes/RhMenu.html');
  if (!isset($_SESSION['RH'])) 
  {
    header('location: index.php');
  }
  ?>

  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>
            <?php
            echo "<p>Bonjour " . $_SESSION['RH']['nom_emp'] . " </p>";
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
  <footer id="footer">
    <?php
    include('footer.html');
    ?>
</footer>


</body>


</html>