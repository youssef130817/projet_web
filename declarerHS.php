<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclarer Hs</title>
    <link rel="stylesheet" href="includes/ajoutemp.css">
</head>
<body>
<div class="page-wrapper p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Déclarer les heures supplimentaires</h2>
                    <form action="traitementheuressupp.php" method="POST">
                        <div class="input-group">
                        <label for="type_jour">Type de jour :</label>
                            <input class="input--style-1" type="text" id="type_jour" placeholder="Type de jour" name="type_jour">
                        </div>
                        <div class="input-group">
                        <label for="nbr_heures">Nombre d'heures :</label>
                            <input class="input--style-1"type="number" id="nbr_heures" name="nbr_heures">
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="ajouter">Ajouter les heures supplémentaires</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

