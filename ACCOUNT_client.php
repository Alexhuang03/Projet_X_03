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
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . (isset($_SESSION['nom']) ? $_SESSION['nom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['email']) ? $_SESSION['email'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['numero_etudiant']) ? $_SESSION['numero_etudiant'] : '') . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>

</div>
