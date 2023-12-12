<?php
require 'vue/header.php';
require 'tools/connexion.php';
require 'controller/fetch-oeuvre-by-id.php';

$artworkId = isset($_GET['id']) ? $_GET['id'] : null;

$oeuvre = fetchOeuvreById($dbh, $artworkId);

if (empty($oeuvre)) {
    header('Location: index.php');
}

?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['title'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['title'] ?></h1>
        <p class="description"><?= $oeuvre['artist'] ?></p>
        <p class="description-complete">
            <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'vue/footer.php'; ?>