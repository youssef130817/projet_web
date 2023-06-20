<?php
    include('connect.php');
    if(isset($_GET['valslct']))
    {
        $vs=$_GET['valslct'];
        $req3=$bdd->prepare("SELECT DISTINCT rubrique.id_rub,rubrique.libelle_rub,calcul.regle_de_calcul from calcul,rubrique 
                            where calcul.id_ent='$vs' and rubrique.id_rub=calcul.id_rub GROUP BY rubrique.id_rub ");
        $req3->execute();
        $mareqresult3=$req3->fetchAll(PDO::FETCH_ASSOC);

        
    } 

    
?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Code</th>
            <th>Libellé</th>
            <th>Regle de calcul</th>
            <th>Action</th>
        </tr>        
    </thead>
    <tbody>
        <?php 
            foreach ($mareqresult3 as $m) 
			{?> 
            <tr>
                <td><?php echo $m['id_rub']?> </td>
                <td><?php echo $m['libelle_rub']?></td>
                <td><?php echo $m['regle_de_calcul']?></td>                        
                <td>
                    <a href="#" class="settings" onclick="Modifier()" title="Modifier" data-toggle="modal" data-id=<?php echo $m['id_rub'];?> data-nom=<?php echo $m['libelle_rub'];?> data-regle=<?php echo $m['regle_de_calcul'];?>>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
		<?php }?>		
    </tbody>
</table>

<div class="modal fade" id="ModifierModal" tabindex="-1" role="dialog" aria-labelledby="ModifierModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-body p-4 px-5">
                <div class="main-content text-center">
                    <div class="warp-icon mb-4">
                        <span class="icon-lock2"></span>
                    </div>
                <form action="updateRub.php" method="POST">
                  <label for="" style="font-size: 30px;">Informations de la rubrique</label>
                  <img class="mb-4 img-thumbnail" src="" id="ModalImage" style="width: 25%;">
                  <div class="form-group mb-4">
                    <label for="input-id"> Code rubrique :  </label>
                    <input type="text" id="input-id" class="form-control text-center" placeholder="" name="id" readonly>
                  </div>
                  <hr>
                  <div class="form-group mb-4">
                    <label for="libelle_rub"> Libelle:</label>
                    <input type="text" id="libelle_rub" class="form-control text-center" placeholder="" name="lib">
                  </div>
                  <hr>
                  <div class="form-group mb-4">
                    <label for="regle_de_calcul"> Regle de calcul : </label>
                    <input type="text" id="regle_de_calcul" class="form-control text-center" placeholder="" name="reg">
                  </div>
                  <hr>
                  <div class="d-flex">
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-success" name="ValiderModif"> 
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            Valider 
                        </button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal" name="SuppRub" aria-label="Close"> 
                            <i class="fa fa-ban" aria-hidden="true"></i>
                            Supprimer 
                        </button>
                    </div>
                  </div>
                </form>
              
            </div>

          </div>
        </div>
      </div>
</div>

