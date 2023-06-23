<?php
include('connect.php');
    $id=$_POST['idemp'];
    $d=$_POST['moisAnnee'];
    $s=$_POST['salnet'];
    $req=$bdd->prepare("INSERT INTO bulletin_paie VALUES (NULL,'$id','$d','$s')");
    $req->execute();
?>