<?php
session_start();
include('connect.php');
include('includes/RhMenu.html');
if (!isset($_SESSION['RH'])) {
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

        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Gestion d'entreprise</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-plus-circle"></i></div>
                            <h4><a href="ajouterEntreprise.php">Ajouter entreprise</a></h4>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="visualiserEnt.php">Gérer Entreprise</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer id="footer">
    <?php
    include('footer.html');
    ?>
</footer>
</body>

</html>