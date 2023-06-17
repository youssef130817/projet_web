<?php
require 'connect.php';
$id = $_POST["id"];
$reponse = $_POST['comment'];
$req = $bdd->prepare("SELECT * from `reclamation` WHERE id_rec='$id' and etat ='traitée' ");
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
if ($req->rowCount() == 1)
    echo "réclamation deja traitée !!";
else {
    $req = $bdd->prepare("UPDATE `reclamation` set reponse='$reponse',etat='traitée' WHERE id_rec='$id'");
    $req->execute();
    echo "Traitée";
}
