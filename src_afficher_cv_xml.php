<?php
if (isset($_SESSION['cv_nom_fichier'])) {
    $nom_fichier = $_SESSION['cv_nom_fichier'];

    if (!empty($nom_fichier)) {
        $chemin_cv = "rsc/" . $nom_fichier;

        if (file_exists($chemin_cv)) {
            $xml = simplexml_load_file($chemin_cv);

            echo "<div class='texte-coach'>";
            echo "<h2>Informations personnelles</h2>";
            echo "<p><strong>Nom:</strong> " . $xml->informations_personnelles->nom . "</p>";
            echo "<p><strong>Prénom:</strong> " . $xml->informations_personnelles->prenom . "</p>";
            echo "<p><strong>Adresse:</strong> " . $xml->informations_personnelles->adresse . "</p>";
            echo "<p><strong>Téléphone:</strong> " . $xml->informations_personnelles->telephone . "</p>";
            echo "<p><strong>Email:</strong> " . $xml->informations_personnelles->email . "</p>";

            echo "<h2>Formation</h2>";
            echo "<p><strong>Diplôme:</strong> " . $xml->formation->diplome . "</p>";
            echo "<p><strong>Établissement:</strong> " . $xml->formation->etablissement . "</p>";
            echo "<p><strong>Année d'obtention:</strong> " . $xml->formation->annee . "</p>";

            echo "<h2>Expérience professionnelle</h2>";
            echo "<p><strong>Poste occupé:</strong> " . $xml->experience_professionnelle->poste . "</p>";
            echo "<p><strong>Nom de l'entreprise:</strong> " . $xml->experience_professionnelle->entreprise . "</p>";
            echo "<p><strong>Années d'expérience:</strong> " . $xml->experience_professionnelle->annees . "</p>";

            echo "<h2>Compétences</h2>";
            echo "<p><strong>Langues maîtrisées:</strong> " . $xml->competences->langues . "</p>";
            echo "<p><strong>Compétences informatiques:</strong> " . $xml->competences->informatique . "</p>";
            echo "<p><strong>Autres compétences:</strong> " . $xml->competences->autres . "</p>";

            echo "</div>";
        }
        else {
            echo "Le fichier CV n'existe pas.";
        }
    }
    else {
        echo "Le nom du fichier CV n'est pas défini.";
    }
}
else {
    echo "La variable de session contenant le nom du fichier CV n'est pas définie.";
}
?>
