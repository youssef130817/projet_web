<?php
require("connect.php");
$id = $_POST['id_emp'];
$req = $bdd->prepare("DELETE FROM `comptes` WHERE `comptes`.`id_emp` = '$id'");
$req->execute();
$req = $bdd->prepare("DELETE FROM `employee` WHERE `employee`.`id_emp` = '$id'");
$req->execute();
header("location: visualiserEmp.php");
