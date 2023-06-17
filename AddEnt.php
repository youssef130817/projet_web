<?php
session_start();

require("connect.php");
$name = $_POST['noment'];
$req = $bdd->prepare("SELECT * from entreprise WHERE nom_ent='$name' ");
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
if ($req->rowCount() == 1)
    echo "entreprise deja existe !!";
else {
    $stm = $bdd->prepare("INSERT INTO entreprise (nom_ent, adresse_ent, num_cnss_ent) VALUES (:nom, :adresse, :numcnss)");
    $stm->bindParam(':nom', $_POST['noment']);
    $stm->bindParam(':adresse', $_POST['adresseent']);
    $stm->bindParam(':numcnss', $_POST['numcnssent']);
    $stm->execute();

    if ($stm->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        echo "entreprise ajoutée avec succès !!";
    } else
        echo "entreprise n'est pasajoutée !!";
}
