<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhMenu.css">
    <link rel="stylesheet" href="includes/RhLandingPage.css">
</head>

<body>
    <?php
    session_start();
    include('includes/RhMenu.html');
    if(!isset($_SESSION['Auth']))
    {
        header('location: index.php');
    }
    echo "<p>Bonjour ".$_SESSION['Auth']['nom_emp']." </p>";
    // print_r($_SESSION);
    ?>
    <div class="card-container">

        <div class="row">
            <a href="#">
                <div class="card">
                    <h3 class="card-heading">Mes Heurs Supplémentaires</h3>
                </div>
            </a>
            <a href="">
                <div class="card">
                    <h3 class="card-heading">Mes Congés</h3>
                </div>
            </a>

        </div>
        <div class="row">
            <a href="">
                <div class="card">
                    <h3 class="card-heading">Mes Absences</h3>
                </div>
            </a>
            <a href="">
                <div class="card">
                    <h3 class="card-heading">Mes Bultins</h3>
                </div>
            </a>
        </div>
    </div>
</body>

</html>