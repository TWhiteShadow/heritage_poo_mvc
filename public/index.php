<?php

require_once '../config/autoloader.php';
require_once '../views/components/header.html.php';


// Charger le router et ses routes
$router = require_once '../config/routes.php';

try {
    // Résoudre la requête actuelle
    echo $router->resolve();
} catch (Exception $e) {
    // Afficher ou enregistrer l'erreur
    echo $e->getMessage();
}

require_once '../views/components/footer.html.php';

