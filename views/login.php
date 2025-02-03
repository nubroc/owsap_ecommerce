<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1>Se connecter</h1>

<?php if (isset($error_message)): ?>
    <p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>

<form method="POST" action="index.php?page=login">
    <label for="email">Email</label>
    <input type="email" name="email" required><br>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" required><br>

    <button type="submit">Se connecter</button>
</form>

<p>Pas encore inscrit ? <a href="index.php?page=register">S'inscrire</a></p>

</body>
</html>
