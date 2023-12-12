<?php

require 'load-variables.php';

$env = loadEnvVariables();
$user = $env['DB_USER'] ?? '';
$pass = $env['DB_PASSWORD'] ?? '';
$host = $env['DB_HOST'] ?? '';
$port = $env['DB_PORT'] ?? '';
$dbname = $env['DB_NAME'] ?? '';

try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    return $dbh;
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
