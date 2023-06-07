<?php
if (isset($_POST['modifier'])) {
    session_start();
    require_once("connect.php");
    $id=$_SESSION['Auth']['id_emp'];
$n=$_POST['nom'];
$p=$_POST['prenom'];
$e=$_POST['email'];
$a=$_POST['adresse'];
$d=$_POST['dateN'];
$m=$_POST['mode'];
$ps=$_POST['poste'];
    $stm = $bdd->prepare("UPDATE employe SET NOM_EMP=$n, PRENOM_EMP=$p,ADRESSE_EMP=$a,EMAIL_EMP=$a,DATE_NAISSANCE_EMP=$d,MODE_PAIEMENT_EMP=$m,POSTE_EMP=$p WHERE id_emp=$id");
    $stm->execute();
    if ($stm->rowCount()) {
        $_SESSION['succes'] = "Ajouté avec succès!";
        header("location:editProfile.php");
    }
} else {
    header("location: editProfile.php");
}