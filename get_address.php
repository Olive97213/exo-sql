<?php
// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=mydbcom";
$username = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $selectedName = $_GET['name'];

    // Récupérer l'adresse e-mail correspondant au nom sélectionné
    $query = "SELECT email FROM user WHERE name = :name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $selectedName);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $email = $row['email'];

    echo $email;
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
