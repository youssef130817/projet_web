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
            <h3>Demandes de congés</h3>
        </section>
        <section class="table-body">
            <table>

                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Date Début</td>
                        <td>Date Fin</td>
                        <td>Etat</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Date Début</td>
                        <td>Date Fin</td>
                        <td class="Etat">
                            <button id="btnA"></button>
                            <button id="btnR"></button>
                            <label class="label_coment" for="comment">Commentaire</label>
                            <input class="comment" type="text" name="comment" placeholder="si vous reffuser laisser un commentaire !!">
                        </td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Date Début</td>
                        <td>Date Fin</td>
                        <td class="Etat">
                            <button id="btnA"></button>
                            <button id="btnR"></button>
                            <label class="label_coment" for="comment">Commentaire</label>
                            <input type="text" class="comment" name="comment" placeholder="si vous reffuser laisser un commentaire !!">
                        </td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Date Début</td>
                        <td>Date Fin</td>
                        <td class="Etat">
                            <button id="btnA"></button>
                            <button id="btnR"></button>
                            <label class="label_coment" for="comment">Commentaire</label>
                            <input type="text" class="comment" placeholder="si vous reffuser laisser un commentaire !!" name="comment">
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>

</body>

</html>