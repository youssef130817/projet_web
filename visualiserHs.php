<?php
session_start();
require 'connect.php';
include('includes/RhMenu.html');
if (!isset($_SESSION['Cnx']))
    header('location: index.php');
$id_emp = $_SESSION['Cnx']['id_emp'];
$result = $bdd->query("SELECT * FROM `heures_supp` WHERE heures_supp.id_emp = $id_emp");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhConge.css">

</head>

<body>
    <div class="container-xl mt-5">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>liste des employés</h2>
                        </div>
                    </div>
                </div>
                <div class="table-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>type de jour</td>
                                <td>Nombre des heures</td>
                                <td>statut</td>
                            </tr>
                        </thead>
                        <tbody class="input--style-1">
                            <?php
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                if ($row['type_jour'] == "f")
                                    echo '<td>jour férier</td>';
                                else
                                    echo '<td>jour normal</td>';
                                echo '<td>' . $row['nbr_heures'] . '</td>';
                                echo '<td>' . $row['statut'] . '</td>';
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