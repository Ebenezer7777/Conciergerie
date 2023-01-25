<?php
include '../../bdConnection/dbconnexion.php';

if(isset($_GET['codeClient']) AND !empty($_GET['codeClient'])){
    $getIdClient = $_GET['codeClient'];
    $selectClient = $connect->prepare('SELECT * FROM client WHERE codeClient= ?');
    $selectClient->execute(array($getIdClient));
    if($selectClient->rowCount ()>0){
        $ficheClient = $selectClient->fetch();
        $nameClient = $ficheClient['nameClient'];
        $adresse = $ficheClient['adresse'];
        $email= $ficheClient['email'];
        $tel = $ficheClient['tel'];
        $compteFacebook= $ficheClient['compteFacebook'];
        $compteIstagram = $ficheClient['compteiIstagram'];

        if (isset($_POST['Submit'])){
        $nameClient = htmlspecialchars($_POST['nameClient']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $email= htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $compteFacebook= htmlspecialchars($_POST['compteFacebook']);
        $compteIstagram = htmlspecialchars($_POST['compteiIstagram']);
        $updateClient = $connect->prepare('UPDATE client SET  nameClient=?,adresse=?,email=?,tel=?,compteFacebook=?,compteiIstagram=? WHERE codeClient =?');
        $updateClient->execute(array($nameClient,$adresse,$email,$tel,$compteFacebook,$compteIstagram ,$getIdClient));
        header('Location: ../Customers.php');
        }
        
    }else{
    
        echo "Nothing CLIENT";
    }

}else{
    echo "Nothing ID_CLIENT" ;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <title>Modification Client</title>
</head>
<body>
<div class="container"> 
        <h1 >Modification Client</h1>
        <br>
        <br>
        <div class="row">
            <div class="col"></div>
            <br>
            <br>
            <div class="col-lg-5">
            <br>
            <form method="POST" action="" class="">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" name="nom" 
                    value="<?= $nameClient ; ?>"></input>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Adresse</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" name="prenom" 
                    value="<?= $adresse; ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Email</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" name="Email" 
                    value="<?= $email;  ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">TEL</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="tel" 
                    value="<?= $tel; ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Compte Facebook</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="compteFacebook" 
                    value="<?= $compteFacebook; ?>"></input>
                </div><div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Compte Instagram </label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="compteIstagram" 
                    value="<?= $compteIstagram; ?>" ></input>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" name="Submit" value="Submit" />
                
            </form>
            <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
            </div>
            <div class="col"></div>
        
        </div>
    </div>
 
    <br>
    <br>
</body>
</html>