<link href="ACCOUNT.css" rel="stylesheet" type="text/css"/>

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

    <h3>Ajouter un Nouveau Coach (faire php + requete sql + modif)</h3>
    <form method="post" action="src_ajout_coach.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nom_coach">Nom :</label></td>
                <td><input type="text" id="nom_coach" name="nom_coach" required></td>
            </tr>
            <tr>
                <td><label for="prenom_coach">Prénom :</label></td>
                <td><input type="text" id="prenom_coach" name="prenom_coach" required></td>
            </tr>
            <tr>
                <td><label for="email_coach">Email :</label></td>
                <td><input type="email" id="email_coach" name="email_coach" required></td>
            </tr>
            <tr>
                <td><label for="specialite_coach">Spécialité :</label></td>
                <td><input type="text" id="specialite_coach" name="specialite_coach" required></td>
            </tr>
            <tr>
                <td><label for="photo_coach">Photo :(nom_fichier)</label></td>
                <td><input type="text" id="photo_coach" name="photo_coach" </td>
            </tr>
            <tr>
                <td><label for="video_coach">Vidéo :(nom_fichier)</label></td>
                <td><input type="text" id="video_coach" name="video_coach" </td>
            </tr>
            <tr>
                <td><label for="cv_coach">CV (XML) :(nom_fichier)</label></td>
                <td><input type="text" id="cv_coach" name="cv_coach"</td>
            </tr>
            <tr>
                <td><label for="disponibilite_coach">Disponibilité :(faire tableau de selection et ajouter dans la table)</label></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" value="Ajouter Coach"></td>
            </tr>
        </table>
    </form>

    <h3>Gestion Salle ( à faire)  </h3>

    <h3>Liste des Coachs (faire php + requete sql pour suppresion) </h3>
    <table border="1">
        <?php
        $database = "Sportify";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $query = "SELECT * FROM coach";
            $result = mysqli_query($db_handle, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr><th>ID Coach</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Spécialité</th><th>Action</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_coach'] . "</td>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['prenom'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['specialite'] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action='src_suppresion_coach.php'>";
                    echo "<input type='hidden' name='id_coach' value='" . $row['id_coach'] . "'>";
                    echo "<input type='submit' value='Supprimer'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                echo "Aucun coach trouvé.";
            }
        }
        ?>
    </table>

</div>

