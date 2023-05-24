<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=mydbcom";
$username = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Récupérer les informations des commandes, utilisateurs et produits depuis les tables
    $query = "SELECT  `Order`.`idOrder`, `User`.`name`, `User`.`email`, `Order`.`date`, `Product`.`name` AS 'product_name', `Product`.`price`
              FROM `Order`
              LEFT JOIN `User` ON `Order`.`User_idUser` = `User`.`idUser`
              JOIN `Product`"; // Utilisation de JOIN pour lier la table Product
              
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Créez une liste déroulante (select) avec les résultats
    echo "<select name='order' id='order' onchange='updateElements(this.value)'>";
   
    // Option titre ou option vide avec libellé spécifique
    echo "<option value='' disabled selected>Choisissez une commande</option>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $row['idOrder'] . "' data-name='" . $row['name'] . "' data-email='" . $row['email'] .  "' data-date='" . $row['date'] .   "' data-productname='" . $row['product_name'] . "' data-productprice='" . $row['price'] ."'>" . $row['idOrder'] . " - " . $row['name'] . "</option>";
    }
    echo "</select>";
    
    // Afficher les détails de la commande sélectionnée (facultatif)
    echo "<div id='selectedOrder'></div>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
