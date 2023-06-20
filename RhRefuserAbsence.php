<?php
require 'connect.php';
$id = $_POST["id"];
$state = 'Reffusé';
$req = $bdd->prepare("UPDATE `absence` set status_abs='$state' WHERE id_abs='$id'");
$req->execute();
echo "Reffusé";
