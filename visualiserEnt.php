<?php
session_start();
include('includes/RhMenu.html');
if ($_SESSION['Cnx']['type'] !== 1)
    header('location: index.php');
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
            <div class="table-wrapper table-body">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>liste des entreprises</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <input type="search" id="searchInput" onkeyup="myFunction()" placeholder="chercher un employé...">
                    <img id="searchimg" src='images/search.png'>
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
                        $vr = $_SESSION['Cnx']['id_emp'];
                        $result = $bdd->query("SELECT * from comptes,entreprise where comptes.id_emp='$vr' and comptes.id_ent=entreprise.id_ent");
                        $mareqresult = $result->fetch(PDO::FETCH_ASSOC);
                        $vr2 = $mareqresult['id_gr'];
                        if (!$vr2) {
                            echo '<tr>
                            <td><img class="tabimg" src="uploads/' . $mareqresult['img_ent'] . '">' . $mareqresult['nom_ent'] . '</td>
                            <td> Sans Groupe</td>
                            <td class="ent">
                            <form  action="supprimerEnt.php" method="post">
                                <input type="hidden" name="id_ent" value="' . $mareqresult["id_ent"] . '">
                                <input  type="submit" name="supprimer" id="btnR" value="" >
                            </form>
                            <form  action="ModifierEnt.php" method="post">
                                <input type="hidden" name="id_ent" value="' . $mareqresult["id_ent"] . '">
                                <input  type="submit" name="modifier" id="btnM" value="" ">
                            </form>
                            </td>
                            </tr>';
                        } else {
                            $req2 = $bdd->prepare("SELECT * from entreprise
                                                    where id_gr='$vr2'");
                            $req2->execute();
                            $tmp;
                            $rowNum = 0; // Variable pour suivre le numéro de ligne actuel
                            while ($row = $req2->fetch(PDO::FETCH_ASSOC)) {
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
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer id="footer">
        <?php
        include('footer.html');
        ?>
    </footer>
    <script src="visualiserEnt.js"></script>
    <script src="includes/search.js"></script>


</body>
<!--footer-->
<!--?php include('footer.php'); ?-->
<!--/footer -->

</html>