<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhMenu.css">
    <link rel="stylesheet" href="includes/TraiterReclamation.css">
</head>

<body>
    <?php
    include('includes/RhMenu.html');
    ?>

    <div class="main">
        <?php
        require 'connect.php';
        $idrec = $_GET['idrec'];
        $dest = $_GET['dest'];
        $emp = $_GET['emp'];
        $result = $bdd->query("SELECT * FROM `reclamation`, `employe` WHERE  employe.ID_EMP='$emp'  AND reclamation.RESPO_DESTINE='$dest' AND reclamation.ID_REC='$idrec'");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<div><p>' . $row['NOM_EMP'] . '</p><p>' . $row['PRENOM_EMP'] . '</p></div>';
            echo '<div><p>' . $row['SUJET'] . '</p></div>';
            echo ' <form  action="actualiser.php "method="get">';
            echo '  <div>
                        <input type="submit" name="traiter" value="Traiter">
                    </div>';
            echo '</form>';
            echo '</tr>';
        }
        ?>
    </div>
</body>

</html>