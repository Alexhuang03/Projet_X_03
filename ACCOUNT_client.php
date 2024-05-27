<link href="ACCOUNT.css" rel="stylesheet" type="text/css"/>

<div id="section">
    <p>espace compte client</p>
    <?php
    echo "<h2>Compte Client</h2>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Email</th>";
    echo "<th>Numéro Étudiant</th>";
    echo "<th>Telephone</th>";
    echo "<th>adresse_ligne1</th>";
    echo "<th>adresse_ligne2</th>";
    echo "<th>ville</th>";
    echo "<th>code_postal</th>";
    echo "<th>pays</th>";

    echo "</tr>";
    echo "<tr>";
    echo "<td>" . (isset($_SESSION['nom']) ? $_SESSION['nom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['email']) ? $_SESSION['email'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['numero_etudiant']) ? $_SESSION['numero_etudiant'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['telephone']) ? $_SESSION['telephone'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['address_ligne1']) ? $_SESSION['address_ligne1'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['address_ligne1']) ? $_SESSION['address_ligne1'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['ville']) ? $_SESSION['ville'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['code_postal']) ? $_SESSION['code_postal'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['pays']) ? $_SESSION['pays'] : '') . "</td>";

    echo "</tr>";
    echo "</table>";
    ?>
    <p>Prochaines consultations (statique)</p>
    <table border='1'>
        <tr>
            <th>Date/heure</th>
            <th>Coach</th>
        </tr>
        <tr>
            <td>29/05/2024</td>
            <td>Coach Carter</td>
            <td><form method='post' action='supprimer_seance.php'><input type='hidden' name='id' value='" . $row['id'] . "'><input type='submit' value='Supprimer'></form></td>
        </tr>
        <tr>
            <td>30/05/2024</td>
            <td>Coach Carter</td>
            <td><form method='post' action='supprimer_seance.php'><input type='hidden' name='id' value='" . $row['id'] . "'><input type='submit' value='Supprimer'></form></td>
        </tr>
    </table>


    <p>historique des consultations (statique)</p>
    <table border='1'>
        <tr>
            <th>Date/heure</th>
            <th>Coach</th>
        </tr>
        <tr>
            <td>27/05/2024</td>
            <td>Coach Carter</td>
        </tr>
        <tr>
            <td>28/05/2024</td>
            <td>Coach Carter</td>
        </tr>
    </table>

</div>

