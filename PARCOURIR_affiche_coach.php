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
                <div class="coach-actions">
                    <button onclick="showCV('<?php echo $row_coach['cv']; ?>')">Voir CV</button>
                    <button onclick="openEmailInterface('<?php echo $row_coach['email']; ?>')">Communiquer avec le coach</button>
                    <?php
                    // Vérifier si l'utilisateur est connecté
                    if (isset($_SESSION['id'])) {
                        // ID de l'utilisateur connecté
                        $user_id = $_SESSION['id'];

                        // Bouton pour prendre un RDV avec l'ID de l'utilisateur connecté
                        echo "<button onclick=\"location.href='src_prendre_rdv.php?id={$row_coach['id']}&user_id={$user_id}'\">Prendre un RDV</button>";
                    } else {
                        // Redirection vers la page de connexion pour l'utilisateur non connecté
                        echo "<button onclick=\"location.href='link_login.php'\">Se connecter pour prendre un RDV</button>";
                    }
                    ?>
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
                var diplome = xmlDoc.getElementsByTagName("diplome")[0].textContent;
                var etablissement = xmlDoc.getElementsByTagName("etablissement")[0].textContent;
                var anneeFormation = xmlDoc.getElementsByTagName("annee")[0].textContent;
                var poste = xmlDoc.getElementsByTagName("poste")[0].textContent;
                var entreprise = xmlDoc.getElementsByTagName("entreprise")[0].textContent;
                var anneesExperience = xmlDoc.getElementsByTagName("annees")[0].textContent;
                var langues = xmlDoc.getElementsByTagName("langues")[0].textContent;
                var informatique = xmlDoc.getElementsByTagName("informatique")[0].textContent;
                var autresCompetences = xmlDoc.getElementsByTagName("autres")[0].textContent;

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
