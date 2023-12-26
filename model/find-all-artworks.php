<?php

require_once('tools/connexion.php');

function findAllArtWorks(PDO $dbh) : array
{
    $artworkStatement = $dbh->prepare('SELECT * FROM oeuvres');
    $artworkStatement->execute();
     return $artworkStatement->fetchAll();
}