<?php
require 'header.php';
require 'connexion.php';

$artworkId = isset($_GET['id']) ? $_GET['id'] : null;


$artworkStatement = $dbh->prepare('SELECT * FROM oeuvres WHERE id = :id');
$artworkStatement->bindParam(':id', $artworkId, PDO::PARAM_INT);
$artworkStatement->execute();
$oeuvre = $artworkStatement->fetch(PDO::FETCH_ASSOC);

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

<?php require 'footer.php'; ?>