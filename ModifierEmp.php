<?php
session_start();
include('connect.php');
include('includes/RhMenu.html');
if (!isset($_SESSION['Auth'])) {
    header('location:index.php');
} else {
    $id = $_POST['id_emp'];
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
    <link rel="stylesheet" href="includes/ajoutemp.css">
</head>

<body>
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body new">
                    <h2 class="title">Informations de l'employé</h2>
                    <form method="POST" action="ModEmp.php">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nom" name="nom" value="<?php echo $nom; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prenom" name="prenom" value="<?php echo $prenom; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Adresse" name="adresse" value="<?php echo $adresse; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="CNI" name="numcni" value="<?php echo $cni; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Numéro CNSS" name="numcnss" value="<?php echo $cnss; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Numéro CIMR" name="numcimr" value="<?php echo $cimr; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Email" name="email" value="<?php echo $email; ?>">
                        </div>

                        <div class="input-group">
                            <select name="situation" id="">
                                <option value="C" <?php if ($situation == 'C') echo 'selected'; ?>>célébataire</option>
                                <option value="M" <?php if ($situation == 'M') echo 'selected'; ?>>marié</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nombre Enfants" name="nbrenfant" value="<?php echo $nb_enfants; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Salaire de base" name="salaire" value="<?php echo $salaire_base; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="date" placeholder="Date naissance" name="dateN" value="<?php echo $date_naissance; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="date" placeholder="Date embauche" name="dateEm" value="<?php echo $date_embauche; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Mode paiment" name="mode" value="<?php echo $mode_paiment; ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Poste" name="poste" value="<?php echo $poste; ?>">
                        </div>
                        <div class="input-group">
                            <select name="entreprise" id="">
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
                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="Selectionner une photo de l'employé" name="img">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="error-txt"></div>
                        <div class="success-txt"></div>
                        <div class="p-t-20 button">
                            <button class="btn btn--radius btn--green" type="submit" name="ajouter">modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="includes/modifierEmp.js"></script>
</body>

</html>