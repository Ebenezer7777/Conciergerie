<?php
session_start();
include '../../../bdConnection/dbconnexion.php';

global $connect;
$query = "SELECT * FROM commande join client 
on commande.codeClient = client.codeClient 
INNER JOIN livraison ON Commande.noCommande = livraison.noCommande";
$result = $connect->query($query);


if($result) {

    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=orders.xls");


    // Affichage des colonnes
    echo "Numero Commande\tNom Client\tQuantité\tTel\tDate Commande\tDate Livraison\tAdresse Livraison\n";


    // Boucle pour afficher les lignes
    while($row = $result->fetch()) {
        echo $row['noCommande'] . "\t" . $row['nameClient'] . "\t" . $row['quantite'] . "\t" . $row['tel']
         . $row['dateCommande'] . "\t"
        .$row['dateLiv'] . "\t".$row['adresseLiv'] . "\n";
    }
} else {
    echo "Error: " . $connect->error;
}

// Fermer la connexion à la base de données
$conn->close();

?>
?>