<?php

use LDAP\Result;

session_start();
require_once("connect.php");
$name = $_POST['numcni'];
$req = $bdd->prepare("SELECT * from employee WHERE cni_emp='$name' ");
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
if ($req->rowCount() == 1)
    echo "employée deja existe !!";
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
    $stm = $bdd->prepare("INSERT INTO employee (nom_emp,prenom_emp,adresse_emp,cni_emp,
        num_cnss_emp,num_cimr_emp,email_emp,situation_fam,nbr_enfants_emp,
        salaire_base_emp,date_naissance_emp,mode_paiement_emp,date_embauche_emp,
        poste_emp,img_emp) VALUES (:nom, :prenom, :adresse, :cni,:cnss,:cimr
        ,:email,:situationfam,:nbrenfant,:salaire,:daten,:modep,:dateemb,:poste, :pic)");
    $stm->bindParam(':nom', $_POST['nom']);
    $stm->bindParam(':prenom', $_POST['prenom']);
    $stm->bindParam(':adresse', $_POST['adresse']);
    $stm->bindParam(':cni', $_POST['numcni']);
    $stm->bindParam(':cnss', $_POST['numcnss']);
    $stm->bindParam(':cimr', $_POST['numcimr']);
    $stm->bindParam(':email', $_POST['email']);
    $stm->bindParam(':situationfam', $_POST['situation']);
    $stm->bindParam(':nbrenfant', $_POST['nbrenfant']);
    $stm->bindParam(':salaire', $_POST['salaire']);
    $stm->bindParam(':daten', $_POST['dateN']);
    $stm->bindParam(':modep', $_POST['mode']);
    $stm->bindParam(':dateemb', $_POST['dateEm']);
    $stm->bindParam(':poste', $_POST['poste']);
    $stm->bindParam(':pic', $file_name);
    $stm->execute();
    if ($stm->rowCount()) {
        $cni = $_POST['numcni'];
        $req = $bdd->prepare("SELECT * from employee WHERE cni_emp='$cni' ");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $pwd = $_POST['nom'] . "L-" . $result['id_emp'];
        $stm2 = $bdd->prepare("INSERT INTO comptes (id_emp,etat,username,motdepasse,type,id_ent)
         VALUES (:id,0, :usr, :pwd,:type,:id_ent)");
        $stm2->bindParam(':id', $result['id_emp']);
        $stm2->bindParam(':usr', $_POST['email']);
        $stm2->bindParam(':pwd', $pwd);
        $stm2->bindParam(':type', $_POST['type']);
        $stm2->bindParam(':id_ent', $_POST['selection']);
        $stm2->execute();
        $_SESSION['succes'] = "Ajouté avec succès!";
        echo "employée ajouté avec succès";
    } else  echo "employée n'est pas ajouté !!";
}
