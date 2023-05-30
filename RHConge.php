<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhMenu.css">
    <link rel="stylesheet" href="includes/RhConge.css">
</head>

<body>
    <?php
    include('includes/RhMenu.html');
    
    ?>
    <form>
        <main class="table">
            <section class="table-header">
                <h3>Demandes de congés</h3>

            </section>
            <section class="table-body">
                <table>

                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Date Début</td>
                            <td>Date Fin</td>
                            <td>Etat</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $state = 'en cours';
                        $result = $bdd->query("SELECT * FROM `conges`, `employe` WHERE conges.ID_EMP = employe.ID_EMP AND conges.STATUT_CONGES='$state'");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $row['NOM_EMP'] . '</td>';
                            echo '<td>' . $row['PRENOM_EMP'] . '</td>';
                            echo '<td>' . $row['DATE_DEBUT_CONGE'] . '</td>';
                            echo '<td>' . $row['DATE_FIN_CONGE'] . '</td>';
                            echo ' <form action="RhConge.php" method="post">';
                            echo '  <td>
                                        <input type="submit" name="accepter" id="btnA" value="">
                                        <input type="submit" name="reffuser" id="btnR" value="">
                                        <label class="label_coment" for="comment">Commentaire</label>
                                        <p class="error"></p>
                                        <input type="hidden" name="idc" value="' . $row["ID_EMP"] . '">
                                    </td>';
                            echo '</form>';
                            echo '</tr>';
                        }
                        if (isset($_POST["accepter"])) {
                            $id = $_POST["idc"];
                            $state = 'validé';
                            $req = $bdd->prepare("UPDATE `conges` set STATUT_CONGES='$state' WHERE ID_EMP='$id'");
                            $req->execute();
                        }
                        if (isset($_POST["reffuser"])) {
                            $id = $_POST["idc"];
                            $state = 'reffuser';
                            $req = $bdd->prepare("UPDATE `conges` set STATUT_CONGES='$state' WHERE ID_EMP='$id'");
                            $req->execute();
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </form>
</body>

</html>