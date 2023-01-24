<?php
include '../ConnexionBD/dbconnexion.php';

if(isset($_GET['id_Client']) AND !empty($_GET['id_Client'])){
    $getIdClient = $_GET['id_Client'];
    $selectClient = $connect->prepare('SELECT * FROM client WHERE id_Client= ?');
    $selectClient->execute(array($getIdClient));
    if($selectClient->rowCount ()>0){
        $ficheClient = $selectClient->fetch();
        $nom = $ficheClient['nom_Client'];
        $prenom = $ficheClient['prenom_Client'];
        $password = $ficheClient['password'];
        $niveau_Membership = $ficheClient['niveau_Membership'];
        $poitnFidelite = $ficheClient['poitnFidelite'];
        $date_Expiration = $ficheClient['date_Expiration'];

        if (isset($_POST['Submit'])){
            //$nomNew = htmlspecialchars($_POST['nom_Client']) ;
            //$prenomNew = htmlspecialchars($_POST['prenom_Client']);
            //$passwordNew = htmlspecialchars($_POST['password']);
            $niveau_MembershipNew = htmlspecialchars($_POST['niveau_Membership']);
            $poitnFideliteNew = htmlspecialchars($_POST['poitnFidelite']);
            $date_ExpirationNew = htmlspecialchars($_POST['date_Expiration']);
    
    
            $updateClient = $connect->prepare('UPDATE client SET  niveau_Membership= ?,poitnFidelite= ?,date_Expiration= ? WHERE id_Client = ? ');
            $updateClient->execute(array($niveau_MembershipNew,
            $poitnFideliteNew,$date_ExpirationNew,$getIdClient));
            header('Location: gestionAdmin.php');
        }
        
    }else
    {
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
                    <input class="form-control" id="exampleFormControlInput1" disabled readonly type="text" name="nom" 
                    value="<?= $nom ; ?>"></input>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Surname</label>
                    <input class="form-control" id="exampleFormControlInput1" disabled readonly type="text" name="prenom" 
                    value="<?= $prenom; ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Password</label>
                    <input class="form-control" id="exampleFormControlInput1" disabled readonly type="password" name="password" 
                    value="<?= $password;  ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Niveau MemberShip</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" name="niveau_Membership" 
                    value="<?= $niveau_Membership; ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Point De Fidelité</label>
                    <input class="form-control" id="exampleFormControlInput1" type="number" name="poitnFidelite" 
                    value="<?= $poitnFidelite; ?>"></input>
                </div><div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date D'expiration </label>
                    <input class="form-control" id="exampleFormControlInput1" type="date" name="date_Expiration" 
                    value="<?= $date_Expiration; ?>" ></input>
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