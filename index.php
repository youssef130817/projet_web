<?php
    session_start();
    include('connect.php');
    if(!isset($_SESSION['cmpt'])) $_SESSION['cmpt']=0;
    if(isset($_POST['cnx']))
    {
        $l=$_POST['email'];
        $p=$_POST['pass'];
        $req=$bdd->prepare("SELECT * from comptes WHERE login='$l' AND password='$p'");
        $req->execute();
        $result=$req->fetchAll(PDO::FETCH_ASSOC);
        if($req->rowCount()==1)
        {
            $_SESSION['Auth']=$l;
            unset($_SESSION['cmpt']);
            //header('location:');
        }
        else 
        {
            $e="err";
            $_SESSION['cmpt']++;
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
<body style="background-color: #D3D3D3;">
    <?php
        include('../projet_web/includes/menu.html');
    ?>
    <div class="row">
      <div class="col-md-8">
        <img src="../projet_web/images/img22.png" alt="" id="imgauth" style="position: absolute; top: 100px; left: 100px; width: 50%; height:100%;">
      </div>  
      <?php
        include('../projet_web/includes/form.html');
      ?> 
    </div>
</body>
<?php
    if(isset($e))
    {
        if($_SESSION['cmpt']==3) 
        {
            unset($_SESSION['cmpt']);
            header('location:reinit.php');
        }
        ?>
            <div>
                <p class="errauth">Verifiez vos coordonnées d'authentification!!</p>
            </div>
        <?php 
    }?>
    
</html>
