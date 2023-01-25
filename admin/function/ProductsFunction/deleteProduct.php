<?php
include '../../../bdConnection/dbconnexion.php"';
if(isset($_GET['codeProduit']) AND !empty($_GET['codeProduit'])){
    $getIdProduit = $_GET['codeProduit'];
    $selectProduit = $connect->prepare('SELECT * FROM Produit WHERE codeProduit= ?');
    $selectProduit->execute(array($getIdProduit));
    if($selectProduit->rowCount ()>0){
        $deleteProduit = $connect->prepare('DELETE FROM Produit WHERE codeProduit= ?');
        $deleteProduit->execute(array($getIdProduit));
        header('Location: ../../Products.php');
    }else{
        echo "Nothing Produit";
    }

}else{
    echo "Nothing ID_Produit" ;
}

?>