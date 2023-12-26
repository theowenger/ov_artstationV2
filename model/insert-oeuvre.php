<?php

function insertOeuvre($dbh, array $body): void
{
    $insertStatement = $dbh->prepare('INSERT INTO oeuvres (title, artist, image, description) VALUES (:title, :artist, :image, :description)');
    $insertStatement->bindParam(':title', $body['title'], PDO::PARAM_STR);
    $insertStatement->bindParam(':artist', $body['artist'], PDO::PARAM_STR);
    $insertStatement->bindParam(':image', $body['image'], PDO::PARAM_STR);
    $insertStatement->bindParam(':description', $body['description'], PDO::PARAM_STR);

    if ($insertStatement->execute()) {
        header('Location: index.php');
    }
}
