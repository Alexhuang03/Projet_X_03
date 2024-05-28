<?php
$texteBouton = "Votre Espace";
$lienBouton = "ACCOUNT.php";
$afficherDeconnexion = false;

if (isset($_SESSION['user_role'])) {
    switch ($_SESSION['user_role']) {
        case 'admin':
            $texteBouton = "Mon Compte Administrateur";
            $afficherDeconnexion = true;
            break;
        case 'coach':
            $texteBouton = "Mon Compte Pro";
            $afficherDeconnexion = true;
            break;
        case 'client':
            $texteBouton = "Mon Compte Client";
            $afficherDeconnexion = true;
            break;
        default:
            $texteBouton = "Se Connecter";
            $afficherDeconnexion = false;
            break;
    }
}
?>

<link href="src_navigation.css" rel="stylesheet" type="text/css"/>

<div id="navigation" style="border:1px solid black;">

    <a href="INDEX.php"><button>Accueil</button></a>
    <div class="menu">
        <button class="menu-btn">Tout Parcourir</button>
            <div class="dropdown-content">
                <div class="dropdown-item">
                    <a href="PARCOURIR.php#activites-sportives">Activités sportives</a>
                    <div class="sub-dropdown-content">
                        <a href="PARCOURIR.php#Musculation">Musculation</a>
                        <a href="PARCOURIR.php#Fitness">Fitness</a>
                        <a href="PARCOURIR.php#Biking">Biking</a>
                        <a href="PARCOURIR.php#Cardio-Training">Cardio Training</a>
                        <a href="PARCOURIR.php#Cours-Collectifs">Cours Collectifs</a>
                    </div>
                </div>
                <div class="dropdown-item">
                    <a href="PARCOURIR.php#competition">Les Sports de compétition</a>
                    <div class="sub-dropdown-content">
                        <a href="PARCOURIR.php#Basketball">Basketball</a>
                        <a href="PARCOURIR.php#Football">Football</a>
                        <a href="PARCOURIR.php#Rugby">Rugby</a>
                        <a href="PARCOURIR.php#Tennis">Tennis</a>
                        <a href="PARCOURIR.php#Natation">Natation</a>
                        <a href="PARCOURIR.php#Plongeon">Plongeon</a>
                    </div>
                </div>
                <div class="dropdown-item">
                    <a href="PARCOURIR.php#salle-de-sport">Salle de sport Omnes</a>
                    <div class="sub-dropdown-content">
                        <a href="PARCOURIR.php#Regles">Regles</a>
                        <a href="PARCOURIR.php#Horaire">Horraire</a>
                    </div>
                </div>
            </div>
    </div>

    <a href=""><button>Recherche</button></a>

    <a href="Rendez_Vous.php"><button>Rendez-vous</button></a>

    <div class="menu">
        <button class="menu-btn"><?php echo $texteBouton; ?></button>
        <div class="dropdown-content">
            <?php if (!$afficherDeconnexion): ?>
                <div class="dropdown-item">
                    <a href="link_login.php">Se Connecter</a>
                </div>
                <div class="dropdown-item">
                    <a href="link_signin.php">Créer un Compte</a>
                </div>
            <?php endif; ?>
            <?php if ($afficherDeconnexion): ?>
                <div class="dropdown-item">
                    <a href="ACCOUNT.php">Tableau de Bord</a>
                </div>
                <div class="dropdown-item">
                    <a href="link_logout.php">Déconnexion</a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
