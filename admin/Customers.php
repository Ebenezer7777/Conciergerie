<?php
session_start();
include '../bdConnection/dbconnexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container-fluid ">

        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block  sidebar collapse"
                style="background-color:rgba(216, 188, 188, 1) ;">

                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link "  href="acceuilAdmin.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span class="ml-2">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Orders.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                <span class="ml-2">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Products.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="ml-2">Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Customers.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
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
                <div class="row  text-white z-index-2  h-25"
                    style="position: absolute; background-color:rgb(0, 0, 0) ;">
                    <h1 class="mt-2">Home</h1>

                </div><br><br><br><br>
                <div class="card shadow-lg" style="background-color:rgb(235, 235, 235) ;">
                    <div class="row my-4 z-index-1 m-0 mt-5">
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 ">
                            <div class="card">
                                <h5 class="card-header">Customers</h5>
                                <div class="card-body">

                                    <h5 class="card-title">354 k</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Revenue</h5>
                                <div class="card-body">
                                    <h5 class="card-title">$2.4k</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Purchases</h5>
                                <div class="card-body">
                                    <h5 class="card-title">43</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Traffic</h5>
                                <div class="card-body">
                                    <h5 class="card-title">64k</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <h1 class="h2 mt">Customers</h1>
                <br>
                <div class="col-12 col-xl-12 mx-auto d-block">
                    <table class="table table-responsive-sm ">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nom Clients</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Compte Facebook</th>
                                <th scope="col">Compte Instagram</th>
                                <th scope="col">Membership</th>
                                <th scope="col">Date Adhesion</th>
                                <th scope="col">
                                    <a href="../ConnexionBD/deconnexion.php" class="btn btn-primary">
                                        Log Out
                                    </a>

                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-success ">
                            <?php
$selectAllClients = $connect->query('SELECT * FROM client 
JOIN cartefidelite ON client.id_carte = cartefidelite.id_carte');
    while($client = $selectAllClients->fetch()){
        ?>
                            <tr>
                                <td><?= $client['nameClient'] ?></td>
                                <td><?= $client['adresse'] ?></td>
                                <td><?= $client['email'] ?></td>
                                <td><?= $client['tel'] ?></td>
                                <td><?= $client['compteFacebook'] ?></td>
                                <td><?= $client['compteiIstagram'] ?></td>
                                <td><?= $client['membership'] ?></td>
                                <td><?= $client['dateAdhesion'] ?></td>
                                <td>
                                    <a href="./function/CustomersFunction/deleteClient.php?codeClient=<?=  $client['codeClient']; ?>"
                                        class="btn btn-danger">
     
                                        delete
                                    </a>

                                    <a href="./function/CustomersFunction/modifyClient.php?codeClient=<?=  $client['codeClient']; ?>"
                                        class="btn btn-primary">
            
                                        Modify
                                    </a>
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