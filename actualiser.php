<?php
require 'connect.php';
if (isset($_POST["accepter"])) {
    $id = $_POST["idc"];
    $state = 'validé';
    $req = $bdd->prepare("UPDATE `conges` set STATUT_CONGES='$state' WHERE ID_EMP='$id'");
    $req->execute();
    header('location: RhConge.php');
}
if (isset($_POST["reffuser"])) {
    $id = $_POST["idc"];
    $state = 'reffuser';
    $req = $bdd->prepare("UPDATE `conges` set STATUT_CONGES='$state' WHERE ID_EMP='$id'");
    $req->execute();
    header('location: RhConge.php');
}
