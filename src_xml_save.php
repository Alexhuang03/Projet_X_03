<?php
$cv_file = $_POST['cv_file'];
$cv_content = $_POST['cv_content'];
$result = file_put_contents('rsc/' . $cv_file, $cv_content);

if ($result !== false) {
    echo 'Une  s\'est produite lors de l\'enregistrement des modifications.';
    header('Location: ACCOUNT.php');
}
else {
    // La sauvegarde a échoué
    echo 'Une erreur s\'est produite lors de l\'enregistrement des modifications.';
}
