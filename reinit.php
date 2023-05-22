<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../projet_web/css/bootstrap.css">
    <link rel="stylesheet" href="../projet_web/includes/style.css">
</head>



<body>
<?php
        include('../projet_web/includes/menu.html');
      ?>
    <form action="" method="post">
        <div class="container w-50" id="Auth">
            <div class="card bg-light text-black" id="card">
                <div class="card-body text-center">
                    <h2>Rénitialisation de Mot de Passe</h2>
                    <div class="row my-3">
                        <div class="col-2">
                            <label class="col-form-label my-3"  for="email" name="email">email  :</label>
                        </div>
                        <div class="col-8 my-3">
                            <input type="email" class="form-control" placeholder="email" name="email">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="cnx">Rénitialiser</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>