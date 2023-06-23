<?php

session_start();
require 'connect.php';
include('includes/RhMenu.html');

if (!isset($_SESSION['Cnx']))
    header('location: index.php');
$id_emp = $_SESSION['Cnx']['id_emp'];
$result = $bdd->query("SELECT * FROM `conges` WHERE conges.id_emp = $id_emp");
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
                            <h2>liste des Congés</h2>
                        </div>
                    </div>
                </div>
                <div class="table-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Date de début</td>
                                <td>Date de fin</td>
                                <td>Statut</td>
                            </tr>
                        </thead>
                        <tbody class="input--style-1">
                            <?php
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                echo '<td>' . $row['date_debut_cg'] . '</td>';
                                echo '<td>' . $row['date_fin_cg'] . '</td>';
                                echo '<td>' . $row['statut_cg'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </main>
                </form>
</body>

</html>