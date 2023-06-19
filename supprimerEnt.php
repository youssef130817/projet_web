<?php
require("connect.php");
$id = $_POST['id_ent'];
$req = $bdd->prepare("DELETE FROM `entreprise` WHERE `entreprise`.`id_ent` = '$id'");
$req->execute();
header("location: visualiserEnt.php");
