<?php
session_start();
include '../bdConnection/dbconnexion.php';

function totalNumberOrderDelivered()
{
    global $connect;
    $sql = "SELECT  COUNT(*) as total FROM commande join livraison 
    on commande.noCommande=livraison.noCommande where livraison.statusLiv='Delivered'";

     
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "00";
    }
}
function totalNumberOrderInProgress()
{
    global $connect;
    $sql = "SELECT  COUNT(*) as total FROM commande join livraison 
    on commande.noCommande=livraison.noCommande where livraison.statusLiv='En Cours'";

     
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "00";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container-fluid ">

        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block  sidebar collapse" style="background-color:rgba(216, 188, 188, 1) ;">

                <div class="position-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="acceuilAdmin.php">
                                <img src="../images/logo.png" alt="" srcset="">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./acceuilAdmin.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span class="ml-2">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./Orders.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                <span class="ml-2">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Products.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="ml-2">Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Customers.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="ml-2">Customers</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="col-md-9 ml-sm-auto col-lg-10 h-25   ">
                <div class="row  text-white z-index-2  h-25" style="position: absolute; background-color:rgb(0, 0, 0) ;">
                    <h1 class="mt-2">Orders</h1>

                </div><br><br><br><br>
                <div class="card shadow-lg" style="background-color:rgb(235, 235, 235) ;">
                    <div class="row my-4 z-index-1 m-0 mt-5">
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 ">
                            <div class="card">
                                <h5 class="card-header">Customers</h5>
                                <div class="card-body">
                                <div class="row">
                                        <div class="col">
                                            <img style="height: 80px;" src="https://cdn.pixabay.com/photo/2020/07/14/13/07/icon-5404125_960_720.png" alt="">
                                        </div>
                                        <div class="col">
                                            <h5 class="card-title"><?= include './function/acceuilAdminFunction/numberCustomers.php'; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Numbers Orders</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="https://www.nicepng.com/png/detail/230-2303322_order-png-background-image-online-food-ordering-icon.png" alt="">

                                    <h5 class="card-title col">
                                        <?= include './function/acceuilAdminFunction/numberOrders.php' ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Orders Delivered</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSks60lVDULtsqPNn0Z4LoP7m9E3Li8BVpl6A&usqp=CAU">
                                    <h5 class="card-title col">
                                        <?=
                                        totalNumberOrderDelivered();

                                        ?>
                                    </h5>


                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Orders in Progress </h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="https://www.pngkey.com/png/detail/253-2539022_delivery-clipart-delivery-order-frames-illustrations.png">
                                    <h5 class="card-title col">
                                        <?=
                                        totalNumberOrderInProgress();

                                        ?>
                                    </h5>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <h1 class="h2 mt">Orders</h1>
                <br>
                <div class="col-12 col-xl-12 mx-auto d-block">
                    <table class="table table-responsive-sm ">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No Commande</th>
                                <th scope="col">Nom Client</th>
                                <th scope="col">Quantité </th>
                                <th scope="col">Tel</th>
                                <th scope="col">Date Commande</th>
                                <th scope="col">Date Livraison</th>
                                <th scope="col">Adresse Livraison</th>

                                <th scope="col">
                                    <a href="./function/OrdersFunction/ExportOrders.php "  class="btn btn-primary">
                                        Exporter Vers Excel
                                    </a>

                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-success ">
                            <?php
                            $selectAllCommande = $connect->query('SELECT * FROM commande join client 
                                on commande.codeClient = client.codeClient 
                                INNER JOIN livraison ON Commande.noCommande = livraison.noCommande');
                            while ($Commande = $selectAllCommande->fetch()) {
                            ?>
                                <tr>
                                    <td><?= $Commande['noCommande'] ?></td>
                                    <td><?= $Commande['nameClient'] ?></td>
                                    <td><?= $Commande['quantite'] ?></td>
                                    <td><?= $Commande['tel'] ?></td>
                                    <td><?= $Commande['dateCommande'] ?></td>
                                    <td><?= $Commande['dateLiv'] ?></td>
                                    <td><?= $Commande['adresseLiv'] ?></td>
                                    <td>
                                        <a href="./function/OrdersFunction/deleteOrders.php?noCommande=<?= $Commande['noCommande']; ?>" class="btn btn-danger">

                                            delete
                                        </a>

                                        <a href="./function/OrdersFunction/modifyOrders.php?noCommande=<?= $Commande['noCommande']; ?>" class="btn btn-primary">

                                            Modify
                                        </a>

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            View
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal  fade modal-xl" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Details Orders</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-12 col-xl-12 mx-auto d-block">
                                                            <table class="table table-responsive-sm ">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <th scope="col">code Produit</th>
                                                                        <th scope="col">Nom Produit</th>
                                                                        <th scope="col">Point </th>
                                                                        <th scope="col">Prix</th>
                                                                        <th scope="col">Type</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-success ">
                                                                    <?php
                                                                    $selectAllCommande = $connect->query('SELECT * FROM produit join commandeProduit 
                                on produit.codeProduit = commandeProduit.codeProduit 
                                INNER JOIN commande ON Commande.noCommande = commandeProduit.noCommande');
                                                                    while ($Commande = $selectAllCommande->fetch()) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $Commande['codeProduit'] ?></td>
                                                                            <td><?= $Commande['nomProduit'] ?></td>
                                                                            <td><?= $Commande['pointProduit'] ?></td>
                                                                            <td><?= $Commande['prixUnitaire'] ?></td>
                                                                            <td><?= $Commande['typeProduit'] ?></td>
                                                                        </tr>
                                                                    <?php
                                                                    }

                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

</body>

</html>