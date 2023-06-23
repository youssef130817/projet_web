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
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>liste des employés</h2>
                        </div>
                    </div>
                </div>
                <div class="table-body">
                    <input type="search" id="searchInput" onkeyup="myFunction()" placeholder="chercher un employé...">
                    <img id="searchimg" src='images/search.png'>


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
                            $ident = $_SESSION['Cnx']['id_ent'];
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $idemp = $row["id_emp"];
                                $result2 = $bdd->query("SELECT * FROM `entreprise`,`comptes` where comptes.id_emp='$idemp' and comptes.id_ent=entreprise.id_ent ");
                                $row2 = $result2->fetch(PDO::FETCH_ASSOC);
                                echo '<tr>
                            <td class="ent"><img class="tabimg" src="uploads/' . $row['img_emp'] . '">' . $row['nom_emp'] . '</td>
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
                            <form  action="RhDeclarerHS.php" method="post">
                            <input type="hidden" name="idh" value="' . $row["id_emp"] . '">
                            <input  type="submit" name="modifier" id="btnh" value="" ">
                            </form>
                            <form  action="RhSaisirAbsence.php" method="post">
                            <input type="hidden" name="ida" value="' . $row["id_emp"] . '">
                            <input  type="submit" name="modifier" id="btna" value="" ">
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

        <script src="visualiserEmp.js"></script>
        <script src="includes/search.js"></script>
</body>
<footer id="footer">
    <?php
    include('footer.html');
    ?>
</footer>

</html>