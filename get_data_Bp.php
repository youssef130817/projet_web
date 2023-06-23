
<?php
    include('connect.php');
    if(isset($_GET['valslct']))
    {
        $vs=$_GET['valslct'];
        $req3=$bdd->prepare("SELECT DISTINCT employee.id_emp,entreprise.nom_ent,entreprise.id_ent,num_cnss_emp,nom_emp,prenom_emp,adresse_emp,cni_emp,situation_fam,
                            entreprise.adresse_ent,nbr_enfants_emp,employee.salaire_base_emp,date_naissance_emp,mode_paiement_emp,poste_emp,entreprise.num_cnss_ent From employee,comptes,entreprise where
                            comptes.id_ent='$vs' and employee.id_emp=comptes.id_emp and entreprise.id_ent=comptes.id_ent and employee.id_emp Not in
                            (Select id_emp from bulletin_paie where MONTH(date_paie) = MONTH(CURRENT_DATE())
                            and YEAR(date_paie) = YEAR(CURRENT_DATE()))");
        $req3->execute();
        $mareqresult3=$req3->fetchAll(PDO::FETCH_ASSOC);
        if($req3->rowCount()==0) echo "<div style='color:red'>Bulletin de paie deja genérée pour le mois courant</div>";
    } 
    
    if(isset($_GET['Excel']))
    {
        $nomemp=$_POST['nomemp'];
        $data=array($nomemp=$_POST['nomemp']);
        Generer_Excel($data,$name);
    }
    function Generer_Excel($dt,$nm)
    {
        $NomF = $nm.".xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$NomF);
        $TitresColonnes = false;
        if(!empty($dt)) 
        {
            foreach($dt as $info) 
            {
                if(!$TitresColonnes) 
                {
                    echo implode("\t", array_keys($info)) . "\n";
                    $TitresColonnes = true;
                }
                echo implode("\t", array_values($info)) . "\n";
            }
        }
        exit();
    }
?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Code_Emp</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Cni</th>
            <th>Salaire de base</th>
            <th>Poste</th>
            <th>Action</th>
        </tr>        
    </thead>
    <tbody>
        <?php 
            foreach ($mareqresult3 as $m) 
			{?> 
            <tr>
                <td><?php echo $m['id_emp']?> </td>
                <td><?php echo $m['nom_emp']?></td>
                <td><?php echo $m['prenom_emp']?></td>                        
                <td><?php echo $m['adresse_emp']?></td>                        
                <td><?php echo $m['cni_emp']?></td>                        
                <td><?php echo $m['salaire_base_emp']?></td>                        
                <td><?php echo $m['poste_emp']?></td>                                               
                <td>
                    <a href="#" class="settings" onclick="Generer_Bp()" title="Generer" data-toggle="modal"  
                        data-idemp=<?php echo $m['id_emp'];?> data-nomsoc=<?php echo $m['nom_ent'];?> data-salaire=<?php echo $m['salaire_base_emp'];?>
                        data-adrsoc=<?php echo $m['adresse_ent'];?> data-cnsscos=<?php echo $m['num_cnss_ent'];?> data-nomemp=<?php echo $m['nom_emp'];?>
                        data-premp=<?php echo $m['prenom_emp'];?> data-cin=<?php echo $m['cni_emp'];?> data-sfam=<?php echo $m['situation_fam'];?>
                        data-cnssemp=<?php echo $m['num_cnss_emp'];?> data-daten=<?php echo $m['date_naissance_emp'];?> data-modep=<?php echo $m['mode_paiement_emp'];?>
                        data-nbrenf=<?php echo $m['nbr_enfants_emp'];?>>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
		<?php }?>		
    </tbody>
</table>
<div class="modal fade" id="BulletinPaie" tabindex="-1" role="dialog" aria-labelledby="ModifierModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content"  style="width:1500px; margin-left:-300px">
            <div class="modal-body">
            <div class="col-sm-7">
                <a class="btn btn-secondary" onclick="Excel()"><i class="material-icons">&#xE24D;</i> <span>Exporter en EXCEL</span></a>					
            </div>
                <div class="main-content text-center">
                    <div class="warp-icon mb-4">
                        <span class="icon-lock2"></span>
                    </div>
                    <form action="paie.php" method="POST" id="new">
                        <h2><b>BULLETIN DE PAIE</b></h2>
                        <table border="solid 1px">
                            <thead>
                                <tr>
                                    <th>Nom societe :<input type="text" id="input-nomsoc" class="" name="nomsoc" readonly></th>
                                    <th>Adresse societe :<input type="text" id="input-adsoc" class="" name="adsoc" readonly></th>
                                </tr>
                                <tr>
                                    <th>Num cnss societe :<input type="text" id="input-cnsscos" class="" name="cnsscos" readonly></th>
                                    <th>Date paie : 
                                        <?php  
                                            $dateCourante = date('m/Y');
                                            echo $dateCourante;
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <table border="solid 1px">
                            <tr>
                                <td>Matricule</td>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>CIN</td>
                                <td>S.Familiale</td>
                                <td>Nb.Enf</td>
                                <!-- <td>N.Ded</td> -->
                            </tr>
                            <tr>
                                <td><input type="text" id="input-idemp" name="idemp" readonly></td>
                                <td><input type="text" id="input-nomemp" name="nomemp"  readonly></td>
                                <td><input type="text" id="input-prenemp" name="prenemp"  readonly></td>
                                <td><input type="text" id="input-cinemp" name="cinemp"  readonly></td>
                                <td><input type="text" id="input-sfamemp" name="sfaemp"  readonly></td>
                                <td><input type="text" id="input-nbreemp" name="nbreemp"  readonly></td>
                            </tr>
                            <tr>
                                <td>CNSS</td>
                                <td>Date naissance</td>
                                <td>Mode de paiement</td>
                                <td>Ancienneté</td>
                                <!-- <td>T.Retraite</td> -->
                                <!-- <td>T.Mutuel</td> -->
                            </tr>
                            <tr>
                                <td><input type="text" id="input-cnssemp" name="cnssemp" readonly></td>
                                <td><input type="text" id="input-dnemp" name="dnemp" readonly></td>
                                <td><input type="text" id="input-modep" name="modp" readonly></td>
                                <!-- <td><input type="text" id="input-Anc"   readonly></td> -->
                                <!-- <td><input type="text" id="input-salbase" class=""  readonly></td> -->
                                
                                <!-- <td><input type="text" id="input-idemp" class="" name="idemp" readonly></td> -->
                                <!-- <td><input type="text" id="input-idemp" class="" name="idemp" readonly></td> -->
                            </tr>
                        </table>
                        <table border="solid 1px">
                            <thead>
                                <tr>
                                    <th>Code rubrique</th>
                                    <th>Libellé</th>
                                    <th>Type</th>
                                    <td>Montant</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $ident=$m['id_ent'];
                                    $mareq=$bdd->prepare("SELECT rubrique.id_rub,libelle_rub,rubrique.type,calcul.regle_de_calcul from rubrique,
                                                        calcul where calcul.id_ent='$ident' and calcul.id_rub=rubrique.id_rub");
                                    $mareq->execute();
                                    $res=$mareq->fetchAll(PDO::FETCH_ASSOC);
                                    echo"<tr>
                                            <td>0</td>
                                            <td>Salaire de base</td>
                                            <td>G</td>
                                            <td><input type='text' id='input-salbase' name='salbase' readonly></td>
                                            </tr>";
                                    $t=0;
                                    foreach($res as $r)
                                    {
                                        echo"<tr>
                                            <td>$r[id_rub]</td>
                                            <td>$r[libelle_rub]</td>
                                            <td>$r[type]</td>
                                            <td><input type='text' id='".$r['id_rub']."' name='".$r['id_rub']."' readonly></td>
                                            </tr>";
                                        $t++;
                                    }
                                ?>
                            </tbody>
                        </table>
                        <label><h2>Salaire Net : </h2></label>
                        <input type='text' id='input-salnet' readonly>
                        <div class="mx-auto">
                        <div class="col-sm-7">
                            <a class="btn btn-secondary" onclick="ValiderBp()">Valider</a>					
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script >
var nomsoc;
        var adsoc;
        var cnsscos; 
        var idemp; 
        var sbase; 
        var nomemp;
        var premp;
        var cin;
        var sfam;
        var cnssemp;
        var daten;
        var modep;
        var nbrenf;
        var date = new Date();
        var jour = date.getDate();
        var mois = date.getMonth() + 1; // Les mois commencent à partir de 0, donc on ajoute 1
        var annee = date.getFullYear();
        var moisAnnee =annee + '-' + mois + '/' + jour;
        var salnet;
function Generer_Bp()
{
    $(".settings").click(function() {
        nomsoc = $(this).data('nomsoc');
        adsoc = $(this).data('adrsoc');
        cnsscos = $(this).data('cnsscos'); 
        idemp=$(this).data('idemp'); 
        sbase=$(this).data('salaire'); 
        nomemp=$(this).data('nomemp'); 
        premp=$(this).data('premp'); 
        cin=$(this).data('cin'); 
        sfam=$(this).data('sfam'); 
        cnssemp=$(this).data('cnssemp'); 
        daten=$(this).data('daten'); 
        modep=$(this).data('modep'); 
        nbrenf=$(this).data('nbrenf'); 
        
        $("#input-nomsoc").val(nomsoc);
        $("#input-adsoc").val(adsoc);
        $("#input-cnsscos").val(cnsscos);
        $("#input-idemp").val(idemp);
        $("#input-salbase").val(sbase);
        $("#input-nomemp").val(nomemp);
        $("#input-prenemp").val(premp);
        $("#input-cinemp").val(cin);
        $("#input-sfamemp").val(sfam);
        $("#input-cnssemp").val(cnssemp);
        $("#input-dnemp").val(daten);
        $("#input-modep").val(modep);
        $("#input-nbreemp").val(nbrenf);
        
        


        var a=Calculer(1,sbase);
        var c=Calculer(3,sbase);
        var b=CalculerIGR(sbase,1,3);
         salnet=(sbase-a-b-c);
        $("#input-salnet").val(salnet)
        $("#1").val(a);
        $("#2").val(b);
        $("#3").val(c);
        $("#BulletinPaie").modal("show");
    });
}
        
        // var salnet=$("#input-salnet").val();
        const form =document.getElementById("new");
    console.log(form);
    function ValiderBp() 
    {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "traitBULLP.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) 
        {
            if (xhr.status === 200) 
            {
                let data = xhr.response;
                console.log(data);
            }
        }
    }
    let formData = new FormData(form);
    formData.append('idemp', idemp);
    formData.append('moisAnnee', moisAnnee);
    formData.append('salnet', salnet);
    xhr.send(formData);
}
</script>
</div>


