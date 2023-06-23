<?php
if (isset($_POST['ajouter'])) {
    session_start();
    require 'connect.php';
    if (isset($_POST['id']))
        $id_emp = $_POST['id'];
    else
        $id_emp = $_SESSION['Cnx']['id_emp'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $nbr = $_POST['nbr_heures'];
    if ($_SESSION['Cnx']['type'] == 1)
        $etat = "Accepté";
    else
        $etat = "en attente";

    $sql = $bdd->prepare("INSERT INTO absence (id_emp, date_debut_abs, date_fin_abs, nbr_heures,status_abs)
   VALUES (:idemp,:datedeb, :datefin,:nbr,:et)");
    $sql->bindParam(':idemp',  $id_emp);
    $sql->bindParam(':datedeb', $_POST['date_debut']);
    $sql->bindParam(':datefin', $_POST['date_fin']);
    $sql->bindParam(':nbr', $_POST['nbr_heures']);
    $sql->bindParam(':et', $etat);
    $sql->execute();
    if ($sql->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        header("location:espaceEmployer.php");
    }
} else {
    header("location: demanderConge.php");
}
