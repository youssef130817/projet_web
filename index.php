<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="includes/style.css">
    <link rel="stylesheet" href="includes/RhLandingPage.css">
</head>

<body class="form login">
    <form class="form-container login" method="POST" action="index.php">
        <h3>S'Authentifier</h3>
        <div class="form-grp">
            <label for="username">Email </label><br>
            <input type="email" name="us" placeholder="xxxxx@domain" id="user">
        </div>
        <div class="form-grp">
            <label for="password">mot de passe</label><br>
            <input type="password" name="pss" placeholder="********" id="pass">
            <p class="error"></p>
        </div>
        <div class="error-txt"></div>
        <div class="form-grp button">
            <input type="submit" class="Entrer" name="log" value="Entrer">
        </div>
    </form>
    <!-- <img src="../projet_web/images/img22.png" alt="" id="imgauth"> -->
    <script src="includes/infoverification.js"></script>
</body>

</html>