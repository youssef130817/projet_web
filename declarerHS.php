<?php
session_start();
include('includes/RhMenu.html');
if (!isset($_SESSION['Cnx']))
    header('location: index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclarer Hs</title>
    <link rel="stylesheet" href="includes/ajoutemp.css">
</head>

<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Déclarer les heures supplimentaires</h2>
                    <form action="traitementheuressupp.php" method="POST">
                        <div class="input-group">
                            <label for="type_jour">Type de jour :</label>
                            <select class="input--style-1" id="type" name="type">
                                <option value="ferier">Jour ferier</option>
                                <option value="normal">Jour Normal</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="time_jour">Temps :</label>
                            <select class="input--style-1" id="time" name="time">
                                <option value="jour">Jour</option>
                                <option value="nuit">Nuit</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="nbr_heures">Nombre d'heures :</label>
                            <input class="input--style-1" type="number" id="nbr_heures" name="nbr_heures">
                        </div>
                        <?php if (isset($_POST['id']))
                            echo '<input type="hidden" name="id" value="' . $_POST["id"] . '">'; ?>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="ajouter">Ajouter les heures supplémentaires</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>