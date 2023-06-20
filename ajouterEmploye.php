<?php
session_start();
include('connect.php');
include('includes/RhMenu.html');
if ($_SESSION['Cnx']['type'] !== 1)
    header('location: index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="includes/ajoutemp.css">
</head>

<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body new">
                    <h2 class="title">Informations de l'employé</h2>
                    <form method="POST" action="employetrait.php" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nom" name="nom">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prenom" name="prenom">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Adresse" name="adresse">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="CNI" name="numcni">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Numéro CNSS" name="numcnss">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Numéro CIMR" name="numcimr">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Email" name="email">
                        </div>

                        <div class="input-group">
                            <select name="situation" id="">
                                <option>célébataire</option>
                                <option>marié</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nombre Enfants" name="nbrenfant">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Salaire de base" name="salaire">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="date" placeholder="Date naissance" name="dateN">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="date" placeholder="Date embauche" name="dateEm">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Mode paiment" name="mode">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Poste" name="poste">
                        </div>
                        <div class="input-group">
                            <select name="selection" id="">
                                <?php
                                $mareq = $bdd->prepare("SELECT * FROM entreprise");
                                $mareq->execute();
                                $mareqresult = $mareq->fetchALL(PDO::FETCH_ASSOC);
                                foreach ($mareqresult as $m) {
                                    echo "<option value='" . $m['id_ent'] . "' >" . $m['nom_ent'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <select name="type" id="" required>
                                <option value="0">other</option>
                                <option value="1">RH</option>
                                <option value="2">RP</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="Selectionner une photo de l'employé" name="img">
                        </div>
                        <div class="error-txt"></div>
                        <div class="success-txt"></div>
                        <div class="p-t-20 button">
                            <button class="btn btn--radius btn--green" type="submit" name="ajouter">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include('footer.html'); ?>
    </footer>
    <script src="includes/ajouterEmp.js"></script>
</body>

</html>