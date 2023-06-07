<?php
session_start();
if (!isset($_SESSION['Auth'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhConge.css">
</head>

<body>
    <?php
    include('includes/RhMenu.html');

    ?>
    <form>
        <main class="table">
            <div class="table-header">
                <h3>Demandes de congés</h3>
            </div></br>
            <div class="table-body">
                <table>
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Date Début</td>
                            <td>Date Fin</td>
                            <td>Etat</td>
                            <td>Traiter</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require 'connect.php';
                        $result = $bdd->query("SELECT * FROM `conges`, `employee` WHERE conges.id_emp = employee.id_emp");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $row['nom_emp'] . '</td>';
                            echo '<td>' . $row['prenom_emp'] . '</td>';
                            echo '<td>' . $row['date_debut_cg'] . '</td>';
                            echo '<td>' . $row['date_fin_cg'] . '</td>';
                            echo '<td>' . $row['statut_cg'] . '</td>';
                            echo ' <form  action="actualiser.php "method="post">';
                            echo '  <td>
                                        <input  class="A" type="submit" name="accepter" id="btnA" value="">
                                        <input  class="B" type="submit" name="reffuser" id="btnR" value="">
                                        <label class="label_coment" for="comment">Commentaire</label>
                                        <input type="text" name="comment" class="comment">
                                        <p class="error"></p>
                                        <input type="hidden" name="idc" value="' . $row["id_cg"] . '">
                                    </td>';
                            echo '</form>';
                            echo '</tr>';
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </form>
</body>

<script>
    var enter = document.querySelectorAll('.A');
    //ajouter un evenemnt pour boutton entrer pour vérifier l'email et le mot de passe 
    enter.addEventListener('click', function(event) {
        let commentField = document.querySelectorAll('.comment');
        if (commentField.value.length < 20) {
            event.preventDefault();
            alert('Le champ commentaire doit contenir au moins 20 caractères.');
        }

    })
    var enter = document.querySelector('.B');
    //ajouter un evenemnt pour boutton entrer pour vérifier l'email et le mot de passe 
    enter.addEventListener('click', function(event) {
        let commentField = document.querySelector('.comment');
        if (commentField.value.length < 20) {
            event.preventDefault();
            alert('Le champ commentaire doit contenir au moins 20 caractères.');
        }

    })
</script>


</html>