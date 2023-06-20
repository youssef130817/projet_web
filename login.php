<?php
session_start();
include('connect.php');
// include('includes/RhMenu.html');
if (!isset($_SESSION['cmpt'])) $_SESSION['cmpt'] = 0;
//if (isset($_POST['log'])) {
$l = $_POST['us'];
$p = $_POST['pss'];
$req = $bdd->prepare("SELECT * from comptes WHERE username='$l' AND motdepasse='$p'");
$req->execute();
$result = $req->fetch(PDO::FETCH_ASSOC);
if ($req->rowCount() == 1) {
    $var = $result['id_emp'];
    $req2 = $bdd->prepare("SELECT nom_emp,img_emp FROM employee WHERE id_emp = '$var'");
    $req2->execute();
    $res2 = $req2->fetch(PDO::FETCH_ASSOC);
    $_SESSION['Cnx'] = $result;
    $_SESSION['Auth'] = $res2;
    unset($_SESSION['cmpt']);
    //si l'utilisateur n'a pas encore modifié le mdp
    if ($result['etat'] == '0') echo 'Reinitialiser.php/?name=' . $l . '';
    else {
        if ($result['type'] == '0')  echo 'espaceEmployer.php';
        if ($result['type'] == '1') echo 'RhLandingPage.php';
        if ($result['type'] == '2') echo 'espaceRP.php';
    }
} else {
    echo "ces informations n'est relatives à aucun compte !!";
    $e = "err";
    $_SESSION['cmpt']++;
}
//}
if (isset($e)) {
    if ($_SESSION['cmpt'] == 3) {
        unset($_SESSION['cmpt']);
        echo 'reinit.php';
    }
}
//okk