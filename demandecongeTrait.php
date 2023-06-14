<?php 
if (isset($_POST['ajouter'])) {
session_start();
  require 'connect.php';
  $id_emp=$_SESSION['Cnx']['id_emp'];
  $date_debut = $_POST['date_debut'];
  $date_fin = $_POST['date_fin'];
  $commentaire = $_POST['commentaire'];
  $sql = $bdd->prepare("INSERT INTO conges (id_emp, date_debut_cg, date_fin_cg, commentaire)
   VALUES (:idemp,:datedeb, :datefin,:cmnt)");
   $sql->bindParam(':idemp', $_SESSION['Cnx']['id_emp']);
   $sql->bindParam(':datedeb', $_POST['date_debut']);
   $sql->bindParam(':datefin', $_POST['date_fin']);
   $sql->bindParam(':cmnt', $_POST['commentaire']);
   $sql->execute();
   if ($sql->rowCount()) {
    $_SESSION['succes'] = "Ajouté avec succès!";
    header("location:espaceEmployer.php");
}
} else {
    header("location: demanderConge.php");
}
?>