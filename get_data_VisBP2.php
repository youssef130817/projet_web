<?php
    include('connect.php');
    if ($_SESSION['Cnx']['type'] != 2) {
        header('location: index.php');
    }
    if(isset($_GET['idempforbp']))
    {
        $vs=$_GET['idempforbp'];
        $req3=$bdd->prepare("SELECT ");
        $req3->execute();
        $mareqresult3=$req3->fetchAll(PDO::FETCH_ASSOC);
        // if($req3->rowCount()==0) echo "<div style='color:red'>Bulletin de paie deja genérée pour le mois courant</div>";
    } 
?>

<!-- visualisation des bulletins de paie  -->