<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Footer with Google Maps</title>
</head>
<body>
<footer>
    <p>
        Restez en contact :
    <ul>
        <li>Mail: <a href="mailto:omnes.sportify@edu.ece.fr">omnes.sportify@edu.ece.fr</a></li>
        <li>Tél: <a href="tel:+33123456789">01 23 45 67 89</a></li>
        <li>Adresse: <a href="https://www.google.fr/maps/place/13+Rue+Sauveur+Tobelem,+13007+Marseille/@43.288203,5.3613525,17z/data=!3m1!4b1!4m6!3m5!1s0x12c9c0cfaaa4abeb:0x12487a7ccecb109a!8m2!3d43.288203!4d5.3639274!16s%2Fg%2F11csfw4l80?entry=ttu">13 Rue Sauveur Tobelem, 13007 Marseille</a></li>
    </ul>
    </p>
    <div style="width: 100%; height: 300px;">
        <iframe
                width="80%"
                height="100%"
                frameborder="0" style="border:0"
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.6346803067544!2d5.3613525!3d43.288203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0cfaaa4abeb%3A0x12487a7ccecb109a!2s13%20Rue%20Sauveur%20Tobelem%2C%2013007%20Marseille!5e0!3m2!1sen!2sfr!4v1678265478416!5m2!1sen!2sfr"
                allowfullscreen>
        </iframe>
    </div>
</footer>

<style>
    footer {
        background-color: #333333;
        padding: 20px;
        text-align: center;
        margin-top: 20px;
        border-top: 1px solid #ddd;
    }

    footer p {
        margin: 0;
    }

    footer ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    footer li {
        margin: 5px 0;
    }

    footer a {
        color: #007bff;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }
</style>

<script>
</script>
</body>
</html>
