<?php
session_start();

if ($_SESSION['Cnx']['type'] !== 1) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/paie.css">

</head>


<body class="conge">
    <?php
    include('includes/RhMenu.html');

    ?>
    <form>
        <div class="container-xl mt-5">
            <div class="table-responsive">
                <div class="table-wrapper table-body">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2>Demandes des Absences</h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-body">
                        <input type="search" id="searchInput" onkeyup="myFunction()" placeholder="chercher un employé...">
                        <img id="searchimg" src='images/search.png'>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>Nom</td>
                                    <td>Prénom</td>
                                    <td>Date Début</td>
                                    <td>Date Fin</td>
                                    <td>Nombre heurs</td>
                                    <td>Etat</td>
                                    <td>Traiter</td>
                                </tr>
                            </thead>

                            <tbody class="conge">
                                <?php
                                require 'connect.php';
                                $result = $bdd->query("SELECT * FROM `absence`, `employee` WHERE absence.id_emp = employee.id_emp");
                                $rowNum = 0; // Variable pour suivre le numéro de ligne actuel
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>';
                                    echo '<td><img class="tabimg" src="uploads/' . $row['img_emp'] . '">' . $row['nom_emp'] . '</td>';
                                    echo '<td>' . $row['prenom_emp'] . '</td>';
                                    echo '<td>' . $row['date_debut_abs'] . '</td>';
                                    echo '<td>' . $row['date_fin_abs'] . '</td>';
                                    echo '<td>' . $row['nbr_heures'] . '</td>';
                                    echo '<td id="st-' . $rowNum . '">' . $row['status_abs'] . '</td>';
                                    echo ' <form method="POST">';
                                    echo '  <td>
                                        <input type="hidden" name="idc" value="' . $row["id_abs"] . '">
                                        <input  type="submit" name="accepter" id="btnA" value="" onclick="Accepter(event,' . $row["id_abs"] . ', ' . $rowNum . ')">
                                        <input  type="submit" name="reffuser" id="btnR" value="" onclick="Rejeter(event,' . $row["id_abs"] . ', ' . $rowNum . ')">
                                        <p class="error-txt" id="err-' . $rowNum . '"></p>
                                    </td>';
                                    echo '</form>';
                                    echo '</tr>';
                                    $rowNum++; // Incrémenter le numéro de ligne
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </main>
    </form>
    <script src="includes/RhAbsence.js"></script>
    <script src="includes/search.js"></script>
</body>
<!--footer-->
<!--?php include('footer.php'); ?-->
<!--/footer -->

</html>