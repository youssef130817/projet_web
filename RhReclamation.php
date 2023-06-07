<?php
session_start();
include('includes/RhMenu.html');
if (!isset($_SESSION['Auth'])) {
    header('location: index.php');
}
echo "<p>Bonjour " . $_SESSION['Auth']['nom_emp'] . " </p>";
// print_r($_SESSION);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/RhMenu.css">
    <link rel="stylesheet" href="includes/RhConge.css">
</head>

<body>
    <?php
    include('includes/RhMenu.html');

    ?>
    <form>
        <main class="table">
            <section class="table-header">
                <h3>Demandes de congés</h3>

            </section>
            <section class="table-body">
                <table>

                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Etat</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $state = 'en cours';
                        $result = $bdd->query("SELECT * FROM `reclamation`, `employee` WHERE reclamation.id_emp = employee.id_emp  AND reclamation.respo_destine='1'");
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr class="clickable-row" data-href="http://localhost/projet_web/TraiterReclamation.php/?idrec=' . $row["id_rec"] . '&dest=' . $row["respo_destine"] . '&emp=' . $row["id_emp"] . '">';
                            echo '<td>' . $row['nom_emp'] . '</td>';
                            echo '<td>' . $row['prenom_emp'] . '</td>';
                            echo ' <form  action="TraiterReclamation.php "method="post">';
                            echo '  <td>
                                        <input type="hidden" name="idc" value="' . $row["id_emp"] . '">
                                    </td>';
                            echo '</form>';
                            echo '</tr>';
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </form>
    <script>
        document.querySelectorAll('.clickable-row').forEach(row => {
            row.addEventListener('click', () => {
                window.location = row.dataset.href;
            });
        });
    </script>
</body>

</html>