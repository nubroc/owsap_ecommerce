<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-4">Contactez-nous</h1>

        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=contact" id="contactForm">
            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text" id="title" name="title" class="form-control" <?php echo !empty($successMessage) ? 'disabled' : ''; ?> required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea id="description" name="description" class="form-control" rows="4" <?php echo !empty($successMessage) ? 'disabled' : ''; ?> required></textarea>
            </div>

            <div class="d-grid">
                <input type="submit" value="Envoyer" class="btn btn-primary" <?php echo !empty($successMessage) ? 'disabled' : ''; ?>>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>