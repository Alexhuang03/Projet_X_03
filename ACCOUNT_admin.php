<div id="section">
    <p>espace compte admin</p>
    <?php
    echo "<h2>Compte Administrateur</h2>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Email</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . (isset($_SESSION['nom']) ? $_SESSION['nom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['email']) ? $_SESSION['email'] : '') . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>

    <h3>Ajouter un Nouveau Coach</h3>
    <form method="post" action="ajouter_coach.php">
        <label for="nom_coach">Nom :</label>
        <input type="text" id="nom_coach" name="nom_coach" required><br><br>
        <label for="prenom_coach">Prénom :</label>
        <input type="text" id="prenom_coach" name="prenom_coach" required><br><br>
        <label for="email_coach">Email :</label>
        <input type="email" id="email_coach" name="email_coach" required><br><br>
        <label for="specialite_coach">Spécialité :</label>
        <input type="text" id="specialite_coach" name="specialite_coach" required><br><br>
        <label for="photo_coach">Photo :</label>
        <input type="file" id="photo_coach" name="photo_coach" accept="image/*"><br><br>
        <label for="video_coach">Vidéo :</label>
        <input type="file" id="video_coach" name="video_coach" accept="video/*"><br><br>
        <label for="cv_coach">CV (XML) :</label>
        <input type="file" id="cv_coach" name="cv_coach" accept=".xml"><br><br>
        <label for="disponibilite_coach">Disponibilité :</label>
        <textarea id="disponibilite_coach" name="disponibilite_coach" required></textarea><br><br>
        <input type="submit" value="Ajouter Coach">
    </form>

    <h3>Liste des Coachs</h3>
    <table border="1">
        <tr>
            <th>ID Coach</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $database = "Sportify";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $query = "SELECT * FROM Users WHERE role = 'coach'";
            $result = mysqli_query($db_handle, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_coach'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><form method='post' action='supprimer_coach.php'><input type='hidden' name='id' value='" . $row['id'] . "'><input type='submit' value='Supprimer'></form></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

</div>

