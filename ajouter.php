<?php
if (isset($_POST['ajouter'])) {
    session_start();
    require("connect.php");

    $stm = $bdd->prepare("INSERT INTO entreprise (NOM_ENT, ADRESSE_ENT, NUM_CNSS_ENT, ESTMERE) VALUES (:nom, :adresse, :numcnss, :estmere)");
    $stm->bindParam(':nom', $_POST['nom']);
    $stm->bindParam(':adresse', $_POST['adresse']);
    $stm->bindParam(':numcnss', $_POST['numcnss']);
    $stm->bindParam(':estmere', $_POST['estmere']);
    $stm->execute();

    if ($stm->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        header("location:ajouterEntreprise.php");
    }
} else {
    header("location: ajouterEntreprise.php");
}
