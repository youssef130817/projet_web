<?php
session_start();
include('connect.php');
if (!isset($_SESSION['cmpt'])) $_SESSION['cmpt'] = 0;
if (isset($_POST['log'])) {
    $l = $_POST['us'];
    $p = $_POST['pss'];
    $req = $bdd->prepare("SELECT * from comptes WHERE username='$l' AND motdepasse='$p'");
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
    if ($req->rowCount() == 1) {
        $req2 = $bdd->prepare("SELECT nom_emp FROM employee,comptes WHERE employee.id_emp = comptes.id_emp");
        // $result = $bdd->query("SELECT * FROM `conges`, `employe` WHERE conges.ID_EMP = employe.ID_EMP AND conges.STATUT_CONGES='$state'");
        $req2->execute();
        $res2 = $req2->fetch(PDO::FETCH_ASSOC);
        $_SESSION['Cnx'] = $result;
        $_SESSION['Auth'] = $res2;
        unset($_SESSION['cmpt']);
        //si l'utilisateur n a pas encore modifié le mdp
        if ($result['etat'] == '0') header('location:Reinitialiser.php/?name='.$l.'');
        else {
            if ($result['type'] == '0')  header('location:emp.php');
            if ($result['type'] == '1') header('location:RhLandingPage.php?');
            if ($result['type'] == '2') header('location:rp.php');
        }
    } else {
        $e = "err";
        $_SESSION['cmpt']++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="includes/style.css">

</head>

<body>
    <form class="form-container" method="POST" action="index.php">
        <h3>S'Authentifier</h3>
        <div class="form-grp">
            <label for="username">Email </label><br>
            <input type="email" name="us" placeholder="xxxxx@domain" id="user">
        </div>
        <div class="form-grp">
            <label for="password">mot de passe</label><br>
            <input type="password" name="pss" placeholder="********" id="pass">
            <p class="error"></p>
        </div>
        <div class="form-grp">
            <input type="submit" class="Entrer" name="log" value="Entrer">
        </div>
    </form>
    <img src="../projet_web/images/img22.png" alt="" id="imgauth">
    <!-- <script src="includes/infoverification.js"></script> -->
</body>
<?php
if (isset($e)) {
    if ($_SESSION['cmpt'] == 3)
    {
        unset($_SESSION['cmpt']);
        header('location:reinit.php');
    }
?>
<?php
} ?>

</html>