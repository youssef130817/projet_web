<?php
session_start();
include('includes/RhMenu.html');
if (!isset($_SESSION['Auth'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhMenu.css">
</head>

<body>
    <?php
    include('includes/RhMenu.html');
    ?>
    <main>
        <div class="main">
            <?php
            require 'connect.php';
            $idrec = $_POST['id_rec'];
            $dest = $_POST['id_dest'];
            $emp = $_POST['id_emp'];
            $result = $bdd->query("SELECT * FROM `reclamation`, `employee` WHERE  employee.id_emp='$emp'  AND reclamation.respo_destine='$dest' AND reclamation.ID_REC='$idrec'");
            $row = $result->fetch(PDO::FETCH_ASSOC);

            echo '<div><p>Employé  :' . $row['nom_emp'] . '  ' . $row['prenom_emp'] . '</p></div>';
            echo '<div><p> Sujet : ' . $row['sujet'] . '</p></div>';
            echo '<div class="rec">';
            echo ' <form method="post">';
            echo ' <label class="label_coment" for="comment">Reponse : </label>
            <p>' . $row['reponse'] . '</p>
            <input type="text" name="comment" class="cmt" class="comment">';
            echo '<p class="err"></p>';
            echo '<p class="ok"></p>';
            echo '  <div>
            <input type="hidden" name="id_emp" value="' . $emp . '">
            <input type="hidden" name="id_rec" value="' . $idrec . '">
            <input type="hidden" name="id_dest" value="' . $dest . '">
                    <input type="submit" name="repondre" value="Répondre" onclick="traiter(event,' . $idrec . ')">
                </div>';
            echo '</form>';
            echo '</div>';
            ?>
        </div>
    </main>
    <script src="includes/TraiterReclamation.js"></script>
    <?php include('footer.php'); ?>
</body>

</html>