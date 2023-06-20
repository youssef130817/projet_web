<?php
require 'connect.php';
session_start();
if (!isset($_SESSION['Auth'])) {
    $_SESSION['page'] = $_SERVER['REQUEST_URI'];
}
$id_emp = $_SESSION['Cnx']['id_emp'];
$result = $bdd->query("SELECT * FROM `heures_supp` WHERE heures_supp.id_emp = $id_emp");
echo "Bonjour Mr/Mme ";
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="includes/visualiser.css">

</head>

<body>
    <?php
    include('includes/RhMenu.html');

    ?>
    <form>
        <main class="table">
            <div class="table-header">
                <h3>Visualiser Heures supplimentaires</h3>
            </div></br>
            <div class="table-body">
                <table>
                    <thead>
                        <tr>
                            <td>type de jour</td>
                            <td>Nombre des heures</td>
                            <td>statut</td>
                        </tr>
                    </thead>
                    <tbody class="input--style-1">
                        <?php
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $row['type_jour'] . '</td>';
                            echo '<td>' . $row['nbr_heures'] . '</td>';
                            echo '<td>' . $row['statut'] . '</td>';
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