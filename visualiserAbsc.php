<?php

session_start();
require 'connect.php';
include('includes/RhMenu.html');

if (!isset($_SESSION['Cnx']))
    header('location: index.php');
$id_emp = $_SESSION['Cnx']['id_emp'];
$result = $bdd->query("SELECT * FROM `absence` WHERE absence.id_emp = $id_emp");

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhMenu.css">
    <link rel="stylesheet" href="includes/paie.css">
</head>

<body>
    <div class="container-xl mt-5">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>liste des Absences</h2>
                        </div>
                    </div>
                </div>
                <div class="table-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Date de début</td>
                                <td>Date de fin</td>
                                <td>Nombres d'heures</td>
                            </tr>
                        </thead>
                        <tbody class="input--style-1">
                            <?php
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                echo '<td>' . $row['date_debut_abs'] . '</td>';
                                echo '<td>' . $row['date_fin_abs'] . '</td>';
                                echo '<td>' . $row['nbr_heures'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>