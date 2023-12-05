<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $artist = isset($_POST['artist']) ? $_POST['artist'] : '';
    $image = isset($_POST['image']) ? $_POST['image'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    $errors = [];

    if (empty($title)) {
        $errors[] = 'Le titre est obligatoire.';
    }

    if (empty($artist)) {
        $errors[] = 'L\'artist est obligatoire.';
    }

    if (strlen($description) < 3) {
        $errors[] = 'La description doit faire au moins 3 caractères.';
    }

    if (!filter_var($image, FILTER_VALIDATE_URL) || !preg_match('/^https:\/\//', $image)) {
        $errors[] = 'Le lien vers l’image doit avoir le format attendu (https://...).';
    }

    // S'il y a des erreurs, afficher les messages
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    } else {

        // Préparer et exécuter la requête d'insertion
        $insertStatement = $dbh->prepare('INSERT INTO oeuvres (title, artist, image, description) VALUES (:title, :artist, :image, :description)');
        $insertStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $insertStatement->bindParam(':artist', $artist, PDO::PARAM_STR);
        $insertStatement->bindParam(':image', $image, PDO::PARAM_STR);
        $insertStatement->bindParam(':description', $description, PDO::PARAM_STR);

        if ($insertStatement->execute()) {
            header('Location: index.php');
        } else {
            echo 'Erreur lors de l\'ajout de l\'œuvre.';
        }
    }
}
