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
    <link rel="stylesheet" href="includes/RhMenu.css">
    <link rel="stylesheet" href="includes/RhLandingPage.css">
</head>
<body>
    <div class="card-container">
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
            <!-- <a href="">
                <div class="card">
                    <h3 class="card-heading">Mes Bultins</h3>
                </div>
            </a> -->
        </div>
    </div>
</body>
</html>