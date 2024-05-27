<div id="section">
    <p>espace compte coach</p>
    <?php
    echo "<h2>Compte Coach</h2>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID_Coach</th>";
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Email</th>";
    echo "<th>Telephone</th>";
    echo "<th>adresse_ligne1</th>";
    echo "<th>adresse_ligne2</th>";
    echo "<th>ville</th>";
    echo "<th>code_postal</th>";
    echo "<th>pays</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . (isset($_SESSION['id_coach']) ? $_SESSION['id_coach'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['nom']) ? $_SESSION['nom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['email']) ? $_SESSION['email'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['telephone']) ? $_SESSION['telephone'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['address_ligne1']) ? $_SESSION['address_ligne1'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['address_ligne1']) ? $_SESSION['address_ligne1'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['ville']) ? $_SESSION['ville'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['code_postal']) ? $_SESSION['code_postal'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['pays']) ? $_SESSION['pays'] : '') . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <p>Consultation du jour ( à faire) </p>
    <table border='1'>
        <tr>
            <th>Date/heure</th>
            <th>Client</th>
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
    <p>Consultation à venir ( à faire) </p>
    <table border='1'>
        <tr>
            <th>Date/heure</th>
            <th>Client</th>
        </tr>
        <tr>
            <td>27/05/2024</td>
            <td>Carter</td>
        </tr>
        <tr>
            <td>28/05/2024</td>
            <td>Greg Pop</td>
        </tr>
    </table>
</div>

