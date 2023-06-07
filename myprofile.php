<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profile</title>
</head>
<body>

<?php 
session_start();
if(isset($_SESSION['Auth']))
{
  require 'connect.php';
  $id=$_SESSION['Cnx']['id_emp'];
  $result = $bdd->prepare("SELECT * FROM employee WHERE id_emp =$id");
 // $stm->bindValue("id",$id, PDO::PARAM_STR);
  $result->execute();
  $row = $result->fetchAll(PDO::FETCH_ASSOC);
}
?>
 <div class="user-info">
                <img src="images/user.png">
                <h3><?php
                if (!isset($_SESSION['Auth'])) {
                    header('location: index.php');
                }
                echo "<p>Bonjour " . $_SESSION['Auth']['nom_emp'] . " </p>";
                ?></h3>
  </div>
  <div>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate assumenda
  </div> 
  <div>
    <a href="editProfile.php"><button><i class="fas fa-pen"></i>Editer</button></a>
    <a href="AjouterInfo.php"><button><i class="fas fa-plus"></i> Ajouter</button></a>
  </div>
  <div>
    <h2>Vos informations</h2>
    <?php foreach($row as $c):?>
    <div>
    <ul>
        <li>Nom :<?php echo $c['nom_emp'] ?></li>
        <li>Prénom :<?php echo $c['prenom_emp'] ?></li>
        <li>Adresse <?php echo $c['adresse_emp'] ?>:</li>
        <li>Cni :<?php echo $c['cni_emp'] ?></li>
        <li>Num Cnss :<?php echo $c['num_cnss_emp'] ?></li>
        <li>Num Cimr :<?php echo $c['num_cimr_emp'] ?></li>
        <li>Email :<?php echo $c['email_emp'] ?></li>
        <li>Situation Familiale :<?php echo $c['situation_fam'] ?></li>
        <li>Nombre des enfants:<?php echo $c['nbr_enfants_emp'] ?></li>
        <li>Date Naissance :<?php echo $c['date_naissance_emp'] ?></li>
        <li>Salaire de base:<?php echo $c['salaire_base_emp'] ?></li>
        <li>Date embauche :<?php echo $c['date_embauche_emp'] ?></li>
        <li>Mode de paiment :<?php echo $c['nom_emp'] ?></li>
        <li>Poste :<?php echo $c['poste_emp'] ?></li>
    </ul>
  </div>
  <?php endforeach ;?>
  </div>

</body>
</html>