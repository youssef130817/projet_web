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
    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['img'];
        $file_name = $file['name'];
        $file_path = $file['tmp_name'];
        // sauvegarder l'image selectionner dans le ficher uploads
        $destination_path = 'uploads/' . $file_name;
        move_uploaded_file($file_path, $destination_path);
    } else {
        $file_name = "aucun";
    }
    $stm = $bdd->prepare("INSERT INTO entreprise (nom_ent,id_gr, adresse_ent, num_cnss_ent,img_ent) VALUES (:nom,:idgrp, :adresse, :numcnss, :picture)");
    $stm->bindParam(':nom', $_POST['noment']);
    $stm->bindParam(':idgrp', $_POST['selection']);
    $stm->bindParam(':adresse', $_POST['adresseent']);
    $stm->bindParam(':numcnss', $_POST['numcnssent']);
    $stm->bindParam(':picture', $file_name);
    $stm->execute();

    if ($stm->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        echo "entreprise ajoutée avec succès !!";
    } else
        echo "entreprise n'est pasajoutée !!";
}
