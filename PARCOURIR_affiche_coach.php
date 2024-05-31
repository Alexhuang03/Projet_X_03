<style>
    /* Style pour la fenêtre modale */
    .modal {
        display: none; /* Par défaut, la fenêtre modale est cachée */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5); /* Arrière-plan semi-transparent */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<?php
$database = "sportify";
$db_handle = mysqli_connect('localhost', 'root', '', $database);
if (!$db_handle) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

if (isset($_SESSION['sport'])) {
    // Récupérer la spécialité depuis la session
    $specialite = $_SESSION['sport'];

    // Requête pour récupérer les informations des coachs pour une spécialité donnée
    $query_coach = "SELECT u.id, c.nom, c.prenom, c.email, c.photo, c.video, c.cv 
                    FROM users AS u 
                    INNER JOIN coach AS c ON u.id = c.id_coach 
                    WHERE c.specialite = '$specialite'";

    // Exécuter la requête
    $result_coach = mysqli_query($db_handle, $query_coach);

    if ($result_coach && mysqli_num_rows($result_coach) > 0) {
        // Affichage des informations des coachs
        while ($row_coach = mysqli_fetch_assoc($result_coach)) {
            ?>
            <div class="affiche-coach">
                <div class="coach-info">
                    <img src="src_afficher_photo.php?image=<?php echo $row_coach['photo']; ?>"
                         alt="<?php echo $row_coach['nom']; ?>" style="max-width: 200px; max-height: 200px;">
                    <p><strong>Nom:</strong> <?php echo $row_coach['nom']; ?></p>
                    <p><strong>Prénom:</strong> <?php echo $row_coach['prenom']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row_coach['email']; ?></p>
                </div>
                <div>
                    <h3>Créneaux du Coach</h3>
                    <table border="1">
                        <tr>
                            <th>Date</th>
                            <th>Heure de début</th>
                            <th>Heure de fin</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        // Requête pour récupérer les créneaux du coach
                        $query_creneaux = "
                            SELECT * 
                            FROM creneaux 
                            WHERE id_coach = '{$row_coach['id']}'
                            AND CONCAT(date_creneau, ' ', heure_debut) > NOW()
                        ";
                        $result_creneaux = mysqli_query($db_handle, $query_creneaux);

                        // Vérifier s'il y a des créneaux pour ce coach
                        if (mysqli_num_rows($result_creneaux) > 0) {
                            while ($row_creneau = mysqli_fetch_assoc($result_creneaux)) {
                                // Vérifier si ce créneau est réservé
                                $query_reservation = "SELECT * FROM reservation WHERE id_coach = '{$row_coach['id']}' AND date = '{$row_creneau['date_creneau']}' AND heure_debut = '{$row_creneau['heure_debut']}' AND heure_fin = '{$row_creneau['heure_fin']}'";
                                $result_reservation = mysqli_query($db_handle, $query_reservation);
                                $status = mysqli_num_rows($result_reservation) > 0 ? 'Réservé' : 'Libre';

                                echo "<tr>";
                                echo "<td>" . $row_creneau['date_creneau'] . "</td>";
                                echo "<td>" . $row_creneau['heure_debut'] . "</td>";
                                echo "<td>" . $row_creneau['heure_fin'] . "</td>";
                                echo "<td>" . $status . "</td>";
                                echo "<td>";
                                // Vérifier si le créneau est libre pour afficher le bouton "Réserver"
                                if ($status == 'Libre') {
                                    echo "<form method='post' action='src_prendre_rdv.php'>";
                                    echo "<input type='hidden' name='id_creneau' value='" . $row_creneau['id_creneau'] . "'>";
                                    echo "<input type='submit' value='Réserver'>";
                                    echo "</form>";
                                } else {
                                    echo "Créneau réservé";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Aucun créneau trouvé pour ce coach.</td></tr>";
                        }
                        ?>
                    </table>
                </div>

                <div class="coach-actions">
                    <button onclick="showCV('<?php echo $row_coach['cv']; ?>')">Voir CV</button>
                    <button onclick="openEmailInterface('<?php echo $row_coach['email']; ?>')">Communiquer avec le coach</button>
                </div>
            </div>
            <?php
        }
    }
    else {
        echo "Aucun coach trouvé pour cette spécialité.";
    }
}
else {
    echo "La spécialité n'est pas définie.";
}

// Fermer la connexion à la base de données
mysqli_close($db_handle);
?>
<!-- Fenêtre modale pour afficher le CV -->
<div id="cvModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCVModal()">&times;</span>
        <div id="cvContent"></div>
    </div>
</div>

<script>
    function showCV(cvFileName) {
        // Construire le chemin complet vers le fichier XML sur le serveur
        var cvPath = "rsc/" + cvFileName;

        // Afficher la fenêtre modale
        var modal = document.getElementById('cvModal');
        var cvContent = document.getElementById('cvContent');

        // Charger le fichier XML dans l'iframe
        fetch(cvPath)
            .then(response => response.text())
            .then(xmlText => {
                // Convertir le texte XML en document XML
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString(xmlText, "text/xml");

                // Récupérer les informations du XML
                var nom = xmlDoc.getElementsByTagName("nom")[0].textContent;
                var prenom = xmlDoc.getElementsByTagName("prenom")[0].textContent;
                var adresse = xmlDoc.getElementsByTagName("adresse")[0].textContent;
                var telephone = xmlDoc.getElementsByTagName("telephone")[0].textContent;
                var email = xmlDoc.getElementsByTagName("email")[0].textContent;

                var formation = xmlDoc.getElementsByTagName("formation")[0];
                var diplome = formation.getElementsByTagName("diplome")[0].textContent;
                var etablissement = formation.getElementsByTagName("etablissement")[0].textContent;
                var anneeFormation = formation.getElementsByTagName("annee")[0].textContent;

                var experience = xmlDoc.getElementsByTagName("experience_professionnelle")[0];
                var poste = experience.getElementsByTagName("poste")[0].textContent;
                var entreprise = experience.getElementsByTagName("entreprise")[0].textContent;
                var anneesExperience = experience.getElementsByTagName("annees")[0].textContent;

                var competences = xmlDoc.getElementsByTagName("competences")[0];
                var langues = competences.getElementsByTagName("langues")[0].textContent;
                var informatique = competences.getElementsByTagName("informatique")[0].textContent;
                var autresCompetences = competences.getElementsByTagName("autres")[0].textContent;
                // Construire le contenu à afficher
                var cvHTML = "<h2>Informations Personnelles</h2>";
                cvHTML += "<p><strong>Nom:</strong> " + nom + "</p>";
                cvHTML += "<p><strong>Prénom:</strong> " + prenom + "</p>";
                cvHTML += "<p><strong>Adresse:</strong> " + adresse + "</p>";
                cvHTML += "<p><strong>Téléphone:</strong> " + telephone + "</p>";
                cvHTML += "<p><strong>Email:</strong> " + email + "</p>";

                cvHTML += "<h2>Formation</h2>";
                cvHTML += "<p><strong>Diplôme:</strong> " + diplome + "</p>";
                cvHTML += "<p><strong>Établissement:</strong> " + etablissement + "</p>";
                cvHTML += "<p><strong>Année d'obtention:</strong> " + anneeFormation + "</p>";

                cvHTML += "<h2>Expérience Professionnelle</h2>";
                cvHTML += "<p><strong>Poste occupé:</strong> " + poste + "</p>";
                cvHTML += "<p><strong>Nom de l'entreprise:</strong> " + entreprise + "</p>";
                cvHTML += "<p><strong>Années d'expérience:</strong> " + anneesExperience + "</p>";

                cvHTML += "<h2>Compétences</h2>";
                cvHTML += "<p><strong>Langues maîtrisées:</strong> " + langues + "</p>";
                cvHTML += "<p><strong>Compétences informatiques:</strong> " + informatique + "</p>";
                cvHTML += "<p><strong>Autres compétences:</strong> " + autresCompetences + "</p>";

                cvContent.innerHTML = cvHTML;
                modal.style.display = "block";
            })
            .catch(error => {
                console.error('Erreur de chargement du fichier XML:', error);
            });
    }
    function openEmailInterface(email) {
        // Ouvrir le lien avec l'adresse email spécifiée
        window.open('mailto:' + email);
    }
    function closeCVModal() {
        var modal = document.getElementById('cvModal');
        modal.style.display = "none";
    }
</script>