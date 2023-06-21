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
                <button onclick="gotovis(<?php echo $m['id_emp']?>)">OK</button>
                </td>
            </tr>
		<?php }?>		
    </tbody>

<script>
    function gotovis(a)
    {
        $.get("get_data_VisBP2.php?idempforbp="+a,function(rep)
        {
            window.location="http://localhost:8080/projet_web/visbullemps.php";
        });
    }
</script>

