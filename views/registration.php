<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inscription</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

    <main class="bg-white p-4 rounded shadow w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Inscription</h2>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger text-center animate__animated animate__fadeInUp" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="index.php?page=register">
            <div class="mb-3">
                <label for="firstName" class="form-label">Prénom :</label>
                <input type="text" name="firstName" id="firstName" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Nom :</label>
                <input type="text" name="lastName" id="lastName" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>

        <p class="text-center mt-3">
            Vous avez déjà un compte ? <a href="index.php?page=login">Se connecter</a>
        </p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
