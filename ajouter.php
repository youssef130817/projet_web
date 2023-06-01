<?php
session_start();
include('connect.php');
if (isset($_POST['ajouterent'])) 
{
    $ne=$_POST['noment'];
    $adne=$_POST['adresseent'];
    $nmne=$_POST['numcnssent'];
    $gr=$_POST['selection'];
    if(!$gr) $gr=NULL;
    $stm = $bdd->prepare("INSERT INTO entreprise VALUES (NULL,'$gr','$ne','$adne','$nmne')");
    $stm->execute();
    if ($stm->rowCount()) 
    {
        $_SESSION['succes'] = "Ajouté avec succès!";
        header("location:ajouterEntreprise.php?ent_ajoute=1");
    }
} 
else header("location: ajouterEntreprise.php");

?>
