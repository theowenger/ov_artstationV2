<?php

//catching dotenv variables
$env = file_get_contents('.env');
$env = explode("\n", $env);

$dotenv = [];

foreach ($env as $line) {
    $line = trim($line);

    if ($line === '' || $line[0] === '#') {
        continue;
    }

    list($key, $value) = explode('=', $line, 2);
    $dotenv[$key] = trim($value);
}
$user = $dotenv['DB_USER'] ?? '';
$pass = $dotenv['DB_PASSWORD'] ?? '';
$host = $dotenv['DB_HOST'] ?? '';
$port = $dotenv['DB_PORT'] ?? '';
$dbname = $dotenv['DB_NAME'] ?? '';

try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
