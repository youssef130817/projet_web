<?php
session_start();
include('connect.php');
if (!isset($_SESSION['cmpt'])) $_SESSION['cmpt'] = 0;
if (isset($_POST['login'])) {
    $l = $_POST['username'];
    $p = $_POST['password'];
    $req = $bdd->prepare("SELECT * from comptes WHERE login='$l' AND password='$p'");
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);
    if ($req->rowCount() == 1) {
        $_SESSION['Auth'] = $l;
        unset($_SESSION['cmpt']);
        //header('location:');
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
    <form class="form-container">
        <h3>S'Authentifier</h3>
        <div class="form-grp">
            <label for="username">Email </label><br>
            <input type="email" name="username" placeholder="xxxxx@domain" id="user">
        </div>
        <div class="form-grp">
            <label for="password">mot de pass </label><br>
            <input type="password" name="password" placeholder="********" id="pass">
            <p class="error"></p>
        </div>
        <div class="form-grp">
            <input type="submit" class="Entrer" name="login" value="Entrer">
        </div>
    </form>
    <img src="../projet_web/images/img22.png" alt="" id="imgauth">
    <script src="includes/infoverification.js"></script>
</body>
<?php
if (isset($e)) {
    if ($_SESSION['cmpt'] == 3) {
        unset($_SESSION['cmpt']);
        header('location:reinit.php');
    }
?>
<?php
} ?>

</html>