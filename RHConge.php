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
                                <h2>Demandes des congés</h2>
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
                                    <td>Etat</td>
                                    <td>Traiter</td>
                                </tr>
                            </thead>

                            <tbody class="conge">
                                <?php
                                require 'connect.php';
                                $result = $bdd->query("SELECT * FROM `conges`, `employee` WHERE conges.id_emp = employee.id_emp");
                                $rowNum = 0; // Variable pour suivre le numéro de ligne actuel
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>';
                                    echo '<td><img class="tabimg" src="uploads/' . $row['img_emp'] . '">' . $row['nom_emp'] . '</td>';
                                    echo '<td>' . $row['prenom_emp'] . '</td>';
                                    echo '<td>' . $row['date_debut_cg'] . '</td>';
                                    echo '<td>' . $row['date_fin_cg'] . '</td>';
                                    echo '<td id="st-' . $rowNum . '">' . $row['statut_cg'] . '</td>';
                                    echo ' <form method="POST">';
                                    echo '  <td>
                                        <input type="hidden" name="idc" value="' . $row["id_cg"] . '">
                                        <input  type="submit" name="accepter" id="btnA" value="" onclick="Accepter(event,' . $row["id_cg"] . ', ' . $rowNum . ')">
                                        <input  type="submit" name="reffuser" id="btnR" value="" onclick="Rejeter(event,' . $row["id_cg"] . ', ' . $rowNum . ')">
                                        <label class="label_coment" for="comment">Commentaire</label>
                                        <input type="text" name="comment" id="cmt-' . $rowNum . '" class="comment">
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
                </div>
            </div>
        </div>
    </form>
    <script src="includes/RHConge.js"></script>
    <script src="includes/search.js"></script>
</body>

</html>