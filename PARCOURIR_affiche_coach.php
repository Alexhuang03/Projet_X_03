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
                // Code par défaut si le sport n'est pas trouvé
                printf("Sport non trouvé");
        }
    } else {
        // Gérer le cas où le sport n'est pas défini
        printf("Sport non défini");
    }
?>


<div class="affiche-coach">
    <div class="pres-coach">
        <table>
            <tr>
                <td>
                    <div class="coach-photo">
                        <img src="img/coach_photo_temp.jpg" alt="Coach Carter" style="max-width: 200px; max-height: 200px;">
                    </div>
                </td>
                <td>
                    <div class="texte-coach">
                        <p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <table>
        <h1>Agenda du Coach</h1>
        <thead>
        <tr>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
            <th>Dimanche</th>
        </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
    <div id="btns-coach" style="text-align: center;">
        <div style="border: 1px solid black; display: inline-block;">
            <button class="coach-btn" style="background-color: #ccc;">Prendre un RDV</button>
            <button class="coach-btn" style="background-color: #ccc;">Communiquer avec le coach 2</button>
            <button class="coach-btn" style="background-color: #ccc;">Voir son CV</button>
        </div>
    </div>
</div>