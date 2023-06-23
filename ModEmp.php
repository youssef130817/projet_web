<?php
session_start();
require("connect.php");
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$cni = $_POST['numcni'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$cimr = $_POST['numcimr'];
$cnss = $_POST['numcnss'];
$situation = $_POST['situation'];
$nb_enfants = $_POST['nbrenfant'];
$salaire_base = $_POST['salaire'];
$date_naissance = $_POST['dateN'];
$date_embauche = $_POST['dateEm'];
$mode_paiment = $_POST['mode'];
$poste = $_POST['poste'];
$id_ent = $_POST['entreprise'];
$req = $bdd->prepare("UPDATE `comptes` SET `id_ent` = '$id_ent' where id_emp='$id'");
$req->execute();
if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['img'];
    $img = $file['name'];
    $file_path = $file['tmp_name'];
    // sauvegarder l'image selectionner dans le ficher uploads
    $destination_path = 'uploads/' . $img;
    move_uploaded_file($file_path, $destination_path);
    $req = $bdd->prepare("UPDATE `employee` SET `nom_emp` = '$nom',
         `adresse_emp` = '$adresse',`prenom_emp` = '$prenom',`cni_emp` = '$cni',
         `num_cnss_emp` = '$cnss',`num_cimr_emp` = '$cimr',`email_emp` = '$email',`situation_fam` = '$situation',
         `nbr_enfants_emp` = '$nb_enfants',`salaire_base_emp` = '$salaire_base',`date_naissance_emp` = '$date_naissance',
         `mode_paiement_emp` = '$mode_paiment',`date_embauche_emp` = '$date_embauche',`poste_emp` = '$poste',`img_emp` = '$img'
         where id_emp='$id'");
    $req->execute();
} else {
    $req = $bdd->prepare("UPDATE `employee` SET `nom_emp` = '$nom',
        `adresse_emp` = '$adresse',`prenom_emp` = '$prenom',`cni_emp` = '$cni',
        `num_cnss_emp` = '$cnss',`num_cimr_emp` = '$cimr',`email_emp` = '$email',`situation_fam` = '$situation',
        `nbr_enfants_emp` = '$nb_enfants',`salaire_base_emp` = '$salaire_base',`date_naissance_emp` = '$date_naissance',
        `mode_paiement_emp` = '$mode_paiment',`date_embauche_emp` = '$date_embauche',`poste_emp` = '$poste'
        where id_emp='$id'");
    $req->execute();
}

echo "information modifiés";
