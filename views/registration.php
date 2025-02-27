<?php 
require_once "partials/header.php";?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
    </head>
    <body>
        <main>
            <h2>Inscription</h2>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="post" action="index.php?page=register">
                <label>Nom :</label>
                <input type="text" name="name" required>
                <br>
                <label>Nom complet :</label>
                <input type="text" name="fullname" required>
                <br>
                <label>Email :</label>
                <input type="email" name="email" required>
                <br>
                <label>Mot de passe :</label>
                <input type="password" name="password" required>
                <br>
                <button type="submit">S'inscrire</button>
            </form>
        </main>
    </body>

    <?php
    require_once "partials/footer.php";
    ?>

</html>
