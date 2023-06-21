<?php
    session_start();
    include('connect.php');
    include('includes/RhMenu.html');

    if ($_SESSION['Cnx']['type'] != 2) {
        header('location: index.php');
    }
    if(isset($_POST['Valider']))
    {
        $entslct=$_POST['entaff'];
        $rub=$_POST['Rubaff'];
        $req=$bdd->prepare("SELECT * FROM calcul,rubrique where rubrique.libelle_rub='$rub' and calcul.id_ent='$entslct'
                            and calcul.id_rub=rubrique.id_rub");
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        if($req->rowCount()==0)
        { 
            $req4=$bdd->prepare("SELECT id_rub FROM rubrique where libelle_rub='$rub'");
            $req4->execute();
            $res2=$req4->fetch(PDO::FETCH_ASSOC);
            $id=$res2['id_rub'];
            if(strcmp($rub,"CNSS") == 0) $req3=$bdd->prepare("INSERT INTO calcul VALUES ($entslct,$id,'SB*0.0448')");
            else if(strcmp($rub,"IGR") == 0) $req3=$bdd->prepare("INSERT INTO calcul VALUES ($entslct,$id,'((SB-CNSS-AMO-FP)*TIR)-ABBAT')");
            else if(strcmp($rub,"AMO") == 0) $req3=$bdd->prepare("INSERT INTO calcul VALUES ($entslct,$id,'SB*0.0226')");
            $req3->execute();
        }
        else echo "<div style='color:red'>rubrique deja affecté a l entreprise</div>";
    }
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
    <form method="post" action="ajouterRub.php">
        <div class="page-wrapper p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h2 class="title">Nouvelle Rubrique de paie</h2>
                        <!-- <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Libelle rubrique" id="addnom" name="nomrub">
                        </div> -->
                        <!-- <div class="input-group">
                            <select name="typerub" class="form-select">
                                <option value="G">Gain</option>
                                <option value="R">Retenue</option>
                            </select>
                        </div> -->
                        <div class="input-group">
                            <select name="entaff" class="form-select" id="GR">
                                <?php
                                    $vr = $_SESSION['Cnx']['id_emp'];
                                    $req = $bdd->prepare("SELECT  entreprise.id_ent,entreprise.nom_ent,id_gr from comptes,entreprise where comptes.id_emp='$vr' and comptes.id_ent=entreprise.id_ent");
                                    $req->execute();
                                    $mareqresult = $req->fetch(PDO::FETCH_ASSOC);
                                    $vr2=$mareqresult['id_gr'];
                                    if(!$vr2) echo "<option value='".$mareqresult['id_ent']."' >".$mareqresult['nom_ent']."</option>";
                                    else
                                    {
                                        $req2=$bdd->prepare("SELECT id_ent,nom_ent from entreprise
                                                        where id_gr='$vr2'");
                                        $req2->execute();
                                        $mareqresult2=$req2->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($mareqresult2 as $mk) 
                                {
                                    echo "<option value='".$mk['id_ent']."' >".$mk['nom_ent']."</option>";
                                }
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="Regle">Regle de calcul : </label>
                            <label for="">Si vous voulez saisir une chaine de caractère, veillez utiliser la liste des choix multiples et le button +</label>
                        </div> -->
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" id="formulaInput" placeholder="Saisissez une formule">
                        </div> -->
                        <div class="input-group">
                            <select class="form-select" name="Rubaff">
                                <option selected disabled>Choisissez la rubrique à affecter</option>
                                <option value="CNSS">CNSS</option>
                                <option value="IGR">IGR</option>
                                <option value="AMO">AMO</option>
                                <!-- <option value="PI">Prime Imposable</option> -->
                                <!-- <option value="PNI">Prime Non Imposable</option> -->
                            </select>
                        </div>
                        <div id="formulaPreview"></div>
                        <div class="p-t-20">
                            <span>
                                <button class="btn btn--radius btn--green" type="submit" name="Valider">Valider</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<!-- <script src="traitrub.js"></script> -->

<!-- <script>
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
</script> -->
</html>