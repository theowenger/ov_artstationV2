<?php

function sanitizeForm(array $body): array
{
    foreach ($body as &$value) {
        // Retirer les espaces en debut + fin de string
        $value = trim($value);
        // Remplacer les séquences d'espaces par un seul espace
        $value = preg_replace('/\s+/', ' ', $value);
        //Retirer les balises
        $value = strip_tags($value);
        // Encoder les caractères spéciaux
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    return $body;
}
