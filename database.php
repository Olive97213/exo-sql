<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=mydbcom";
$username = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Récupérer les informations des utilisateurs depuis la base de données
    $query = "SELECT name, email FROM user"; // Ajout de la colonne email
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Créez une liste déroulante (select) avec les résultats
    echo "<select name='nom' id='nom' onchange='updateElements(this.value)'>";
   
    // Option titre ou option vide avec libellé spécifique
    echo "<option value='' disabled selected>Choisissez une personne</option>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $row['name'] . "' data-email='" . $row['email'] . "'>" . $row['name'] . "</option>"; // Ajout de l'attribut data-email pour stocker l'e-mail
    }
    echo "</select>";
    
    // Afficher l'e-mail sélectionné (facultatif)
    echo "<div id='selectedEmail'></div>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
