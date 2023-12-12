<?php

function fetchOeuvreById(PDO $dbh, string $artworkId): array
{

    try {

        $artworkStatement = $dbh->prepare('SELECT * FROM oeuvres WHERE id = :id');
        $artworkStatement->bindParam(':id', $artworkId, PDO::PARAM_INT);
        $artworkStatement->execute();
        $oeuvre = $artworkStatement->fetch(PDO::FETCH_ASSOC);

        if (empty($oeuvre)) {
            return [];
        }

        return $oeuvre;
    } catch (Exception $e) {
        echo ($e);
    }
}
