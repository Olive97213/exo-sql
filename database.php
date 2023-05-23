<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=mydbcom";
$username = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Récupérer les informations des utilisateurs depuis la base de données
    $query = "SELECT name FROM user";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Créez une liste déroulante (select) avec les résultats
    echo "<select name='nom' id='nom' onchange='updateElements(this.value)'>";
   
    // Option titre ou option vide avec libellé spécifique
    echo "<option value='' disabled selected>Choisissez une personne</option>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    }
    echo "</select>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
