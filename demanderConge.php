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
                    <h2 class="title">Demander un congé</h2>
                    <form action="demandecongeTrait.php" method="POST">
                        <div class="input-group">
                        <label for="date_debut">Date de début :</label>
                            <input class="input--style-1" type="date" id="date_debut" name="date_debut" placeholder="Date de début">
                        </div>
                        <div class="input-group">
                        <label for="date_fin">Date de fin :</label>
                            <input class="input--style-1"type="date" id="date_fin" name="date_fin" placeholder="Date de fin">
                        </div>
                        <div class="input-group">
                        <label for="commentaire">Commentaire :</label>
                            <textarea class="input--style-1" d="commentaire" name="commentaire"></textarea>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="ajouter">Envoyer la demande</button>
                        </div>
                    </form>
</div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>