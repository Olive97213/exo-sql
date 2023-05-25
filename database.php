<?php

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=mydbcom";
$username = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Récupérer les informations des commandes, utilisateurs et produits depuis les tables
    $query = "SELECT `order`.`idOrder`, `user`.`name`, `user`.`email`, `order`.`date`, `order_has_product`.`Product_idProduct`, `product`.`name` AS product_name, `product`.`price` 
              FROM `order` 
              LEFT JOIN `user` ON `order`.`User_idUser` = `user`.`idUser` 
              LEFT JOIN `order_has_product` ON `order_has_product`.`Order_idOrder` = `order`.`idOrder` 
              LEFT JOIN `product` ON `order_has_product`.`Product_idProduct` = `product`.`idProduct`";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Créer une liste déroulante (select) avec les résultats
    echo "<select name='order' id='order' onchange='updateElements(this.value)'>";
   
    // Option titre ou option vide avec libellé spécifique
    echo "<option value='' disabled selected>Choisissez une commande</option>";
    
    // Utiliser un tableau pour stocker les détails de chaque commande
    $orders = array();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $orderId = $row['idOrder'];
        
        // Si la commande n'existe pas encore dans le tableau, l'ajouter avec les détails de base
        if (!isset($orders[$orderId])) {
            $orders[$orderId] = array(
                'idOrder' => $orderId,
                'name' => $row['name'],
                'email' => $row['email'],
                'date' => $row['date'],
                'products' => array(), // tableau vide pour stocker les noms des produits
                'price' => array()
            );
        }
        
        // Ajouter le nom du produit à la commande correspondante
        $orders[$orderId]['products'][] = $row['product_name'];
        $orders[$orderId]['prices'][] = $row['price'];

        
    }
    
    // Parcourir les commandes et générer les options de la liste déroulante
    foreach ($orders as $order) {
        echo "<option value='" . $order['idOrder'] . "' data-name='" . $order['name'] . "' data-email='" . $order['email'] . "' data-date='" . $order['date']  . "'>" . $order['idOrder'] . " - " . $order['name'] . "</option>";
    }
    
    echo "</select>";
    
    // Afficher les détails de la commande sélectionnée (facultatif)
    echo "<div id='selectedOrder'></div>";
    
    // JavaScript pour mettre à jour les détails de la commande sélectionnée
    echo "<script>
    function updateElements(orderId) {
        var selectedOrder = document.getElementById('selectedOrder');
        selectedOrder.innerHTML = ''; // Vider le contenu précédent
        
        // Récupérer les détails de la commande correspondante
        var order = " . json_encode($orders) . "[orderId];
        
        if (order) {
            // Mettre à jour les éléments HTML avec les données de la commande
            document.getElementById('orderId').textContent = order.idOrder;
            document.getElementById('orderName').textContent = order.name;
            document.getElementById('orderEmail').textContent = order.email;
            document.getElementById('orderDate').textContent = order.date;
            
           
        }
         if (order) {
                // Récupérer les éléments <td> avec la classe ou l'attribut personnalisé
                var orderProductsData = document.getElementsByClassName('orderProductsData');
                
                // Remplir les éléments <td> avec les noms des produits de la commande
                for (var i = 0; i < orderProductsData.length; i++) {
                    orderProductsData[i].textContent = order.products[i];
                }
            }
         if (order) {
                // Récupérer les éléments <td> avec la classe ou l'attribut personnalisé
                var orderPriceData = document.getElementsByClassName('orderPriceData');
                
                // Remplir les éléments <td> avec les noms des produits de la commande
                for (var i = 0; i < orderPriceData.length; i++) {
                    orderPriceData[i].textContent = order.prices[i];
                }

                
            }
            
            

    }
  </script>";
  
  
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

