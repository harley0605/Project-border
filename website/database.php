<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borderdb";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
/*if ($conn) {
    echo("connexion");
}

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

?>*/