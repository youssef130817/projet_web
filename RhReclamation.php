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
    <link rel="stylesheet" href="includes/RhConge.css">
</head>

<body>
    <?php
    include('includes/RhMenu.html');
    ?>
    <main class="table">
        <section class="table-header">
            <h3>traiter les réclamations</h3>
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
                    $result = $bdd->query("SELECT * FROM `reclamation`, `employee` WHERE reclamation.id_emp = employee.id_emp  AND reclamation.respo_destine='1'");
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>
                            <td>' . $row['nom_emp'] . '</td>
                            <td>' . $row['prenom_emp'] . '</td>
                            <form  action="TraiterReclamation.php" method="post">
                            <td>
                                <p>' . $row['etat'] . '</p>
                                <input type="hidden" name="id_emp" value="' . $row["id_emp"] . '">
                                <input type="hidden" name="id_rec" value="' . $row["id_rec"] . '">
                                <input type="hidden" name="id_dest" value="' . $row["respo_destine"] . '">
                                <input type="submit" name="traiter" value="traiter">
                            </td>
                            </form>
                            </tr>';
                    }
                    ?>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>