<?php
include('connect.php');
if (isset($_POST['btn'])) {

    $npwd1 = $_POST['pwd1'];
    $npwd2 = $_POST['pwd2'];
    $login = $_GET['name'];
    if ($npwd1 == $npwd2) {
        $req = $bdd->prepare("UPDATE `comptes` set motdepasse='$npwd2',etat=1 WHERE username='$login'");
        $req->execute();
        header('location:http://localhost:8080/projet_web/index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../projet_web/css/bootstrap.css">
    <link rel="stylesheet" href="../projet_web/includes/style.css">
</head>



<body>
    <?php
    include('../projet_web/includes/menu.html');
    ?>
    <form action="" method="post">
        <div class="container w-75" id="Auth">
            <div class="card bg-light text-black shadow lg mb-5 " id="card">
                <div class="card-body text-center">
                    <h2>Rénitialisation de Mot de Passe</h2>
                    <div class="row my-3 ">
                        <div class="col-4">
                            <label class="col-form-label my-3" for="pwd" name="lab1">nouveau mot de
                                passe:</label>
                        </div>
                        <div class="col-8 my-3">
                            <input type="password" class=" form-control" placeholder="nouveau mot de passe" name="pwd1">
                        </div>

                    </div>
                    <div class="row my-3">
                        <div class="col-4">
                            <label class="col-form-label my-3" for="pwd" name="lab2">nouveau mot de
                                passe:</label>
                        </div>
                        <div class="col-8 my-3">
                            <input type="password" class=" form-control" placeholder="nouveau mot de passe" name="pwd2">
                        </div>

                    </div>
                    <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="btn">Rénitialiser</button>
                </div>
            </div>
        </div>
    </form>
    <?php include('footer.php'); ?>
</body>

</html>