<?php
require 'connexion.php';
require 'validate-form.php';
require 'insert-oeuvre.php';
require 'sanitize-form.php';

//TODO: Spliter le code en fonctions + separer en plusieurs fichiers .php
//documenter les fonctions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $body = [];

    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $artist = isset($_POST['artist']) ? $_POST['artist'] : '';
    $image = isset($_POST['image']) ? $_POST['image'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    $body['title'] = $title;
    $body['artist'] = $artist;
    $body['image'] = $image;
    $body['description'] = $description;

    //clean les valeurs du tableau avant validation
    $sanitizeBody = sanitizeForm($body);

    //valide les differentes valeurs
    $validation = validateForm($sanitizeBody);

    //si la validation est false, alors stopper le code
    if (!$validation) {
        return;
    }
    // Préparer et exécuter la requête d'insertion
    insertOeuvre($dbh, $sanitizeBody);
}
