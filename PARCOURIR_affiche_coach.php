<link href="PARCOURIR.css" rel="stylesheet" type="text/css"/>

<?php
if (isset($_SESSION['sport'])) {
    switch ($_SESSION['sport']) {
        case "Musculation":
            printf("Traitement spécifique pour la musculation");
            break;
        case "Fitness":
            printf("Traitement spécifique pour le Fitness");
            break;
        case "Biking":
            printf("Traitement spécifique pour le Biking");
            break;
        case "Cardio-Training":
            printf("Traitement spécifique pour le Cardio-Training");
            break;
        case "Cours-Collectifs":
            printf("Traitement spécifique pour les Cours-Collectifs");
            break;
        case "Basketball":
            printf("Traitement spécifique pour le Basketball");
            break;
        case "Football":
            printf("Traitement spécifique pour le Football");
            break;
        case "Rugby":
            printf("Traitement spécifique pour le Rugby");
            break;
        case "Tennis":
            printf("Traitement spécifique pour le Tennis");
            break;
        case "Natation":
            printf("Traitement spécifique pour le Natation");
            break;
        case "Plongeon":
            printf("Traitement spécifique pour le Plongeon");
            break;

        default:
            printf("Sport non trouvé");
    }
} else {
    printf("Sport non défini");
}
?>


<?php

$database = "sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    if (isset($_SESSION['sport'])) {
        $specialite = $_SESSION['sport'];
        $query_coach = "SELECT * FROM coach WHERE specialite = '$specialite'";
        $result_coach = mysqli_query($db_handle, $query_coach);

        if ($result_coach && mysqli_num_rows($result_coach) > 0) {
            $row_coach = mysqli_fetch_assoc($result_coach);
            ?>
            <div class="affiche-coach" style="border:1px black">
                <div class="pres-coach">
                    <table>
                        <tr>
                            <td>
                                <div class="coach-photo">
                                    <img src="src_afficher_photo.php?image=<?php echo $row_coach['photo']; ?>"
                                         alt="<?php echo $row_coach['nom']; ?>" style="max-width: 200px;
                                          max-height: 200px;">
                                </div>
                            </td>
                            <td>
                                <div class="texte-coach">
                                    <?php $nom_fichier = $row_coach['cv'];
                                    $_SESSION['cv_nom_fichier'] = $nom_fichier;
                                    include('src_afficher_cv_xml.php'); ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <table>
                    <h1>Agenda du Coach</h1>
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure de Début</th>
                        <th>Heure de Fin</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


                <div id="btns-coach" style="text-align: center;">
                    <div style="border: 1px solid black; display: inline-block;">
                        <button class="coach-btn" style="background-color: #ccc;">Prendre un RDV</button>
                        <button class="coach-btn" style="background-color: #ccc;">Communiquer avec le coach</button>
                    </div>
                </div>
            </div>
            <?php
        }
        else {
            echo "Aucun coach trouvé pour cette spécialité.";
        }
    }
    else {
        echo "La spécialité n'est pas définie.";
    }
}
else {
    echo "Erreur de connexion à la base de données.";
}
?>
