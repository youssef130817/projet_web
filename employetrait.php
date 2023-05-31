<?php
if (isset($_POST['ajouter'])) {
    session_start();
    require_once("connect.php");

    $stm = $bdd->prepare("INSERT INTO employe (NOM_EMP,PRENOM_EMP,ADRESSE_EMP,CNI_EMP,NUM_CNSS_EMP,NUM_CIMR_EMP,EMAIL_EMP,SITUATIONFAM_EMP,NBRENFANTS_EMP,SALAIRE_BASE_EMP,DATE_NAISSANCE_EMP,MODE_PAIEMENT_EMP,DATE_EMBACHE_EMP,POSTE_EMP) 
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
        header("location:ajouterEmploye.php");
    }
} else {
    header("location: ajouterEmploye.php");
}
?>
