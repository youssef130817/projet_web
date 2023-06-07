<?php
require 'connect.php';
if (isset($_POST["accepter"])) {
    $id = $_POST["idc"];
    $state = 'validé';
    $comment = $_POST['comment'];
    $req = $bdd->prepare("UPDATE `conges` set statut_cg='$state',commentaire='$comment ' WHERE id_cg='$id'");
    $req->execute();
    header('location: RhConge.php');
}
if (isset($_POST["reffuser"])) {
    $id = $_POST["idc"];
    $state = 'reffuser';
    $comment = $_POST['comment'];
    $req = $bdd->prepare("UPDATE `conges` set statut_cg='$state',commentaire='$comment ' WHERE id_cg='$id'");
    $req->execute();
    header('location: RhConge.php');
}
