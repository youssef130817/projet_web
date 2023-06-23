<?php
session_start();
include('includes/RhMenu.html');
if ($_SESSION['Cnx']['type'] == 0)
    header('location: index.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhMenu.css">
    <link rel="stylesheet" href="includes/paie.css">
</head>

<body>
    <?php
    include('includes/RhMenu.html');
    ?>
    <div class="container-xl mt-5">
        <div class="table-responsive">
            <div class="table-wrapper table-body">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>liste des réclamations</h2>
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
                                <td>Etat</td>
                                <td>transférer</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'connect.php';
                            if ($_SESSION['Cnx']['type'] == 1)
                                $result = $bdd->query("SELECT * FROM `reclamation`, `employee` WHERE reclamation.id_emp = employee.id_emp  AND reclamation.respo_destine='H'");

                            if ($_SESSION['Cnx']['type'] == 2)
                                $result = $bdd->query("SELECT * FROM `reclamation`, `employee` WHERE reclamation.id_emp = employee.id_emp  AND reclamation.respo_destine='P'");

                            $rowNum = 0; // Variable pour suivre le numéro de ligne actuel
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>
                            <td><img class="tabimg" src="uploads/' . $row['img_emp'] . '">' . $row['nom_emp'] . '</td>
                            <td>' . $row['prenom_emp'] . '</td>
                            <form  action="TraiterReclamation.php" method="post">
                            <td>
                                <p>' . $row['etat'] . '</p>
                                <input type="hidden" name="id_emp" value="' . $row["id_emp"] . '">
                                <input type="hidden" name="id_rec" value="' . $row["id_rec"] . '">
                                <input type="hidden" name="id_dest" value="' . $row["respo_destine"] . '">
                                <input type="submit" name="traiter" value="traiter">
                            </td>
                            </form>
                            <td>
                                <p id="err-' . $rowNum . '"></p>
                                <p id="ok-' . $rowNum . '"></p>
                                <form class="rec" method="post">
                                    <input type="hidden" name="id_rec" value="' . $row["id_rec"] . '">
                                    <input type="hidden" name="id_dest" value="' . $row["respo_destine"] . '">
                                    <input class="submit" type="submit" name="traiter" value="Transférer" onclick="transferer(event,' . $row["id_rec"] . ',' . $rowNum . ')">
                                </form>
                            </td>
                            
                            </tr>';
                                $rowNum++; // Incrémenter le numéro de ligne
                            }
                            ?>
                            </tr>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
    <script src="includes/search.js"></script>
    <script src="includes/RhReclamation.js"></script>
</body>

</html>