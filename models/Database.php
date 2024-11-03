<?php

final readonly class Database
{

    public static function connect(): \PDO
    {
        try {
            $user = 'root';
            $pass = 'root';
            $dbName = 'Heritage_POO';
            $dbHost = 'localhost';
            $dbPort = '3306';

            $connexion = new \PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=UTF8", $user, $pass);
        } catch (\Exception $exception) {
            echo 'Erreur lors de la connexion à la base de données. : ' . $exception->getMessage();
            exit;
        }
        return $connexion;
    }
}