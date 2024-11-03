<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require 'models/Database.php';
$con = Database::connect();
$con = $con->query('SELECT * FROM media');
$valeur = $con->fetchAll();
var_dump($valeur);

// phpinfo();