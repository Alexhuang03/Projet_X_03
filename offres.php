<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nos offres</title>

        <style type= "text/css">
        .profit{
            background-color: #FBFCFC;
            color: rgb(125,125,229);
            border-color: rgb(125,125,229);
            border-radius: 10px;
            height: 36px;
            width: 150px;
            cursor: pointer;
            border-style: solid; /*couleur unie sur la bordure*/
            border-width: 2px;/*épaisseur de la bordure*/
        }
        </style>

    </head>
    <body>
    <div id="wapper">

        <?php include 'src_header.php'; ?>
        <?php include 'src_navigation.php'; ?>

        <div id="abonnement">
            <h1>Les différents types d'abonnement</h1>

            <div id="mensuel">
                <h2>Abonnement mensuel (34.99$ par mois )</h2>
                <h4>Présentation des avantages: </h4>
                <ul>
                    <li>Accès aux 100 clubs </li>
                    <li>Caching digital inclus </li>
                </ul>
                <!--TO DO: bouton pr dire que j'suis intéressé, si pas connecté,-> aller à la page de connexion, sinon plateforme de payement  -->
                <button class="profit" onclick="handleButtonClick('mensuel')">
                    J'EN PROFITE
                </button>
            </div>

            <div id="annuel">
                <h2>Abonnement annuel (350.88$ l'année)</h2>
                <h4>Présentation des avantages: </h4>
                <ul>
                    <li>Accès aux 100 clubs </li>
                    <li>Caching digital inclus </li>
                    <li>Carte Duo</li>
                    <li>Pauses Vacances</li>
                    <li>Group training</li>
                </ul>
                <!--TO DO: bouton pr dire que j'suis intéressé, si pas connecté,-> aller à la page de connexion, sinon plateforme de payement -->
                <!--plateforme de payement avec le nom, prénom, adresse, IBAN -->
                <button class="profit" onclick="handleButtonClick('annuel')">
                    J'EN PROFITE
                </button>
            </div>
        </div>
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
    </body>
</html>
