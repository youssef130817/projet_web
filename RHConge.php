<?php
session_start();
if (!isset($_SESSION['Auth'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhConge.css">

</head>

<body>
    <?php
    include('includes/RhMenu.html');

    ?>
    <form>
        <main class="table">
            <div class="table-header">
                <h3>Demandes de congés</h3>
            </div></br>
            <div class="table-body">
                <table>
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
        </main>
    </form>
    <script src="includes/RHConge.js"></script>
</body>
<!--footer-->
<!--?php include('footer.php'); ?-->
<!--/footer -->

</html>