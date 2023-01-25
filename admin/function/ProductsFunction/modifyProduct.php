<?php
include '../../../bdConnection/dbconnexion.php';

if(isset($_GET['codeProduit']) AND !empty($_GET['codeProduit'])){
    $getIdProduit = $_GET['codeProduit'];
    $selectProduit = $connect->prepare('SELECT * FROM Produit WHERE codeProduit= ?');
    $selectProduit->execute(array($getIdProduit));
    if($selectProduit->rowCount ()>0){
        $ficheProduit = $selectProduit->fetch();
        $nomProduit = $ficheProduit['nomProduit'];
        $typeProduit = $ficheProduit['typeProduit'];
        $prixUnitaire= $ficheProduit['prixUnitaire'];
        $pointProduit = $ficheProduit['pointProduit'];


        if (isset($_POST['Submit'])){
        $nomProduit = htmlspecialchars($_POST['nomProduit']);
        $typeProduit = htmlspecialchars($_POST['typeProduit']);
        $prixUnitaire= htmlspecialchars($_POST['prixUnitaire']);
        $pointProduit = htmlspecialchars($_POST['pointProduit']);
        $updateProduit = $connect->prepare('UPDATE Produit SET  nomProduit=?,typeProduit=?,prixUnitaire=?,pointProduit=? WHERE codeProduit =?');
        $updateProduit->execute(array($nomProduit,$typeProduit,$prixUnitaire,$pointProduit,$getIdProduit));
        header('Location: ../../Products.php');
        }
        
    }else{
    
        echo "Nothing Produit";
    }

}else{
    echo "Nothing ID_Produit" ;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta nom="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <title>Modification Produit</title>
</head>
<body>
<div class="container"> 
        <h1 >Modification Produit</h1>
        <br>
        <br>
        <div class="row">
            <div class="col"></div>
            <br>
            <br>
            <div class="col-lg-5">
            <br>
            <form method="POST" action="" >
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">nom</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" nom="nom" 
                    value="<?= $nomProduit ; ?>"></input>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >typeProduit</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" nom="prenom" 
                    value="<?= $typeProduit; ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >prixUnitaire</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" nom="prixUnitaire" 
                    value="<?= $prixUnitaire;  ?>" ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">pointProduit</label>
                    <input class="form-control" id="exampleFormControlInput1" type="text" nom="pointProduit" 
                    value="<?= $pointProduit; ?>" ></input>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" nom="Submit" value="Submit" />
                
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