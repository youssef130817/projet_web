<?php
    session_start();
    include('connect.php');
    include('includes/RhMenu.html');
    if(!isset($_SESSION['RP'])) header('location:index.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="includes/ajouterRub.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form method="post">    
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Nouvelle Rubrique de paie</h2>
                    
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Libelle rubrique" id="addnom" name="nomrub">
                        </div>
                        <div class="input-group">
                            <select name="typerub" class="form-select">
                                <option value="G">Gain</option>
                                <option value="R">Retenue</option>
                            </select>
                        </div>
                        <div class="input-group">
                        <select name="entaff" class="form-select" id="GR">
                        <?php
                                $vr=$_SESSION['Cnx']['id_emp'];
                                $req=$bdd->prepare("SELECT id_ent from comptes where id_emp='$vr'");
                                $req->execute();
                                $mareqresult=$req->fetch(PDO::FETCH_ASSOC);
                                if($req->rowCount()==1)
                                {
                                    $vr2=$mareqresult['id_ent'];
                                    $req2=$bdd->prepare("SELECT nom_ent,id_ent from entreprise where id_ent='$vr2'");
                                    $req2->execute();
                                    $rr=$req2->fetch(PDO::FETCH_ASSOC);
                                    echo "<option value='".$rr['id_ent']."' >".$rr['nom_ent']."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Regle">Regle de calcul : </label>
                            <label for="">Si vous voulez saisir une chaine de caractère, veillez utiliser la liste des choix multiples et le button +</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="formulaInput" placeholder="Saisissez une formule">
                        </div>
                        <div class="input-group">
                                <select class="form-select" id="formulaChoices" >
                                    <option selected disabled>Caractère/Chaine de caracts</option>
                                    <option value="SB">Salaire de base</option>
                                    <option value="SN">Salaire Net</option>
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                    <option value="*">*</option>
                                    <option value="/">/</option> 
                                    <option value="(">(</option>
                                    <option value=")">)</option>
                                </select>
                                <button class="btn btn--radius btn--green" id="addChoiceBtn"><i class="fa fa-plus"></i></button>
                            </div>
                        <div id="formulaPreview"></div>
                        <div class="p-t-20">
                            <span>
                                <button class="btn btn--radius btn--green" type="submit" onclick="AjouterRub()" name="Valider">Valider</button>
                            </span>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
<script src="traitrub.js"></script>
<script>
    var formulaInput = document.getElementById('formulaInput');
var formulaChoices = document.getElementById('formulaChoices');
var addChoiceBtn = document.getElementById('addChoiceBtn');

addChoiceBtn.addEventListener('click', function() {
  var selectedOption = formulaChoices.value;
  var cursorPosition = formulaInput.selectionStart;
  var formulaText = formulaInput.value;

  var formulaPart = selectedOption === 'other' ? '{valeur}' : selectedOption;
  var updatedFormula = formulaText.slice(0, cursorPosition) + formulaPart + formulaText.slice(cursorPosition);
  
  formulaInput.value = updatedFormula;
  formulaInput.focus();
});

formulaInput.addEventListener('input', function() {
  formulaPreview.textContent = formulaInput.value;
});

formulaChoices.addEventListener('change', function() {
  addChoiceBtn.disabled = formulaChoices.value === '';
});

formulaInput.addEventListener('keyup', function(event) {
  if (event.key === 'Entrée') {
    event.preventDefault();
  }
});

</script>
</html>