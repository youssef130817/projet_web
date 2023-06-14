<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/ajoutemp.css">
</head>
<body>
<div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Envoyer réclamation</h2>
                    <form action="ReclamationTraitement.php" method="POST">
                        <div class="input-group">
                        <label for="sujet">Sujet :</label>
                            <input class="input--style-1" type="text" id="sujet" name="sujet" required placeholder="Sujet">
                        </div>
                        <div class="input-group">
                        <label for="respo_destine">Responsable destinataire :</label>
                        <select class="input--style-1" id="respo" name="respo">
                                    <option value="RH">RH</option>
                                    <option value="RP">RP</option>
                         </select>                     
                       </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="ajouter">Envoyer la réclamation</button>
                        </div>
                    </form>
</div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

<label for="statut">Statut :</label>
  <select id="statut" name="statut">
    <option value="En attente">En attente</option>
    <option value="Approuvé">Approuvé</option>
    <option value="Rejeté">Rejeté</option>
  </select>
