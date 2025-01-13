<?php

class Database
{


    public static function getConnection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "tp_notes";
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Optionnel : mode d’erreurs
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
