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
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <form class="form-container" action="ajouter.php" method="POST">
      <h2>Ajouter Entreprise</h2>  
      <table>
        <tr>
          <input type="text" placeholder="Nom" name="noment" />
        </tr>
        <tr>
        <input type="text" id="addres" placeholder="Adresse"name="adresseent" />
        </tr>
        <tr>
        <input type="text" placeholder="Numéro CNSS"name="numcnssent" />
        </tr>
        <tr>
          <td>Groupe</td>
          <td>
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
          </td>
        </tr>
        <tr>
          <button name="ajouterent"> Ajouter <i class="fa-solid fa-paper-plane"></i></button>
        </tr>
        <?php
            if($_GET['ent_ajoute'])
            {
              echo "<div><p>Entreprise ajoutée avec succés </p> <img src='Accepter.png' alt=''></div>";
            }
        ?>
      </table>
      
      <!-- <input type="text" placeholder="Type Entreprise" name="estmere"/> -->
      
    </form>
    <!-- <footer>
      <a href="">XXXXXX</a>
    </footer> -->
  </body>
</html>