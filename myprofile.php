<?php
session_start();
include('connect.php');
include('includes/RhMenu.html');
if (!isset($_SESSION['Auth'])) {
  header('location:index.php');
} else {
  $id = $_SESSION['Cnx']['id_emp'];
  $req = $bdd->prepare("SELECT * from employee WHERE id_emp='$id' ");
  $req->execute();
  $result = $req->fetch(PDO::FETCH_ASSOC);
  $nom = $result['nom_emp'];
  $prenom = $result['prenom_emp'];
  $cni = $result['cni_emp'];
  $adresse = $result['adresse_emp'];
  $email = $result['email_emp'];
  $cimr = $result['num_cimr_emp'];
  $cnss = $result['num_cnss_emp'];
  $situation = $result['situation_fam'];
  $nb_enfants = $result['nbr_enfants_emp'];
  $salaire_base = $result['salaire_base_emp'];
  $date_naissance = $result['date_naissance_emp'];
  $date_embauche = $result['date_embauche_emp'];
  $mode_paiment = $result['mode_paiement_emp'];
  $poste = $result['poste_emp'];
  $img = $result['img_emp'];
  $result2 = $bdd->query("SELECT * FROM `entreprise`,`comptes` where comptes.id_emp='$id' and comptes.id_ent=entreprise.id_ent");
  $row2 = $result2->fetch(PDO::FETCH_ASSOC);
  $nom_ent = $row2['nom_ent'];
  $id_ent = $row2['id_ent'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="profileCss.css" />
</head>

<body>
<h2 class="title"></h2>
  <div class="container">        
 <form method="POST" action="ModEmp.php">
<table width=100% >
  <tr>
    <th colspan="2" ><?php echo '<img class="tabimg" src="uploads/' . $img . '">'; ?></th> 
  </tr>

  <tr> 
    <td> 
      <div class="input-group">
      <label for="nom">Nom:</label>
              <input class="input--style-1" type="text" placeholder="Nom" name="nom" value="<?php echo $nom; ?>" required>
            </div>
    </td> 
    <td> 
      <div class="input-group">
      <label for="prenom">Prenom:</label>
              <input class="input--style-1" type="text" placeholder="Prenom" name="prenom" value="<?php echo $nom; ?>" required>
            </div>
    </td> 

  </tr>
  <tr>
    <td>
      <div class="input-group">
     <label for="adresse">Adresse :</label>
              <input class="input--style-1" type="text" placeholder="Adresse" name="adresse" value="<?php echo $adresse; ?>" required>
            </div>
    </td>
    <td>
      <div class="input-group">
     <label for="numcni">CNI :                 </label>
              <input class="input--style-1" type="text" placeholder="CNI" name="numcni" value="<?php echo $cni; ?>" required>
            </div>
    </td>
  </tr>
  <tr>
    <td>
    <div class="input-group">
     <label for="numcnss">CNSS :               </label>
              <input class="input--style-1" type="text" placeholder="Numéro CNSS" name="numcnss" value="<?php echo $cnss; ?>" required>
            </div>
     </td>  
    <td>
    <div class="input-group">
     <label for="numcimr">CIMR :               </label>
              <input class="input--style-1" type="text" placeholder="Numéro CIMR" name="numcimr" value="<?php echo $cimr; ?>" required>
            </div>
    </td>
    </tr>
  <tr>
   <td>
       <div class="input-group">
     <label for="email">Email :                </label>
              <input class="input--style-1" type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
</td>
    <td>  
       <div class="input-group">
     <label for="nbrenfant">Nombres enfants :  </label>
              <input class="input--style-1" type="text" placeholder="Nombre Enfants" name="nbrenfant" value="<?php echo $nb_enfants; ?>" required>
            </div>
      </td>
  </tr>
  <tr>
    <td>  
       <div class="input-group">
     <label for="salaire">Salaire de Base :    </label>
              <input class="input--style-1" type="text" placeholder="Salaire de base" name="salaire" value="<?php echo $salaire_base; ?>" required>
            </div>
   </td>
  <td>
     <div class="input-group">
     <label for="situation">Situation  :       </label>
              <select name="situation" id="" required>
                <option class="st" value="C" <?php if ($situation == 'C') echo 'selected'; ?>>célébataire</option>
                <option class="st" value="M" <?php if ($situation == 'M') echo 'selected'; ?>>marié</option>
              </select>
     </div>
   </td>
</tr>
<tr>
  <td>  
    <div class="input-group">
     <label for="dateN">Date naissance :       </label>
              <input class="input--style-1" type="date" placeholder="Date naissance" name="dateN" value="<?php echo $date_naissance; ?>" required>
            </div>
  </td>
  <td>
  <div class="input-group">
     <label for="entreprise">Entreprise :      </label>
              <select name="entreprise" id="" required>
                <?php
                $mareq = $bdd->prepare("SELECT * FROM entreprise");
                $mareq->execute();
                $mareqresult = $mareq->fetchAll(PDO::FETCH_ASSOC);
                foreach ($mareqresult as $m) {
                  if ($m['id_ent'] == $id_ent) {
                    echo "<option value='" . $m['id_ent'] . "' selected>" . $m['nom_ent'] . "</option>";
                  } else {
                    echo "<option value='" . $m['id_ent'] . "'>" . $m['nom_ent'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
  </td>
</tr>
<tr>
  <td>  
     <div class="input-group">
     <label for="dateEm">Date embauche :       </label>
              <input class="input--style-1" type="date" placeholder="Date embauche" name="dateEm" value="<?php echo $date_embauche; ?>" required>
            </div>
  </td>
  <td>
           <div class="input-group">
     <label for="mode">Mode :                  </label>
              <input class="input--style-1" type="text" placeholder="Mode paiment" name="mode" value="<?php echo $mode_paiment; ?>" required>
            </div>
  </td>
</tr>
<tr>
  <td>
           <div class="input-group">
     <label for="poste">Poste :                </label>
              <input class="input--style-1" type="text" placeholder="Poste" name="poste" value="<?php echo $poste; ?>" required>
            </div>
   </td>
  <td>
  <div class="input-group">
     <label for="img">Image :                  </label>
              <input class="input--style-1" type="file" placeholder="Selectionner une photo de l'employé" name="img" required>
            </div>
  </td>
</tr>
<tr>
  <td colspan="2">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="error-txt"></div>
            <div class="success-txt"></div>
            <div class="p-t-20 button">
              <button class="btn" type="submit" name="ajouter">Modifier</button>
            </div>
  </td>
</tr>
</table>   
          </form>
        <div class="drop drop-1"></div>
  <div class="drop drop-2"></div>
  <div class="drop drop-3"></div>
  <div class="drop drop-4"></div>
  <div class="drop drop-5"></div>
</div>
  <script src="includes/modifierEmp.js"></script>       

    
</body>

</html>