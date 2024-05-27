
    $(document).ready(function() {
    var $carrousel = $('#carrousel ul'), // on cible le bloc du carrousel
    $img = $('#carrousel img'), // on cible les images contenues dans le carrousel
    indexImg = $img.length - 1, // on définit l'index du dernier élément
    i = 0, // on initialise un compteur
    $currentImg = $img.eq(i), // on cible l'image courante, qui possède l'index i (0 pour l'instant)
    dureeSlide = $('#dureeSlide').val() || 5000, // 5 secondes par défaut
    slideTimeout;

    $img.hide(); // on cache les images
    $currentImg.show(); // on affiche seulement l'image courante

    // image suivante
    $('.next').click(function() {
    i = (i + 1) % $img.length; // on boucle si on dépasse le nombre d'images
    changeImage();
});

    // image précédente
    $('.prev').click(function() {
    i = (i - 1 + $img.length) % $img.length; // on boucle si on va en dessous de 0
    changeImage();
});

    function createDirectNav() {
    for (let j = 0; j <= indexImg; j++) {
    $('.direct-nav').append('<button class="nav-btn" data-img="' + j + '">' + (j + 1) + '</button>');
}
    // Bouton de navigation directe
    $('.nav-btn').click(function() {
    var index = $(this).data('img');
    i = index;
    changeImage();
});
}

    createDirectNav(); // Créez les boutons de navigation directe

    function msjMini() {
    var nextIndex = (i + 1) % $img.length;
    var prevIndex = (i - 1 + $img.length) % $img.length;

    var nextImgSrc = $img.eq(nextIndex).attr('src');
    var prevImgSrc = $img.eq(prevIndex).attr('src');

    $('.next-miniature img').attr('src', nextImgSrc);
    $('.prev-miniature img').attr('src', prevImgSrc);
}

    // cette fonction mettra à jour l'image courante en fonction de l'index i
    function changeImage() {
    // Assurer l'arrêt des animations en cours pour toutes les images
    // et masquer celles qui ne sont pas l'image courante
    $img.stop(true).not($currentImg).hide();

    // Mise à jour de l'image courante en fonction de l'index
    var $nvImg = $img.eq(i);

    // Si l'image courante est différente de la nouvelle image (évite de refaire une animation sur la même image)
    if ($currentImg.get(0) !== $nvImg.get(0)) {
    // Fade out l'image actuelle, puis fade in la nouvelle image
    $currentImg.fadeOut('slow', function() {
    // Mise à jour de l'image courante après le fade out
    $currentImg = $nvImg;
    // Fade in de la nouvelle image courante
    $currentImg.fadeIn('slow');
});
}

    // Mise à jour des miniatures
    msjMini();
}

    // fonction pour animer le carrousel
    function slideImg() {
    clearTimeout(slideTimeout); // Efface le timeout précédent
    slideTimeout = setTimeout(function() {
    i = (i + 1) % $img.length;
    changeImage();
    slideImg(); // Relance la fonction pour le prochain slide
}, dureeSlide);
}

    // Changement de durée sur sélection
    $('#dureeSlide').change(function() {
    dureeSlide = $(this).val(); // Mise à jour de la durée avec la valeur sélectionnée
    slideImg(); // Relancer l'animation avec la nouvelle durée
});

    slideImg(); // Commence le défilement
});
