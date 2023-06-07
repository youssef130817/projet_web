<?php
  session_start();
  include('connect.php');
  if(!isset($_SESSION['Auth'])) header('location:index.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="script.js"></script>
    <title>Ajouter Entreprise</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="includes/ajoutemp.css">

  </head>
  <body>
  <body>
  <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Informations de l'entreprise</h2>
                    <form method="POST" action="ajouter.php">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nom" name="noment">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Adresse" name="adresseent">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Numéro CNSS" name="numcnssent">
                        </div>
                        <div class="input-group">
                        <select name="selection" id="">
                    <?php
                $mareq=$bdd->prepare("SELECT DISTINCT groupe.Libelle_gr,groupe.id_groupe FROM groupe,entreprise WHERE entreprise.id_gr=groupe.id_groupe");
                $mareq->execute();
                $mareqresult=$mareq->fetchALL(PDO::FETCH_ASSOC);
                echo"<option value=''> Sans groupe </option>";
                foreach($mareqresult as $m)
                {
                  echo "<option value='".$m['groupe.id_groupe']."' >".$m['Libelle_gr']."</option>";
                }
              ?>
            </select>
                        </div>
                        
                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="Selectionner une image de l'entreprise" name="img">
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="ajouterent">Ajouter</button>
                        </div>
                        
            <!-- if($_GET['ent_ajoute'])
            {
              echo "<div><p>Entreprise ajoutée avec succés </p> <img src='Accepter.png' alt=''></div>";
            } -->
        
                    </form>
                </div>
            </div>
        </div>
    </div>

</html>