<?php
    include('connect.php');
    if(isset($_GET['valslct']))
    {
        $vs=$_GET['valslct'];
        $req3=$bdd->prepare("SELECT * from employee,comptes where comptes.id_ent ='$vs' and comptes.id_emp=employee.id_emp");
        $req3->execute();
        $mareqresult3=$req3->fetchAll(PDO::FETCH_ASSOC);
        // if($req3->rowCount()==0) echo "<div style='color:red'>Bulletin de paie deja genérée pour le mois courant</div>";
    } 
?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Prenom</th>
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
                <td>
                    <select name="slc" id="sl44">
                    <option selected disabled>selectionner la date</option>
                    <?php
                        $re=$bdd->prepare("SELECT * from bulletin_paie where id_emp='$vs'");
                        $re->execute();
                        $m=$re->fetchAll(PDO::FETCH_ASSOC);
                        foreach($m as $p)
                        {
                            echo "<option value='".$p['date_paie']."' >".$p['date_paie']."</option>";
                        }
                    ?>
                    </select>
                <a href="#" class="settingsaff" onclick="Afficher()" title="Generer" data-toggle="modal"  
                        data-idemp=<?php echo $m['id_emp'];?>>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
		<?php }?>		
    </tbody>

<script>
    function Afficher()
{
    $(".settingsaff").click(function() {
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
</script>

