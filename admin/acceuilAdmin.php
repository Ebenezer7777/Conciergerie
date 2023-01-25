<?php
session_start();
include '../bdConnection/dbconnexion.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./style.css">

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
                            <a class="nav-link active" aria-current="page" href="acceuilAdmin.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span class="ml-2">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Orders.php">
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
                    <h1 class="mt-2">Home</h1>

                </div><br><br><br><br>
                <div class="card shadow-lg" style="background-color:rgb(235, 235, 235) ;">
                    <div class="row my-4 z-index-1 m-0 mt-5">
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 ">
                            <div class="card">
                                <h5 class="card-header">Number Customers</h5>
                                <div class="card-body ">
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
                                <h5 class="card-header">Numbers Products</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="https://www.vitacost.com/images/modules/icon_new_products.png" alt="">

                                    <h5 class="card-title col">
                                        <?= include './function/acceuilAdminFunction/numberProducts.php' ?>
                                    </h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Numbers Sales</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="https://png.pngitem.com/pimgs/s/1-19887_transparent-market-clipart-sales-and-marketing-icon-png.png" alt="">

                                    <h5 class="card-title col">
                                        <?= include './function/acceuilAdminFunction/numberSale.php' ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <h1 class="h2 mt">Sales Update</h1>
                <br>
                <div class="col-12 col-xl-8 mx-auto d-block">
                    <div class="card  text-white ">
                        <div class="card-body ">
                            <?php
                            $query01 = $connect->query("SELECT SUM(quantite) AS amount01 FROM commande WHERE dateCommande LIKE '2022-01%';");
                            foreach ($query01 as $data) {
                                $amount01[] = $data['amount01'];
                            }

                            $query02 = $connect->query("SELECT SUM(quantite) AS amount02 FROM commande WHERE dateCommande LIKE '2022-02%';");
                            foreach ($query02 as $data) {
                                $amount02[] = $data['amount02'];
                            }

                            $query03 = $connect->query("SELECT SUM(quantite) AS amount03 FROM commande WHERE dateCommande LIKE '2022-03%';");
                            foreach ($query03 as $data) {
                                $amount03[] = $data['amount03'];
                            }

                            $query04 = $connect->query("SELECT SUM(quantite) AS amount04 FROM commande WHERE dateCommande LIKE '2022-04%';");
                            foreach ($query04 as $data) {
                                $amount04[] = $data['amount04'];
                            }
                            ?>
                            <canvas id="myChart"></canvas>
                        </div>

                    </div>
                </div>
        </div>

        </main>
    </div>
    </div>

    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Sales',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [<?php echo ($quantity = intval($amount01[0]) . ", 
                        " . $quantity = intval($amount02[0]) . ", " . $quantity = intval($amount03[0]) . ", " . $quantity = intval($amount04[0])); ?>],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>