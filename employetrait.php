<?php
session_start();
require_once("connect.php");
$name = $_POST['numcni'];
$req = $bdd->prepare("SELECT * from employee WHERE cni_emp='$name' ");
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
if ($req->rowCount() == 1)
    echo "employée deja existe !!";
else {
    $stm = $bdd->prepare("INSERT INTO employee (nom_emp,prenom_emp,adresse_emp,cni_emp,num_cnss_emp,num_cimr_emp,email_emp,situation_fam,nbr_enfants_emp,salaire_base_emp,date_naissance_emp,mode_paiement_emp,date_embauche_emp,poste_emp) 
    VALUES (:nom, :prenom, :adresse, :cni,:cnss,:cimr,:email,:situationfam,:nbrenfant,:salaire,:daten,:modep,:dateemb,:poste)");
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
    $stm->execute();
    if ($stm->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        echo "employée ajouté avec succès";
    } else  echo "employée n'est pas ajouté !!";
}
