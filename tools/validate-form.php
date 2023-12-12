<?php
function validateTitle($title): ?string
{
    if (empty($title)) {
        return 'Le titre est obligatoire.';
    }

    if (strlen($title) > 50 || strlen($title) < 3) {
        return 'Le titre ne doit pas dépasser 50 caractères et faire au moins 3 caractères.';
    }

    return null;
}

function validateArtist($artist): ?string
{
    if (empty($artist)) {
        return 'L\'artiste est obligatoire.';
    }

    if (strlen($artist) > 50 || strlen($artist) < 3) {
        return 'L\'artiste ne doit pas dépasser 50 caractères et faire au moins 3 caractères.';
    }

    return null;
}

function validateDescription($description): ?string
{
    if (strlen($description) < 3 || strlen($description) > 500) {
        return 'La description doit faire entre 3 et 500 caractères.';
    }

    return null;
}

function validateImage($image): ?string
{
    if (!filter_var($image, FILTER_VALIDATE_URL) || !preg_match('/^https?:\/\//', $image)) {
        return 'Le lien vers l’image doit avoir le format attendu (https://...).';
    }

    return null;
}

function validateForm(array $body): bool
{
    $errors = [];

    $titleError = validateTitle($body['title']);
    if ($titleError !== null) {
        $errors[] = $titleError;
    }

    $artistError = validateArtist($body['artist']);
    if ($artistError !== null) {
        $errors[] = $artistError;
    }

    $descriptionError = validateDescription($body['description']);
    if ($descriptionError !== null) {
        $errors[] = $descriptionError;
    }

    $imageError = validateImage($body['image']);
    if ($imageError !== null) {
        $errors[] = $imageError;
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo htmlspecialchars($error) . '<br>';
        }
        return false;
    }

    return true;
}
