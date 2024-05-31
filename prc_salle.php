<!DOCTYPE html>
<?php session_start();
?><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="result-66572a02a4ee5">Sportify</title>
    <link rel="stylesheet" href="PARCOURIR.css">

</head>
<body>
<div id="wapper">

    <?php include 'src_header.php'; ?>
    <?php include 'src_navigation.php'; ?>
    <?php
    $database = "Sportify";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    $info_salle = null;
    $info_regle = null;
    $info_horaire = null;
    if ($db_found)
        $query_salle = "SELECT * FROM salle";
        $result_salle = mysqli_query($db_handle, $query_salle);
        while ($row_salle = mysqli_fetch_assoc($result_salle)) {
            $info_salle = $row_salle['info'];
            $info_regle = $row_salle['regle'];
            $info_horaire = $row_salle['horaire'];
        }

    ?>
    <section id="Salle">
        <h2>La Salle</h2>
        <p>
            <?php
            echo "<td>" . $info_salle . "</td>";
            ?>
        </p>
    </section>
    <section id="Regles">
        <h2>Nos R&egrave;gles</h2>
        <p>
            <?php
            echo "<td>" . $info_regle . "</td>";
            ?>
        </p>
    </section>
    <section id="Horaire">
        <h2>Les Horaires</h2>
        <p>
            <?php
            echo "<td>" . $info_horaire . "</td>";
            ?>
        </p>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
