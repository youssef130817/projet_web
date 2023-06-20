<?php
    session_start();
    include('connect.php');
    include('includes/RhMenu.html');
    if(!isset($_SESSION['RP']))
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
    <link rel="stylesheet" href="includes/paie.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.7.0.min.js"></script>
</head>
<body>
<form action="paie.php" method="post" id="form">
    <div class="container-xl mt-5">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                    <div class="col-sm-5">
                        <h2>Liste des <b>employés par entreprise</b></h2> 
                        <select name="selectent" id="selectionemp" onchange="RecupererValeurSelectForBP()">
                        <option selected disabled>selection une entreprise</option>
                        <?php
                            $vr=$_SESSION['Cnx']['id_emp'];
                            $req=$bdd->prepare("SELECT entreprise.id_ent,entreprise.nom_ent,id_gr from comptes,entreprise where comptes.id_emp='$vr' and comptes.id_ent=entreprise.id_ent");
                            $req->execute();
                            $mareqresult=$req->fetch(PDO::FETCH_ASSOC);
                            $vr2=$mareqresult['id_gr'];
                            if(!$vr2) echo "<option value='".$mareqresult['id_ent']."' >".$mareqresult['nom_ent']."</option>";
                            else 
                            {
                                $req2=$bdd->prepare("SELECT id_ent,nom_ent from entreprise
                                                    where id_gr='$vr2'");
                                $req2->execute();
                                $mareqresult2=$req2->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($mareqresult2 as $mk) 
                                {
                                    echo "<option value='".$mk['id_ent']."' >".$mk['nom_ent']."</option>";
                                }
                            };
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <div id="tableauResultatemp"></div>
        </div>
    </div>
    </div>
</form>

<footer id="footer">
    <?php
    include('footer.html');
    ?>
</footer><!-- End Footer -->

<!-- <div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

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
<script src="traitrub.js"></script>
</body>
</html>