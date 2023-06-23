<?php
require("connect.php");
$id = $_POST['id_emp'];
$req = $bdd->prepare("DELETE FROM `comptes` WHERE `comptes`.`id_emp` = '$id'");
$req->execute();
$req = $bdd->prepare("DELETE FROM `conges` WHERE `conges`.`id_emp` = '$id'");
$req->execute();
$req = $bdd->prepare("DELETE FROM `reclamation` WHERE `reclamation`.`id_emp` = '$id'");
$req->execute();
$req = $bdd->prepare("DELETE FROM `absence` WHERE `absence`.`id_emp` = '$id'");
$req->execute();
$req = $bdd->prepare("DELETE FROM `heures_supp` WHERE `heures_supp`.`id_emp` = '$id'");
$req->execute();
$req = $bdd->prepare("DELETE FROM `bulletin_paie` WHERE `bulletin_paie`.`id_emp` = '$id'");
$req->execute();
$req = $bdd->prepare("DELETE FROM `employee` WHERE `employee`.`id_emp` = '$id'");
$req->execute();
header("location: visualiserEmp.php");
