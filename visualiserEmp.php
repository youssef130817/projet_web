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
                            <h2>liste des employés</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>CNI</th>
                            <th>ENTREPRISE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $result = $bdd->query("SELECT * FROM `employee`");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $idemp = $row["id_emp"];
                            $result2 = $bdd->query("SELECT * FROM `entreprise`,`comptes` where comptes.id_emp='$idemp' and comptes.id_ent=entreprise.id_ent");
                            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
                            echo '<tr>
                            <td>' . $row['nom_emp'] . '</td>
                            <td>' . $row['prenom_emp'] . '</td>
                            <td>' . $row['cni_emp'] . '</td>
                            <td>' . $row2['nom_ent'] . '</td>
                            <td class="ent">
                            <form  action="supprimerEmp.php" method="post">
                                <input type="hidden" name="id_emp" value="' . $row["id_emp"] . '">
                                <input  type="submit" name="supprimer" id="btnR" value="" >
                            </form>
                            <form  action="ModifierEmp.php" method="post">
                                <input type="hidden" name="id_emp" value="' . $row["id_emp"] . '">
                                <input  type="submit" name="modifier" id="btnM" value="" ">
                            </form>
                            </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>