<?php
    include("database.php");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recherche de Véhicule</title>
</head>
<body>
        
        <button type="button" onclick="window.location.href = 'Record.php';">Nouvel Enregistrement</button>
        
    <form action="index.php" method="post">
        <label for="immatriculation">Rechercher par Immatriculation :</label>
        <input type="text" id="immatriculation" name="immatriculation" required>
        <button type="submit">Rechercher</button>
    </form>
</body>
</html>

<?php
include("database.php");

///Vérifiez si le formulaire de recherche a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['immatriculation'])) {
    $immatriculation = $_POST['immatriculation'];

    $sql = "SELECT * FROM vehicule WHERE immatriculation='$immatriculation'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des données
        while($row = $result->fetch_assoc()) {
            echo "Immatriculation: " . $row["immatriculation"]. " - Marque: " . $row["marque"]. " - Nom du propriétaire: " . $row["nom_proprietaire"]. "<br>";
            // Ajoutez d'autres champs ici
        }
    } else {
        echo "0 résultats";
    }
}

mysqli_close($conn);
?>
