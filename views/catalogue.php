<?php
require_once "partials/header.php";
?>

    <?php if (empty($catalogue)): ?>
        <p class="noResults">Aucun produit trouvé.</p>
    <?php else: ?>
        <?php foreach ($catalogue as $article): ?>
            <div class="ListeArticle" onclick="window.location='/produit1?id=<?= $article->getId() ?>';">
                <img src="<?= htmlspecialchars($article->getImage()) ?>" alt="<?= htmlspecialchars($article->getNom()) ?>" width="200px">
                <div class="articles">
                    <h2><?= htmlspecialchars($article->getNom()) ?></h2>
                    <p><?= htmlspecialchars($article->getDescription()) ?></p>
                    <p>Prix : <?= htmlspecialchars($article->getPrix()) ?> €</p>
                   
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php
    require_once "partials/footer.php";
    ?>