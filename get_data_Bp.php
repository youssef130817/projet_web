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
                <div class="main-content text-center">
                    <div class="warp-icon mb-4">
                        <span class="icon-lock2"></span>
                    </div>
                    <form action="paie.php" method="POST">
                        <h2><b>BULLETIN DE PAIE</b></h2>
                        <table border="solid 1px">
                            <thead>
                                <tr>
                                    <th>Nom societe :<input type="text" id="input-nomsoc" class="" name="nomsoc" readonly></th>
                                    <th>Adresse societe :<input type="text" id="input-adsoc" class="" name="adsoc" readonly></th>
                                </tr>
                                <tr>
                                    <th>Num cnss societe :<input type="text" id="input-cnsscos" class="" name="cnsscos" readonly></th>
                                    <th>Date paie : <!--code php --></th>
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
                                <td><input type="text" id="input-idemp" class="" name="idemp" readonly></td>
                                <td><input type="text" id="input-nomemp" class=""  readonly></td>
                                <td><input type="text" id="input-prenemp" class=""  readonly></td>
                                <td><input type="text" id="input-cinemp" class=""  readonly></td>
                                <td><input type="text" id="input-sfamemp" class=""  readonly></td>
                                <td><input type="text" id="input-nbreemp" class=""  readonly></td>
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
                                <td><input type="text" id="input-cnssemp" class="" readonly></td>
                                <td><input type="text" id="input-dnemp" class="" readonly></td>
                                <td><input type="text" id="input-modep" class="" readonly></td>
                                <td><input type="text" id="input-Anc" class=""  readonly></td>
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
                                            <td><input type='text' id='input-salbase' readonly></td>
                                            </tr>";
                                    $t=0;
                                    foreach($res as $r)
                                    {
                                        echo"<tr>
                                            <td>$r[id_rub]</td>
                                            <td>$r[libelle_rub]</td>
                                            <td>$r[type]</td>
                                            <td><input type='text' id='".$r['id_rub']."' readonly></td>
                                            </tr>";
                                        $t++;
                                    }
                                ?>
                            </tbody>
                        </table>
                        <label><h2>Salaire Net : </h2></label>
                        <input type='text' id='input-salnet' readonly>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-success" name=""> 
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            Valider 
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
