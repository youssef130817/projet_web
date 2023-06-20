<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['Cnx'])) 
{
    $_SESSION['page'] = $_SERVER['REQUEST_URI'];
}
$id_emp = $_SESSION['Cnx']['id_emp'];
$result = $bdd->query("SELECT * FROM `absence` WHERE absence.id_emp = $id_emp");
echo "Bonjour Mr/Mme ";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="includes/visualiser.css">
</head>
<body>
    <?php include('includes/RhMenu.html'); ?>
    <form>
        <main class="table">
            <div class="table-header">
                <h3>Visualiser Absences</h3>
            </div><br>
            <div class="table-body">
                <table>
                    <thead>
                        <tr>
                            <td>Date de début</td>
                            <td>Date de fin</td>
                            <td>Nombres d'heures</td>
                        </tr>
                    </thead>
                    <tbody class="input--style-1">
                        <?php
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $row['date_debut_abs'] . '</td>';
                            echo '<td>' . $row['date_fin_abs'] . '</td>';
                            echo '<td>' . $row['nbr_heures'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </form>
</body>
</html>
