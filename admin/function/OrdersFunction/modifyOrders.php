<?php
include '../../../bdConnection/dbconnexion.php';

if (isset($_GET['noCommande']) and !empty($_GET['noCommande'])) {
    $getIdcommande = $_GET['noCommande'];
    $selectcommande = $connect->prepare('SELECT * FROM commande join client 
    on commande.codeClient = client.codeClient 
    INNER JOIN livraison ON Commande.noCommande = livraison.noCommande= ?');
    $selectcommande->execute(array($getIdcommande));
    if ($selectcommande->rowCount() > 0) {
        $fichecommande = $selectcommande->fetch();
        $nomClient = $fichecommande['nameClient'];
        $quantite = $fichecommande['quantite'];
        $telephoneClient = $fichecommande['tel'];
        $dateCommande = $fichecommande['dateCommande'];
        $dateLivraison = $fichecommande['dateLiv'];
        $adresseLivraison = $fichecommande['adresseLiv'];



        if (isset($_POST['Submit'])) {

            $nomClient = htmlspecialchars(['nameClient']);
            $quantite = htmlspecialchars($_POST['quantite']);
            $telephoneClient = htmlspecialchars(['tel']);
            $dateCommande = htmlspecialchars(['dateCommande']);
            $dateLivraison = htmlspecialchars(['dateLiv']);
            $adresseLivraison = htmlspecialchars(['adresseLiv']);
            $updatecommande = $connect->prepare('UPDATE commande 
            SET  quantite=?,dateCommande=? WHERE noCommande =?');
            $updatecommande->execute(array(
                $quantite, $dateCommande, $getIdcommande
            ));
            $updatelivraison = $connect->prepare('UPDATE livraison
            SET dateLiv=?,adresseLiv=? WHERE noCommande =?');
            $updatelivraison->execute(array(
                $dateLivraison, $adresseLivraison, $getIdcommande
            )); 
            header('Location: ../../Orders.php');
        }
    } else {

        echo "Nothing commande";
    }
} else {
    echo "Nothing ID_commande";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta nom="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <title>Modification commande</title>
</head>

<body>
    <div class="container">
        <h1>Modification commande</h1>
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
                        <label for="exampleFormControlInput1"  class="form-label">Name Client</label>
                        <input class="form-control" disabled readonly id="exampleFormControlInput1" type="text" nom="nom" value="<?= $nomClient; ?>"></input>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Quantité</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="nom" 
                        value="<?= $quantite; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tel</label>
                        <input class="form-control" disabled readonly id="exampleFormControlInput1" type="number" name="nom" 
                        value="<?= $telephoneClient; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date Commande</label>
                        <input class="form-control" id="exampleFormControlInput1" type="date" name="nom" value="<?= $dateCommande; ?>">
                        </input>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date Liv</label>
                        <input class="form-control" id="exampleFormControlInput1" type="date" name="nom" value="<?= $dateLivraison; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Adresse Liv</label>
                        <input class="form-control" id="exampleFormControlInput1" type="text" name="nom" value="<?= $adresseLivraison; ?>"></input>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" nom="Submit" value="Submit" />

                </form>
                <?php
                if (isset($erreur)) {
                    echo '<font color="red">' . $erreur . "</font>";
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