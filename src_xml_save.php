<?php
// Récupérer le nom du fichier et le contenu brut du fichier XML de la requête POST
$cv_file = $_POST['cv_file'];
$cv_content = $_POST['cv_content'];

// Enregistrer le contenu brut du fichier XML dans le fichier
$result = file_put_contents('rsc/' . $cv_file, $cv_content);

// Traiter le résultat de l'enregistrement
if ($result !== false) {
    // La sauvegarde a réussi
    echo 'Une  s\'est produite lors de l\'enregistrement des modifications.';

    header('Location: ACCOUNT.php');
} else {
    // La sauvegarde a échoué
    echo 'Une erreur s\'est produite lors de l\'enregistrement des modifications.';
}
