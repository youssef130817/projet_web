<?php
require 'connect.php';
$result = $bdd->query("SELECT * FROM `conges`, `employee` WHERE conges.id_emp = employee.id_emp");
$output = "";
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $output .= ' <tr>
                <td>' . $row['nom_emp'] . '</td>
                <td>' . $row['prenom_emp'] . '</td>
                <td>' . $row['date_debut_cg'] . '</td>
                <td>' . $row['date_fin_cg'] . '</td>
                <td>' . $row['statut_cg'] . '</td>
                <td><form   "method="post">
                <td class="button">
                            <input type="submit"  value="" onclick="accepter();">
                            <input type="submit"  value="" onclick="rejeter();">
                            <label class="label_coment" for="comment">Commentaire</label>
                            <input type="text" name="comment" class="comment">
                            <p class="error"></p>
                            <input type="hidden" name="idc" value="' . $row["id_cg"] . '">
                        </td>
                </form></td>
                </tr>';
}
echo $output;
