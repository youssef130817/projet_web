<?php
if (isset($_POST['ajouterent'])) {
    session_start();
    require("connect.php");

    $stm = $bdd->prepare("INSERT INTO entreprise (nom_ent, adresse_ent, num_cnss_ent) VALUES (:nom, :adresse, :numcnss)");
    $stm->bindParam(':nom', $_POST['noment']);
    $stm->bindParam(':adresse', $_POST['adresseent']);
    $stm->bindParam(':numcnss', $_POST['numcnssent']);
    $stm->execute();

    if ($stm->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        header("location:ajouterEntreprise.php");
    }
} else {
    header("location: ajouterEntreprise.php");
}
