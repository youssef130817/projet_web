<?php 
if (isset($_POST['ajouter'])) {
session_start();
  require 'connect.php';
  $id_emp = $_SESSION['Cnx']['id_emp'];
  $sujet = $_POST['sujet'];
  $respo_destine = $_POST['respo_destine'];
  $sql = $bdd->prepare("INSERT INTO reclamation (id_emp, sujet, respo_destine)
   VALUES (:idemp,:sujet, :respo)");
   $sql->bindParam(':idemp', $_SESSION['Cnx']['id_emp']);
   $sql->bindParam(':sujet', $_POST['sujet']);
   $sql->bindParam(':respo', $_POST['respo_destine']);
   $sql->execute();
   if ($sql->rowCount()) {
    $_SESSION['succes'] = "Ajouté avec succès!";
    header("location:espaceEmployer.php");
}
} else {
    header("location: demanderConge.php");
}
?>