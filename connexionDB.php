<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$databasename="Gestion_Notes";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion avec succès"; 
    }
catch(PDOException $e)
    {
    echo "Echec de connexion: " . $e->getMessage();
    }
?>