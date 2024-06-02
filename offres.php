<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos offres</title>

    <style type="text/css">
        .profit {
            background-color: #FBFCFC;
            color: rgb(125, 125, 229);
            border-color: rgb(125, 125, 229);
            border-radius: 10px;
            height: 36px;
            width: 150px;
            cursor: pointer;
            border-style: solid;
            border-width: 2px;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }
        #abonnement-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        #abonnement {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .offer-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 450px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            padding-bottom: 60px; /* Espace pour le bouton */
        }
        .offer-box h2 {
            margin-top: 0;
        }
    </style>

</head>
<body>
<div id="wapper">

    <?php include 'src_header.php'; ?>
    <?php include 'src_navigation.php'; ?>

    <div id="abonnement-container">
        <h1>Découvrez Nos Offres d'Abonnements :</h1>

        <div id="abonnement">
            <div class="offer-box" id="mensuel">
                <h2>Abonnement mensuel (34,99€ par mois)</h2>
                <h3>Présentation des avantages :</h3>
                <ul>
                    <li><strong>Coaching Digital :</strong> Bénéficiez de séances de coaching digital incluses pour vous aider à atteindre vos objectifs.</li>
                    <br>
                    <li><strong>Flexibilité : </strong> Aucune obligation à long terme. Arrêtez et reprenez votre abonnement selon vos besoins.</li>
                    <br>
                    <li><strong>Cours Collectifs :</strong> Participez à tous les cours collectifs disponibles sans frais supplémentaires.</li>
                    <br>
                    <li><strong>Accès aux Nouveaux Cours :</strong> Profitez de l'accès prioritaire aux nouveaux cours et événements.</li>
                    <br>
                    <li><strong>Suivi Personnalisé :</strong> Profitez d'un suivi personnalisé avec un coach dédié pour évaluer vos progrès chaque mois.</li>
                </ul>
                <button class="profit" onclick="handleButtonClick('mensuel')">
                    J'EN PROFITE
                </button>
            </div>

            <div class="offer-box" id="annuel">
                <h2>Abonnement annuel (350,88€ par an)</h2>
                <h3>Présentation des avantages :</h3>
                <ul>
                    <li><strong>Économies : </strong>Économisez plus de 20% par rapport à l'abonnement mensuel.</li>
                    <br>
                    <li><strong>Coaching Digital : </strong>Bénéficiez de séances de coaching digital incluses pour toute l'année.</li>
                    <br>
                    <li><strong>Carte Duo : </strong>Invitez un ami ou un membre de la famille à s'entraîner avec vous gratuitement une fois par mois.</li>
                    <br>
                    <li><strong>Pauses Vacances :</strong> Mettez votre abonnement en pause pendant les vacances, jusqu'à deux mois par an.</li>
                    <br>
                    <li><strong>Group Training :</strong> Participez à des séances de groupe exclusives animées par nos meilleurs coachs.</li>
                    <br>
                    <li><strong>Événements Spéciaux : </strong> gratuit ou à tarif réduit à des événements sportifs spéciaux organisés par Sportify.</li>
                    <br>
                    <li><strong>Réductions :</strong> Recevez des réductions exclusives sur des produits et services partenaires.</li>
                </ul>
                <button class="profit" onclick="handleButtonClick('annuel')">
                    J'EN PROFITE
                </button>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div id="produit"></div>
    <?php include 'src_footer.php'; ?>
    <script>
        function handleButtonClick(offre) {
            var userId = "<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>";
            if (/^\d+$/.test(userId)) {
                window.location.href = 'achat.php?offre=' + offre;
            } else {
                window.location.href = 'link_login.php';
            }
        }
    </script>
</div>
</body>
</html>
