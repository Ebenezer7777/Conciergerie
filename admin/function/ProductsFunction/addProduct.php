<?php
include '../../../bdConnection/dbconnexion.php';


if (isset($_POST['Submit'])) {
	$nomProduit = @$_POST['nomProduit'];
	$typeProduit = @$_POST['typeProduit'];
	$prixUnitaire = @$_POST['prixUnitaire'];
	$pointProduit = @$_POST['pointProduit'];


	if (!empty($_POST['nomProduit']) && !empty($_POST['typeProduit']) 
    && !empty($_POST['prixUnitaire']) && !empty($_POST['pointProduit'])) {
	
		print_r($_POST);

		//insert pro
		$request = $connect->prepare("INSERT INTO produit VALUES (NULL,?,?,?,?)");
		$request->execute(array($_POST['nomProduit'], $_POST['typeProduit'], $_POST['prixUnitaire'], $_POST['pointProduit']));
        header('Location: ../../Products.php');
	}
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
    <title>Ajout Produit</title>
</head>
<body>
<div class="container"> 
        <h1 >Ajout Produit</h1>
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
                    <label for="exampleFormControlInput1" class="form-label">Nom Produit</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" name="nomProduit" 
                   ></input>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Type Produit</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="text" name="typeProduit" 
                     ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Prix Unitaire</label>
                    <input class="form-control" id="exampleFormControlInput1"  type="number" name="prixUnitaire" 
                    ></input>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Point Produit</label>
                    <input class="form-control" id="exampleFormControlInput1" type="number" name="pointProduit" 
                     ></input>
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