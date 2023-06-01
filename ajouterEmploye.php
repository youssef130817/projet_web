<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="script.js"></script>
    <title>Ajouter Employé</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
  <?php
   //include('C:\wamp64\www\projet_web\includes\RhMenu.html');?> 
   <?php session_start();
   if (isset($_SESSION['succes'])):
              ?>
              <center>
                <div class="succes" align="center">
                  <?php 
                      echo $_SESSION['succes']; 
                      unset($_SESSION['succes']);
                        ?>
                        </div>
                        </center>
              <?php endif; ?>
    <form class="form-container" action="employetrait.php" method="POST">
      <h2>Ajouter Employé</h2>
      <input type="text" placeholder="Nom" name="nom" />
      <input type="text" placeholder="Prenom" name="prenom" />
      <input type="text" id="addres" placeholder="Adresse"name="adresse" />
      <input type="text" placeholder="CNI"name="numcni" />
      <input type="text" placeholder="Numéro CNSS"name="numcnss" />
      <input type="text" placeholder="CIMR" name="numcimr"/>
      <input type="text" placeholder="Email" name="email"/>
      <input type="text" placeholder="Situation Familiale" name="situation"/>
      <input type="text" placeholder="Nombre Enfants" name="nbrenfant"/>
      <input type="text" placeholder="Salaire de base" name="salaire"/>
      <input type="text" placeholder="Date naissance" name="dateN"/>
      <input type="text" placeholder="Mode paiment" name="mode"/>
      <input type="text" placeholder="Date embauche" name="dateEm"/>
      <input type="text" placeholder="Poste" name="poste"/>
      <button name="ajouter">Ajouter <i class="fa-solid fa-paper-plane"></i></button>
    </form>
    <footer>
      <a href="">XXXXXX</a>
    </footer>
  </body>
</html>