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
            <div class="card bg-light text-black shadow lg mb-5 " id="card">
                <div class="card-body text-center">
                    <h2>Rénitialisation de Mot de Passe</h2>
                    <div class="row my-3">
                        <div class="col-2">
                            <label class="col-form-label my-3" for="email" name="email">email :</label>
                        </div>
                        <div class="col-8 my-3">
                            <input type="email" class="form-control" placeholder="email" id="email">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <button class="btn btn-outline-dark btn-lg px-5" type="submit" id="btn">Rénitialiser</button>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
    var btn = document.getElementById('btn');
    btn.addEventListener('click', function(e) {
        e.preventDefault()
        var email = document.getElementById('email').value;
        var mess = "pour réintialiser votre mot de passe cliquer sur le lien suivant : http://localhost:8080/projet_web/Reinitialiser.php/?name=" + email;
        Email.send({
            SecureToken: "59299d25-c73d-4f10-b7df-9d1c7bc6ca46",
            To: email,
            From: "youssef.kassimi-etu@etu.univh2c.ma",
            Subject: "testing email",
            Body: mess
        }).then(
            message => alert(message)
        );
    })
    
</script>

</html>