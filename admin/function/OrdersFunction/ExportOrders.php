<?php
$query = "SELECT * FROM orders";
$result = $conn->query($query);

// Vérifier si la requête a réussi
if($result) {
    // En-tête du fichier
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=orders.xls");

    // Affichage des colonnes
    echo "Order ID\tCustomer Name\tOrder Date\tTotal\n";

    // Boucle pour afficher les lignes
    while($row = $result->fetch_assoc()) {
        echo $row['order_id'] . "\t" . $row['customer_name'] . "\t" . $row['order_date'] . "\t" . $row['total'] . "\n";
    }
} else {
    echo "Error: " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();

?>
?>