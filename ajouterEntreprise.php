<?php
session_start();
include('connect.php');
if (!isset($_SESSION['Auth'])) header('location:index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

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
          <div class="card-body new">
            <h2 class="title">Informations de l'entreprise</h2>
            <form method="POST" action="ajouter.php" enctype="multipart/form-data">
              <div class="input-group">
                <input class="input--style-1" id="nom" type="text" placeholder="Nom" name="noment">
              </div>
              <div class="input-group">
                <input class="input--style-1" id="adresse" type="text" placeholder="Adresse" name="adresseent">
              </div>
              <div class="input-group">
                <input class="input--style-1" id="cnss" type="text" placeholder="Numéro CNSS" name="numcnssent">
              </div>
              <div class="input-group">
                <select name="selection" id="">
                  <?php
                  $mareq = $bdd->prepare("SELECT DISTINCT groupe.Libelle_gr,groupe.id_groupe FROM groupe,entreprise WHERE entreprise.id_gr=groupe.id_groupe");
                  $mareq->execute();
                  $mareqresult = $mareq->fetchALL(PDO::FETCH_ASSOC);
                  echo "<option value=''> Sans groupe </option>";
                  echo "<option value='m'> entreprise mére </option>";
                  foreach ($mareqresult as $m) {
                    echo "<option value='" . $m['id_groupe'] . "' >" . $m['Libelle_gr'] . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="input-group ">
                <input class="input--style-1" type="file" id="img" placeholder="Selectionner une image de l'entreprise" name="img">
              </div>
              <div class="error-txt"></div>
              <div class="success-txt"></div>
              <div class="p-t-20 button">
                <input type=submit class="btn btn--radius btn--green" name="ajouterent" value="Ajouter">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="includes/ajouterEnt.js"></script>
  </body>

</html>