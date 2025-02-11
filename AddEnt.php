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
    $grp = $_POST['selection'];
    if ($grp == 'm') {
        $stm2 = $bdd->prepare("INSERT INTO groupe (Libelle_gr) VALUES (:nom)");
        $stm2->bindParam(':nom', $_POST['noment']);
        $stm2->execute();
        $n = $_POST['noment'];
        $req2 = $bdd->prepare("SELECT * from groupe WHERE Libelle_gr='$n'  ");
        $req2->execute();
        $result2 = $req2->fetch(PDO::FETCH_ASSOC);
        $grp = $result2['id_groupe'];
    }
    if ($grp == '')
        $stm = $bdd->prepare("INSERT INTO entreprise (nom_ent,id_gr, adresse_ent, num_cnss_ent,img_ent) VALUES (:nom,NULL, :adresse, :numcnss, :picture)");
    else {
        $stm = $bdd->prepare("INSERT INTO entreprise (nom_ent,id_gr, adresse_ent, num_cnss_ent,img_ent) VALUES (:nom,:idgrp, :adresse, :numcnss, :picture)");
        $stm->bindParam(':idgrp', $grp);
    }

    $stm->bindParam(':nom', $_POST['noment']);
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
