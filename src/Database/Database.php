<?php

namespace App\Database;

final readonly class Database
{
	
	public static function connect(): \PDO
    {
        try {
            $user = 'root';
            $pass = 'admin';
            $dbName = 'database';
            $dbHost = '127.0.0.1';
            $dbPort = '3307';

            $connexion = new \PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=UTF8", $user, $pass);
        } catch (\Exception $exception) {
            echo 'Erreur lors de la connexion à la base de données. : ' . $exception->getMessage();
            exit;
        }
        return $connexion;
    }
}

?>