<?php
if (isset($_POST['ajouter'])) {
    session_start();
    require 'connect.php';
    $id_emp = $_SESSION['Cnx']['id_emp'];
    $type_jour = $_POST['type'];
    $nbr_heures = $_POST['nbr_heures'];
    $statut = "en attente";
    $sql = $bdd->prepare("INSERT INTO heures_supp (id_emp, type_jour, nbr_heures, statut) 
        VALUES (:idemp, :typej, :nbrhrs, :statut)");
    $sql->bindParam(':idemp', $_SESSION['Cnx']['id_emp']);
    $sql->bindParam(':typej', $type_jour);
    $sql->bindParam(':nbrhrs', $_POST['nbr_heures']);
    $sql->bindParam(':statut', $statut);
    $sql->execute();
    if ($sql->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        header("location: espaceEmployer.php");
    }
} else {
    header("location: declarerHS.php");
}
