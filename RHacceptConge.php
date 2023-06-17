<?php
require_once 'connect.php';
$id = $_POST["id"];
$state = 'Accepté';
$comment = $_POST['comment'];
$req = $bdd->prepare("UPDATE `conges` set statut_cg='$state',commentaire='$comment ' WHERE id_cg='$id'");
$req->execute();
echo "Accepté";
