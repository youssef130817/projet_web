<?php
    session_start();
    include('connect.php');
    include('includes/RhMenu.html');
    if(!isset($_SESSION['Auth']))
    {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier ou supprimer un employé</title>
    <link rel="stylesheet" href="includes/GestEmp.css">
    <link rel="stylesheet" href="includes/modsuppemp.css">
</head>

<body>
    <form>
        <main class="table">
            <div class="table-header">
                <h3>Modifier ou supprimer un employé</h3>
            </div></br>
            <div class="table-body">
                <table>
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Adresse</td>
                            <td>CNI</td>
                            <td>Numero CNSS</td>
                            <td>Numero CIMR</td>
                            <td>Adresse mail</td>
                            <td>Situation familiale</td>
                            <td>Nombre des enfants</td>
                            <td>Salaire de base</td>
                            <td>Date de naissance</td>
                            <td>Date d'embauche</td>
                            <td>Mode de paiement</td>
                            <td>Poste</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $result = $bdd->query("SELECT * FROM `employee`");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $row['nom_emp'] . '</td>';
                            echo '<td>' . $row['prenom_emp'] . '</td>';
                            echo '<td>' . $row['adresse_emp'] . '</td>';
                            echo '<td>' . $row['cni_emp'] . '</td>';
                            echo '<td>' . $row['num_cnss_emp'] . '</td>';
                            echo '<td>' . $row['num_cimr_emp'] . '</td>';
                            echo '<td>' . $row['email_emp'] . '</td>';
                            // echo '<td>' . $row[''] . '</td>';
                            // echo '<td>' . $row['num_cimr_emp'] . '</td>';
                            // echo '<td>' . $row['num_cimr_emp'] . '</td>';
                            // echo '<td>' . $row['num_cimr_emp'] . '</td>';
                            // echo ' <form  action="actualiser.php "method="post">';
                            // echo '  <td>
                                        // <input type="submit" name="accepter" id="btnA" value="" onclick="verifcoment(event)">
                                        // <input type="submit" name="reffuser" id="btnR" value="" onclick="verifcoment(event)">
                                        // <label class="label_coment" for="comment">Commentaire</label>
                                        // <input type="text" name="comment" class="comment">
                                        // <p class="error"></p>
                                        // <input type="hidden" name="idc" value="' . $row["id_cg"] . '">
                                    // </td>';
                            // echo '</form>';
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
    //ajouter un evenemnt pour boutton entrer pour vérifier l'email et le mot de passe 
    function verifcoment(event) {
        let commentField = document.querySelectorAll('.comment');
        if (commentField.value.length < 20) {
            event.preventDefault();
            alert('Le champ commentaire doit contenir au moins 20 caractères.');
        }

    }
</script>


</html>
</html>
