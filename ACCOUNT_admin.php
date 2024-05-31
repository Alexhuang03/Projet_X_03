<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Espace Compte Admin</title>
    <link href="ACCOUNT.css" rel="stylesheet" type="text/css"/>
</head>
<body>
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
                <td><input type="text" id="photo_coach" name="photo_coach"></td>
            </tr>
            <tr>
                <td><label for="video_coach">Vidéo :(nom_fichier)</label></td>
                <td><input type="text" id="video_coach" name="video_coach"></td>
            </tr>
            <tr>
                <td><label for="cv_coach">CV (XML) :(nom_fichier)</label></td>
                <td><input type="text" id="cv_coach" name="cv_coach"></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe :</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="telephone">Téléphone :</label></td>
                <td><input type="text" id="telephone" name="telephone" required></td>
            </tr>
            <tr>
                <td><label for="adresse_ligne1">Adresse ligne 1 :</label></td>
                <td><input type="text" id="adresse_ligne1" name="adresse_ligne1" required></td>
            </tr>
            <tr>
                <td><label for="adresse_ligne2">Adresse ligne 2 :</label></td>
                <td><input type="text" id="adresse_ligne2" name="adresse_ligne2"></td>
            </tr>
            <tr>
                <td><label for="ville">Ville :</label></td>
                <td><input type="text" id="ville" name="ville" required></td>
            </tr>
            <tr>
                <td><label for="code_postal">Code postal :</label></td>
                <td><input type="text" id="code_postal" name="code_postal" required></td>
            </tr>
            <tr>
                <td><label for="pays">Pays :</label></td>
                <td><input type="text" id="pays" name="pays" required></td>
            </tr>
            <tr>
                <td><label for="disponibilite_coach">Disponibilité :</label></td>
                <td>
                    <table>
                        <?php
                        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                        $creneaux = [
                            '09:00-11:00' => ['09:00:00', '11:00:00'],
                            '11:00-13:00' => ['11:00:00', '13:00:00'],
                            '15:00-17:00' => ['15:00:00', '17:00:00']
                        ];
                        foreach ($jours as $jour) {
                            echo "<tr><td>$jour</td><td>";
                            foreach ($creneaux as $label => $times) {
                                echo "<input type='checkbox' name='creneaux[$jour][]' value='" . implode(',', $times) . "'> $label<br>";
                            }
                            echo "</td></tr>";
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td><label for="duree_semaine">Nombre de Semaine:</label></td>
                <td>
                    <select id="duree_semaine" name="duree_semaine">
                        <option value="1">1 semaine</option>
                        <option value="2">2 semaines</option>
                        <option value="3">3 semaines</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Ajouter Coach">
                </td>
            </tr>
        </table>
    </form>

    <h3>Ajouter des Créneaux à un Coach Existant</h3>
    <form method="post" action="src_ajout_creneaux_coach.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="coach_select">Sélectionner un Coach :</label></td>
                <td>
                    <select id="coach_select" name="id_coach" required>
                        <?php
                        $database = "Sportify";
                        $db_handle = mysqli_connect('localhost', 'root', '');
                        $db_found = mysqli_select_db($db_handle, $database);

                        if ($db_found) {
                            $query = "SELECT id_coach, nom, prenom FROM coach";
                            $result = mysqli_query($db_handle, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id_coach'] . "'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Aucun coach trouvé</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="disponibilite_coach">Disponibilité :</label></td>
                <td>
                    <table>
                        <?php
                        foreach ($jours as $jour) {
                            echo "<tr><td>$jour</td><td>";
                            foreach ($creneaux as $label => $times) {
                                echo "<input type='checkbox' name='creneaux[$jour][]' value='" . implode(',', $times) . "'> $label<br>";
                            }
                            echo "</td></tr>";
                        }
                        ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td><label for="duree_semaine">Nombre de Semaine:</label></td>
                <td>
                    <select id="duree_semaine" name="duree_semaine">
                        <option value="1">1 semaine</option>
                        <option value="2">2 semaines</option>
                        <option value="3">3 semaines</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Ajouter Créneaux">
                </td>
            </tr>
        </table>
    </form>

    <h3>Gestion Salle</h3>
    <table>
        <?php
        if ($db_found) {
            $query_salle = "SELECT * FROM salle";
            $result_salle = mysqli_query($db_handle, $query_salle);
            echo "<tr><th>Information sur la Salle</th><th>Regles</th><th>Horaires</th></tr>";
            while ($row_salle = mysqli_fetch_assoc($result_salle)) {
                echo "<tr>";
                echo "<td>" . $row_salle['info'] . "</td>";
                echo "<td>" . $row_salle['regle'] . "</td>";
                echo "<td>" . $row_salle['horaire'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table><br>
    <table>
        <form method="post" action="src_modifier_info_salle.php" enctype="multipart/form-data">
            <tr>
                <td><label for="prenom_coach">Information sur la Salle :</label></td>
                <td><input type="text" id="info_salle" name="info_salle" required></td>
            </tr>
            <tr>
                <td><label for="email_coach">Règles de la Salle :</label></td>
                <td><input type="text" id="info_regle" name="info_regle" required></td>
            </tr>
            <tr>
                <td><label for="specialite_coach">Horaires de la Salle :</label></td>
                <td><input type="text" id="info_horaire" name="info_horaire" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Appliquer la modification">
                </td>
            </tr>
        </form>
    </table>


    <h3>Liste des Créneaux par Coach</h3>
    <table border="1">
        <?php
        // Vérifier si la connexion à la base de données est établie
        if ($db_found) {
            // Requête pour récupérer tous les coachs
            $query_coachs = "SELECT * FROM coach";
            $result_coachs = mysqli_query($db_handle, $query_coachs);

            // Boucler à travers chaque coach
            while ($row_coach = mysqli_fetch_assoc($result_coachs)) {
                $id_coach = $row_coach['id_coach'];
                echo "<tr><td colspan='5'><strong>Coach: {$row_coach['nom']} {$row_coach['prenom']}</strong></td></tr>";
                echo "<tr><th>ID Créneau</th><th>Date</th><th>Heure de début</th><th>Heure de fin</th><th>Action</th></tr>";

                // Requête pour récupérer les créneaux pour ce coach spécifique
                $query_creneaux = "SELECT * FROM creneaux WHERE id_coach = $id_coach";
                $result_creneaux = mysqli_query($db_handle, $query_creneaux);

                // Vérifier s'il y a des créneaux pour ce coach
                if (mysqli_num_rows($result_creneaux) > 0) {
                    // Afficher chaque créneau
                    while ($row_creneau = mysqli_fetch_assoc($result_creneaux)) {
                        echo "<tr>";
                        echo "<td>" . $row_creneau['id_creneau'] . "</td>";
                        echo "<td>" . $row_creneau['date_creneau'] . "</td>";
                        echo "<td>" . $row_creneau['heure_debut'] . "</td>";
                        echo "<td>" . $row_creneau['heure_fin'] . "</td>";
                        echo "<td>";
                        echo "<form method='post' action='src_suppresion_creneau.php'>";
                        echo "<input type='hidden' name='id_creneau' value='" . $row_creneau['id_creneau'] . "'>";
                        echo "<input type='submit' value='Supprimer'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Aucun créneau trouvé pour ce coach
                    echo "<tr><td colspan='5'>Aucun créneau trouvé pour ce coach.</td></tr>";
                }
            }
        }
        ?>
    </table>



    <h3>Liste des Coachs</h3>
    <table border="1">
        <?php
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
            } else {
                echo "Aucun coach trouvé.";
            }
        }
        ?>
    </table>
</div>
</body>
</html>