<?php
session_start();

require("connect.php");
$id = $_POST['id'];
$nom = $_POST['noment'];
$adresse = $_POST['adresseent'];
$cnss = $_POST['numcnssent'];
$groupe = $_POST['selection'];

if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['img'];
    $img = $file['name'];
    $file_path = $file['tmp_name'];
    // sauvegarder l'image selectionner dans le ficher uploads
    $destination_path = 'uploads/' . $img;
    move_uploaded_file($file_path, $destination_path);
    if ($groupe == '')
        $req = $bdd->prepare("UPDATE `entreprise` SET `nom_ent` = '$nom', `adresse_ent` = '$adresse', `num_cnss_ent` = '$cnss',`img_ent` = '$img', `id_gr` = NULL WHERE `entreprise`.`id_ent` = '$id'");
    else
        $req = $bdd->prepare("UPDATE `entreprise` SET `nom_ent` = '$nom', `adresse_ent` = '$adresse', `num_cnss_ent` = '$cnss',`img_ent` = '$img', `id_gr` = '$groupe' WHERE `entreprise`.`id_ent` = '$id'");
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
} else {
    if ($groupe == '')
        $req = $bdd->prepare("UPDATE `entreprise` SET `nom_ent` = '$nom', `adresse_ent` = '$adresse', `num_cnss_ent` = '$cnss', `id_gr` = NULL WHERE `entreprise`.`id_ent` = '$id'");
    else
        $req = $bdd->prepare("UPDATE `entreprise` SET `nom_ent` = '$nom', `adresse_ent` = '$adresse', `num_cnss_ent` = '$cnss', `id_gr` = '$groupe' WHERE `entreprise`.`id_ent` = '$id'");
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
}
echo "information modifiés ";
