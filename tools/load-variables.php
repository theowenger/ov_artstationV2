<?php
function loadEnvVariables($envFilePath = '.env'): array
{
    $envContent = file_get_contents($envFilePath);
    $envLines = explode("\n", $envContent);

    $env = [];

    foreach ($envLines as $line) {
        $line = trim($line);

        if ($line === '' || $line[0] === '#') {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $env[$key] = trim($value);
    }

    return $env;
}
