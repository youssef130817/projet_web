<?php
require 'connect.php';
$idrec = $_POST['id'];
$dest = $_POST['id_dest'];
$result2 = $bdd->query("SELECT * FROM `reclamation` WHERE reclamation.respo_destine='$dest' AND reclamation.ID_REC='$idrec'");
$row2 = $result2->fetch(PDO::FETCH_ASSOC);
if ($row2['etat'] == 'traitée')
    echo "réclamation déja traité";
else {
    if ($dest == 1) $dest = 2;
    else
        $dest = 1;
    $result = $bdd->query("UPDATE `reclamation` SET `respo_destine` = '$dest' where id_rec='$idrec'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo "réclamation transférée";
}
