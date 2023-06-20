<?php
session_start();
include('includes/RhMenu.html');
if (!isset($_SESSION['Auth'])) {
    header('location: index.php');
}
?>
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
    <div class="container-xl mt-5">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>liste des entreprises</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>NOM</th>
                            <th>GROUPE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $result = $bdd->query("SELECT * FROM `entreprise`");
                        $tmp;
                        $rowNum = 0; // Variable pour suivre le numéro de ligne actuel
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            if ($row['id_gr']) {
                                $tmp = $row['id_gr'];
                                $req = $bdd->query("SELECT Libelle_gr FROM `groupe` where id_groupe= '$tmp'");
                                $tmp = $req->fetch(PDO::FETCH_ASSOC);
                                $tmp = $tmp['Libelle_gr'];
                            } else
                                $tmp = "SANS GROUPE";
                            echo '<tr>
                            <td><img class="tabimg" src="uploads/' . $row['img_ent'] . '">' . $row['nom_ent'] . '</td>
                            <td>' . $tmp . '</td>
                            <td class="ent">
                            <form  action="supprimerEnt.php" method="post">
                                <input type="hidden" name="id_ent" value="' . $row["id_ent"] . '">
                                <input  type="submit" name="supprimer" id="btnR" value="" >
                            </form>
                            <form  action="ModifierEnt.php" method="post">
                                <input type="hidden" name="id_ent" value="' . $row["id_ent"] . '">
                                <input  type="submit" name="modifier" id="btnM" value="" ">
                            </form>
                            </td>
                            </tr>';
                            $rowNum++; // Incrémenter le numéro de ligne
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="visualiserEnt.js"></script>


</body>
<!--footer-->
<!--?php include('footer.php'); ?-->
<!--/footer -->

</html>