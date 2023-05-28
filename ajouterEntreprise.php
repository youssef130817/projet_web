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
  <?php
   // include('C:/wamp64/www/projet_web/includes/RhMenu.html');
  session_start();
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
    <form class="form-container" action="ajouter.php" method="POST">
      <h2>Ajouter Entreprise</h2>
      <input type="text" placeholder="Nom" name="nom" />
      <input type="text" id="addres" placeholder="Adresse"name="adresse" />
      <input type="text" placeholder="Numéro CNSS"name="numcnss" />
      <input type="text" placeholder="Type Entreprise" name="estmere"/>
      <button name="ajouter">Ajouter <i class="fa-solid fa-paper-plane"></i></button>
    </form>
    <footer>
      <a href="">XXXXXX</a>
    </footer>
  </body>
</html>