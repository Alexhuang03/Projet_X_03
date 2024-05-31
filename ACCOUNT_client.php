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
    echo "<td>" . (isset($_SESSION['adresse_ligne1']) ? $_SESSION['adresse_ligne1'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['adresse_ligne2']) ? $_SESSION['adresse_ligne2'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['ville']) ? $_SESSION['ville'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['code_postal']) ? $_SESSION['code_postal'] : '') . "</td>";
    echo "<td>" . (isset($_SESSION['pays']) ? $_SESSION['pays'] : '') . "</td>";

    echo "</tr>";
    echo "</table>";
    ?>
    <?php
    $database = "Sportify";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        $id_utilisateur = $_SESSION['id'];

        $current_date = date('Y-m-d');
        $current_time = date('H:i:s');

        $query_reservations_passées = "SELECT * FROM reservation WHERE (id_coach = $id_utilisateur OR id_user = $id_utilisateur) AND (DATE < '$current_date' OR (DATE = '$current_date' AND heure_debut < '$current_time'))";
        $result_reservations_passées = mysqli_query($db_handle, $query_reservations_passées);

        if (mysqli_num_rows($result_reservations_passées) > 0) {
            echo "<p>Réservations passées</p>";
            echo "<table border='1'>";
            echo "<tr><th>ID Coach</th><th> ID Client</th><th>Date</th><th>Heure de Début</th><th>Heure de Fin</th></tr>";
            while ($row = mysqli_fetch_assoc($result_reservations_passées)) {
                echo "<tr>";
                echo "<td>{$row['id_coach']}</td>";
                echo "<td>{$row['id_user']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['heure_debut']}</td>";
                echo "<td>{$row['heure_fin']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Aucune réservation passée pour cet utilisateur.</p>";
        }

        $query_reservations_à_venir = "SELECT * FROM reservation WHERE (id_coach = $id_utilisateur OR id_user = $id_utilisateur) AND (DATE > '$current_date' OR (DATE = '$current_date' AND heure_debut >= '$current_time'))";
        $result_reservations_à_venir = mysqli_query($db_handle, $query_reservations_à_venir);

        if (mysqli_num_rows($result_reservations_à_venir) > 0) {
            echo "<p>Réservations à venir</p>";
            echo "<table border='1'>";
            echo "<tr><th>ID_Coach</th><th>ID_Client</th><th>Date</th><th>Heure de Début</th><th>Heure de Fin</th></tr>";
            while ($row = mysqli_fetch_assoc($result_reservations_à_venir)) {
                echo "<tr>";
                echo "<td>{$row['id_coach']}</td>";
                echo "<td>{$row['id_user']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['heure_debut']}</td>";
                echo "<td>{$row['heure_fin']}</td>";
                echo "<td>";
                echo "<form method='post' action='src_suppresion_reservation.php'>";
                echo "<input type='hidden' name='id_coach' value='" . $row['id_coach'] . "'>";
                echo "<input type='hidden' name='date_reservation' value='" . $row['date'] . "'>";
                echo "<input type='hidden' name='heure_debut' value='" . $row['heure_debut'] . "'>";
                echo "<input type='hidden' name='heure_fin' value='" . $row['heure_fin'] . "'>";
                echo "<input type='submit' value='Supprimer'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Aucune réservation à venir pour cet utilisateur.</p>";
        }
    } else {
        echo "Erreur de connexion à la base de données.";
    }
    ?>





</div>

