<?php require 'vue/header.php'; ?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="champ-formulaire">
        <label for="artist">Auteur de l'œuvre</label>
        <input type="text" name="artist" id="artist">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'vue/footer.php'; ?>