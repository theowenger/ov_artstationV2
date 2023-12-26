<?php

require 'vue/header.php';
require 'tools/connexion.php';
require  'model/find-all-artworks.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$oeuvres = findAllArtWorks($dbh);

?>


<div id="liste-oeuvres">
    <?php foreach ($oeuvres as $oeuvre) : ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['title'] ?>">
                <h2><?= $oeuvre['title'] ?></h2>
                <p class="description"><?= $oeuvre['artist'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'vue/footer.php'; ?>