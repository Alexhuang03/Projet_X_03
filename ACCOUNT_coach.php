<link href="ACCOUNT.css" rel="stylesheet" type="text/css"/>

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
    <p>Chatroom ( à faire) </p>

    <?php
    // Etablissement de la connexion à la base de données
    $database = "Sportify";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        // Récupération de l'ID de l'utilisateur connecté
        $id_utilisateur = $_SESSION['id'];

        // Récupération de la date et de l'heure actuelle
        $current_date = date('Y-m-d');
        $current_time = date('H:i:s');

        // Requête pour les réservations passées
        $query_reservations_passées = "SELECT * FROM reservation WHERE (id_coach = $id_utilisateur OR id_user = $id_utilisateur) AND (DATE < '$current_date' OR (DATE = '$current_date' AND heure_debut < '$current_time'))";
        $result_reservations_passées = mysqli_query($db_handle, $query_reservations_passées);

        if (mysqli_num_rows($result_reservations_passées) > 0) {
            // Affichage des réservations passées
            echo "<p>Réservations passées</p>";
            echo "<table border='1'>";
            echo "<tr><th>ID Réservation</th><th>ID Coach</th><th>ID Utilisateur</th><th>Date</th><th>Heure de Début</th><th>Heure de Fin</th></tr>";
            while ($row = mysqli_fetch_assoc($result_reservations_passées)) {
                echo "<tr>";
                // Afficher les détails de la réservation
                echo "<td>{$row['id_reservation']}</td>";
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

        // Requête pour les réservations à venir
        $query_reservations_à_venir = "SELECT * FROM reservation WHERE (id_coach = $id_utilisateur OR id_user = $id_utilisateur) AND (DATE > '$current_date' OR (DATE = '$current_date' AND heure_debut >= '$current_time'))";
        $result_reservations_à_venir = mysqli_query($db_handle, $query_reservations_à_venir);

        if (mysqli_num_rows($result_reservations_à_venir) > 0) {
            // Affichage des réservations à venir
            echo "<p>Réservations à venir</p>";
            echo "<table border='1'>";
            echo "<tr><th>ID Réservation</th><th>ID Coach</th><th>ID Utilisateur</th><th>Date</th><th>Heure de Début</th><th>Heure de Fin</th></tr>";
            while ($row = mysqli_fetch_assoc($result_reservations_à_venir)) {
                echo "<tr>";
                // Afficher les détails de la réservation
                echo "<td>{$row['id_reservation']}</td>";
                echo "<td>{$row['id_coach']}</td>";
                echo "<td>{$row['id_user']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['heure_debut']}</td>";
                echo "<td>{$row['heure_fin']}</td>";
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


