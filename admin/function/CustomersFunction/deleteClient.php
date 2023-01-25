<?php
include '../../bdConnection/dbconnexion.php';
if(isset($_GET['codeClient']) AND !empty($_GET['codeClient'])){
    $getIdClient = $_GET['codeClient'];
    $selectClient = $connect->prepare('SELECT * FROM client WHERE codeClient= ?');
    $selectClient->execute(array($getIdClient));
    if($selectClient->rowCount ()>0){
        $deleteClient = $connect->prepare('DELETE FROM client WHERE codeClient= ?');
        $deleteClient->execute(array($getIdClient));
        header('Location: ../Customers.php');
    }else{
        echo "Nothing CLIENT";
    }

}else{
    echo "Nothing ID_CLIENT" ;
}

?>