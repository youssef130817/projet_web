<?php
require_once 'connect.php';
$id = $_POST["id"];
$state = 'Accepté';
$req = $bdd->prepare("UPDATE `absence` set status_abs='$state'  WHERE id_abs='$id'");
$req->execute();
echo "Accepté";
