<?php
include '../../../bdConnection/dbconnexion.php"';
if(isset($_GET['noCommande']) AND !empty($_GET['noCommande'])){
    $getIdCommande = $_GET['noCommande'];
    $selectCommande = $connect->prepare('SELECT * FROM Commande WHERE noCommande= ?');
    $selectCommande->execute(array($getIdCommande));
    if($selectCommande->rowCount ()>0){
        $deleteCommande = $connect->prepare('DELETE FROM Commande join livraison WHERE noCommande= ?');
        $deleteCommande->execute(array($getIdCommande));
        header('Location: ../../Orders.php');
    }else{
        echo "Nothing Commande";
    }

}else{
    echo "Nothing noCommande" ;
}

?>