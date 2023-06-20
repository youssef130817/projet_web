<?php
session_start();
include('connect.php');
if (!isset($_SESSION['RH'])) header('location:index.php');
else {
    $id = $_POST['id_ent'];
    $req = $bdd->prepare("SELECT * from entreprise WHERE id_ent='$id' ");
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $name = $result['nom_ent'];
    $adresse = $result['adresse_ent'];
    $cnss = $result['num_cnss_ent'];
    $groupe = $result['id_gr'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Ajouter Entreprise</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="includes/ajoutemp.css">

</head>

<body>

    <body>
        <div class="page-wrapper p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body new">
                        <h2 class="title">Informations de l'entreprise</h2>
                        <form action="ModEnt.php" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <input class="input--style-1" id="nom" type="text" placeholder="Nom" name="noment" value="<?php echo $name; ?>">
                            </div>
                            <div class="input-group">
                                <input class="input--style-1" id="adresse" type="text" placeholder="Adresse" name="adresseent" value="<?php echo $adresse; ?>">
                            </div>
                            <div class="input-group">
                                <input class="input--style-1" id="cnss" type="text" placeholder="Numéro CNSS" name="numcnssent" value="<?php echo $cnss; ?>">
                            </div>
                            <div class="input-group">
                                <select name="selection" id="">
                                    <?php
                                    $mareq = $bdd->prepare("SELECT DISTINCT groupe.Libelle_gr,groupe.id_groupe FROM groupe,entreprise WHERE entreprise.id_gr=groupe.id_groupe");
                                    $mareq->execute();
                                    $mareqresult = $mareq->fetchALL(PDO::FETCH_ASSOC);
                                    echo "<option value=''> Sans groupe </option>";
                                    foreach ($mareqresult as $m) {
                                        if ($m['id_groupe'] == $groupe) {
                                            // This is the current groupe of the entreprise
                                            // Pre-select this option
                                            echo "<option value='" . $m['id_groupe'] . "' selected>" . $m['Libelle_gr'] . "</option>";
                                        } else {
                                            echo "<option value='" . $m['id_groupe'] . "'>" . $m['Libelle_gr'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="input-group ">
                                <input class="input--style-1" type="file" id="img" placeholder="Selectionner une image de l'entreprise" name="img">
                            </div>
                            <div class="error-txt"></div>
                            <div class="success-txt"></div>
                            <div class="p-t-20 button">
                                <input type=submit class="btn btn--radius btn--green" name="ajouterent" value="Modifier">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer id="footer">
            <?php
                include('footer.html');
            ?>
</footer>
        <script src="includes/modifierEnt.js"></script>
    </body>

</html>