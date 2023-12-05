<?php

$user = 'root';
$pass = 'root';
$host = 'localhost';
$port = 8889;
$dbname = 'the_artbox';

try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}