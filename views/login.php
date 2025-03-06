<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="../public/css/style.css" />

    <title>Login</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-primary" style="background: url('/owasp/owsap_ecommerce/image/image.png') no-repeat center center; background-size: cover; height: 100vh; width: 100%;">

    <form method="POST" action="index.php?page=login"
     class="p-4 bg-white rounded shadow w-100  animate__animated animate__slideInDown login" style="max-width: 400px;"
    >

        <h2      
        class="text-center mb-3">Se connecter</h2>

        <?php if (isset($error_message)): ?>
            <p class="alert alert-danger text-center"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control mb-2" required>

        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control mb-3" required>

        <button type="submit" class="btn btn-primary w-100">Se connecter</button>

        <p class="text-center mt-2">
            Pas encore inscrit ? <a href="index.php?page=register">S'inscrire</a>
        </p>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
