<?php
    $chemin_image = "rsc/" . $_GET['image'];

    if (file_exists($chemin_image)) {
        header('Content-Type: image/jpeg');
        readfile($chemin_image);
    }
    else {
        $image_par_defaut = "rsc/coach_photo_temp.jpg";
        header('Content-Type: image/jpeg');
        readfile($image_par_defaut);
    }
?>
