<?php
include '../ConnexionBD/dbconnexion.php';
if(isset($_GET['id_Client']) AND !empty($_GET['id_Client'])){
    $getIdClient = $_GET['id_Client'];
    $selectClient = $connect->prepare('SELECT * FROM client WHERE id_Client= ?');
    $selectClient->execute(array($getIdClient));
    if($selectClient->rowCount ()>0){
        $deleteClient = $connect->prepare('DELETE FROM client WHERE id_Client= ?');
        $deleteClient->execute(array($getIdClient));
        header('Location: gestionAdmin.php');
    }else{
        echo "Nothing CLIENT";
    }

}else{
    echo "Nothing ID_CLIENT" ;
}

?>