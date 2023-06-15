
<?php
    session_start();
    include('connect.php');
    if(isset($_POST['ajouter']))
    {
        $n=$_POST['nom'];
        $p=$_POST['prenom'];
        $a=$_POST['adresse'];
        $c=$_POST['numcni'];
        $cnss=$_POST['numcnss'];
        $cimr=$_POST['numcimr'];
        $e=$_POST['email'];
        $sf=$_POST['situation'];
        $nbe=$_POST['nbrenfant'];
        $sal=$_POST['salaire'];
        $dn=$_POST['dateN'];
        $de=$_POST['dateEm'];
        $mp=$_POST['mode'];
        $pst=$_POST['poste'];
        $ent=$_POST['travailleent'];
        $ig=$_POST['img'];
        $req=$bdd->prepare("INSERT into employee values (NULL,'$n','$p','$a','$c','$cnss','$cimr','$e','$sf','$nbe','$sal','$dn','$de','$mp','$pst')");
        $req3=$bdd->prepare("SELECT  id_emp from employee where adresse_emp='$a'");
        $req->execute();
        $req3->execute();
        $res=$req3->fetch(PDO::FETCH_ASSOC);
        $id=$res['id_emp'];
        $req2=$bdd->prepare("INSERT INTO comptes values ('$id',1,'$e','$e',0,'$ent')");
        $req2->execute();
        header('location:ajouterEmploye.php');
    }
?>