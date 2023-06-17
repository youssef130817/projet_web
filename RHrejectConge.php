<?php
require 'connect.php';
$id = $_POST["id"];
$state = 'Reffusé';
$comment = $_POST['comment'];
$req = $bdd->prepare("UPDATE `conges` set statut_cg='$state',commentaire='$comment ' WHERE id_cg='$id'");
$req->execute();
echo "Reffusé";
