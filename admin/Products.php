<?php
session_start();
include '../bdConnection/dbconnexion.php';
function totalNumberCustomers()
{
    global $connect;
    $sql = "SELECT COUNT(*) as total FROM produit";
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "0 results";
    }
}
function totalNumberProductType()
{
    global $connect;
    $sql = "SELECT DISTINCT COUNT(typeProduit) as total FROM produit";
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "0 results";
    }
}


function totalNumberSale()
{
    global $connect;
    $sql = "SELECT SUM(prixUnitaire) as total FROM produit";
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "0 results";
    }
}

function totalNumberPoint()
{
    global $connect;
    $sql = "SELECT SUM(pointProduit) as total FROM produit";
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "0 results";
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
                            <a class="nav-link" href="./Orders.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                <span class="ml-2">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Products.php">
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
                    <h1 class="mt-2">Products</h1>

                </div><br><br><br><br>
                <div class="card shadow-lg" style="background-color:rgb(235, 235, 235) ;">
                    <div class="row my-4 z-index-1 m-0 mt-5">
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 ">
                            <div class="card">
                                <h5 class="card-header">Numbers Products</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="https://www.vitacost.com/images/modules/icon_new_products.png" alt="">

                                    <h5 class="card-title col"> <?=
                                                                totalNumberCustomers();

                                                                ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Loyalty Point</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="
                                    data:image/jpeg;base64,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" alt="">

                                    <h5 class="card-title col">
                                        <?=
                                        totalNumberPoint();

                                        ?>
                                    </h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Products Type</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="
                                    data:image/png;base64,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" alt="">

                                    <h5 class="card-title col">
                                        <?= totalNumberProductType(); ?>
                                    </h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Total Price</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="
                                    data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUSEhgREhUVGBgYGBkcFRkYGhgVEhgaGBgaGhgYGBgcIy4lHB4rHxoZJjomKy8xNTU1GiU7QDszPy40NTEBDAwMBgYGEAYGEDEdFh0xMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMf/AABEIAOAA4AMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAABAIDBgcIBQH/xAA9EAABAwIDBgQDBgUEAgMAAAABAAIDBBEFITEGEhNBUXEHMmGhIoGRI0JSYqKxFHKSwdEzgrLC4fBDRNL/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A3MhCECcmp7qKlJqe6igZg8qtVUHlVqBeo5KlXVHJUoLYNfkmUtBr8kygrm8pSqam8pSqD63Ud06km6junUAkn6nunUk7U90HxNQ+UJVNQ+UILEvPr8kwlp9fkgqV1PzXmYni0FKzfqJWRt/OQCew1KxV3izhrHEB0z/VkZt+ohBsVVT+VYhhfibhtQ4ME5jcdBK0xj+ry+6ywyte0Oa4OadCCCD2IQUqUeo7qKlHqO6BxCEIE+IepRxD1KihAy1oIBICluDoER6DspoFpTY2GXZQ4h6lSm8yrQXw53vn3Vm4OgVdPzV6CiYWFxlnyVXEPUq6o0+f+UugsjcSQCbhX7g6BLw+YJtBBzBbQJbiHqU07QpNBLiHqUyGDoEonG6IPm4OgVEjiCQDZNJSbzH/AN5IPnEPUrD/ABB23bhsQZGGvqXg7jXZtY3TiPHS+g5lZZLIGNL3aNBJ7AXK5a2mxd1ZVy1LyTvOO76MGTQOmSBXE8TmqpHTTyOke7Mlxvb0A0A9Ask8Odmv42sYJ4HvprP33DebHcMcWjfaRnvWyBXg7O0Damsgp3mzZJWMcdDuucAbetltXxS2mqMOkhoaG1PE2MEFjQL5kbrSRkBbO2eaDW20mzdRSSyF8EjIuI4McQSzd3ju/FnytqnNjdt6jDXgNcXwE/HE43aRzLfwn2Ua3byunpn0k0vEZJa5c1oeACDYObbI2zvdYtdB11g2JQ1cDKmEhzHtuOo6tI5EHKydc0AEgBaT8C8dLZpKB5+F7S+MHQPbbeA7jP5Fbuk8p7IFuIepRxD1KihAzwWo4LVahAs6Qg2HJfOM5Rk1PdRQXtaHC51UuC1EHlVqBd/wac1HjOUqjkqUFrHb2R7qzgtVcGvyTKClzA0XGoVfGcrpvKUqgtEpOSs4LUu3Ud06gq4LVWZSMkykn6nugnxnKxrA4XOpS6ah8oQeJtiN3DqpzL7wp5SO4YVykuw6+mEsT4naPY5p/wBwIXJGJ0T6eZ8Egs5jy13LQ6/PVBRDK5jmvaS1zSHNIyIINwR6grb+H7fUGJxNpsYiAcMhIASy5y3g5vxMJ+i1FSUzpXtijBc57g1oHNzjYD3TdZgtRC8skgla4G1ix2voRkfkgznbbw1FPCa6gk41PbecLhzmt/E1wyc33Hry1ot57Awy0WCVL64OZGd90bH3Dg1zLH4TpvO0H+VoxBlfhjI5uL0pbrvuB7GNwPsumGyEmx5rQHgxhJlrzUkfDA0m/wCZ4LQPoXLfkeo7oL+C1HBarUIKOP6I4/oqEIL+FfO+qOB6qyPQdlNAuX7uWq+8f0UJvMq0FwG/6WX3geqKfmr0C5G7nryX3j+i+1Gnz/yl0Fwk3vhta6+8D1VcPmCbQUcK2d9Ecf0VrtD2SE0zY2l73BrWglznGzQBqSeiBrj+iRxHEKenG9UTxxg5/G5rSewJuVp7bLxVe8uhw8ljNDMR9o7+QHyj1Oa1fUVD5HF8j3PcfM5xLnHuTmUHScm3+FtNv4th7BxH1sn8P2yoJiGRVULjyBcGE35WdZc/7FbHPxV8jI5GMMbWuO8Cb7xtlZY1Kzdc5v4SR9DZB2Bx/QLVfixsO6oviNKwueBadjdXNAye0c3AajmB9db7MbbVeHuAjeXxjWJ5Jjt+X8J7Lfuxm1kGJRF8R3XttxIz5230Pq055hBzJR1b4JGyxOLHsN2uHmBC294c+IdTVVX8PVugLBG92+WiN5c21rm4bzOQCzDajw4oq9xkLTFKdXx2G8erm6E+qwGs8FJmn7OqjcOW8xzT7EoMQ2y2vq6+R0c0n2bHuDY2ANj+EkBxA8xtzJPovEwfCpayZtPTsL3uOQGgHMuPJo5lbTw3wZAdepqd4fhjZuk/7nH+y2Xs3s9TULdymja24+J2sj/VzjmUFGxuyrMOpWwNN3n4pX28zzr8hoF7/CtnfRXqEnlPZBXx/RHH9FQhBbwD6I4B9EyhBSJQMjfJHHHQqmTU91FBa5m98Q90cA+isg8qtQLg7uvPopccdCo1HJUoLy7eyHfNR4B9EQa/JMoFmsLfiPJT446FSm8pSqBjjA5ZrRvi/ta6SV2HQu+BhHHI++/Xc7N5+vZbax/EBS0stSf/AI2OcO4GXuuVqiV0j3SON3OcXOPUuNyfqUFS9nZnZ+bEJxTwAXtdznZMY0HNzj/bmvGW7PAqJn8NUPAG+ZWtJ57oYC0drueg9rZXBKLAd4y1Y4krWh3ELI22Bv8ACy9x8yV4OI+G2HVMT6ijrN3da55Je2WMAAucXAfEBrnday2xMxr6j+I3uJxHX3td2/w29N2y8qKZzL7rnN3gWmxIuCLEG2o9EFJXq7PY3LQ1DamE2c05j7rm/ea70K8pCDrXAMcjrKaOqjvuvbe2V2uGTmnPUG4+SfJ3tOXVac8DcWJE1G45C0jB0vk8D2K3HT80HzgH0X1rd3M+yYVU/lQfOOOhQZQchfNLqUeo7oJ8A+iOAfRMoQV8UdUcVvX90qhBa5hJuBqo8J3T9kxHoOymgpY4NFjkVLijqqZvMq0F0nxeXNQ4Tun7Kyn5q9AtGN03dkreKOqjPp8/8pdAw5wIsNVVwndP2RD5gm0GAeLbnMwmYjK7o2nsXtuucl1D4lUJnwqpYBchm+BzJYQ7+y5eQCyfYfax+GTmQDfjeA2WO9t4A5OHRwubdysYQg6I3sKx9gBLHSWyBIjqmegvm4fULX22fhhLRsdPTOM0bbl7bfasH4rDJwA5jRa8Y8tIc0kEG4INiCNCCNCt7+Em00tbDJBUkvdFu2e7NzmuuAHHmRbVBoRC93bShbT4hUQxizWyHdHIB1nWHoL2XhIM98GnkYo0D70UgPsf7LoeP4fNktD+BlCX4g+a2UcRB7vIA/YrfNRyQT4o6qL3BwsMyl1ZD5kHzhO6fspNYQbkaJlQk8p7IPnFHVHFHVKoQfd09CjdPQp1CCthFh2Ut4dQlZNT3UUFswuclXunoUxT+VWoKIcr3Vu8OoVNRyVKBiY3GXVUbp6FWU+vyTKBWIWITG8OoUZvKUqgYnY17XMdYhzSCOoIsQuVdr8DdQVklM4GwdeM2sHMdmwj5ZdwV1G3Ud1ju3+xrMUgsLNmYCYX/ux35T7IOYgtjeHmxlJiVNLxp9yffAjDXN3mtDdXMd5gSf06rBsTw2WmldBOxzHtObXC3zHUHqEqx5abgkHkQbH6hBteTwTn3rNq4S3qWPDrfy3I91lNJBR7N0b9+Xfkdm7QSSvtk1rbndb9bZkrGPCTHbR1Qqqm1mt4Ylk9HX3d49tFqqqmc9xc9znG5zcS469SgtxStfUTPqJPNI4uPQXOg9Bp8kmhbQ8NNgHTvbW1bS2IWdEwixlI0cRyZ+/ZBnvhHs+aOgEkg3ZKg77gciG2+AEcjbO3qs4mztbNL2V9PzQVbp6FWQixzTK83G8TipYXTTvaxjdSeZ5ADmfRA/vjqFgG1XinR0hdFEDUSC4IYQ2MH1fn7ArWu2/iPNWl0FOXRU+hsbSSDq8jQflHzWv0G6sL8ZInvDamndG0/fY/iW/mbug27XWzqGqZPG2WJwex4u1zc2kLkcLa/gXi8gqZKMuJjdGXgHNrXNIBI6X3vZBvVCS3j1KN49Sg+yanuoptgyHZfd0dAghB5ValpjY5KovtmT75ILqjkqViGP8AiZRUZczedPIPuR2LQejnnIfK59Fglb401LieDTwsHLeLnu+ZyHsg3fBr8kyufIvGOuBu6OBw6brm+4KyTCvGWF1hVQSRnm6NwkZ3INiPdBtubylKrxMG2zoaogRVLCT9153H/wBLrFZK0tIuLEdRYhAs3Ud06oEC2gSu8epQI7RbM02IM3KmMOt5XDKRv8rhn8lqXGvByVriaSdj23yZJdjh/uAIP0C3RvHqU0Gi2iDmiTwzxRpsKbe9WyRW93Ar0sM8IcQlIMnChadS5we4dmsuD9Quht0dAl5T8RQYPst4WUlG5skt6iQZgvAETT1DP83WczjMdlXvHqVfDmM+qBdXU/NWkDoFq3b/AMTmU+9S0BD5cw6QZxx9Q23md7BBlO2e29PhjPjO/MR8ETT8Z/M78LfU68lz5tPtNUYjNxahxIGTGD/TYOjW9ep1P0Xk1dU+V7pJXOe9xu5zjdxPdUIBCEIBbi8BsJJfPWOGQAjYepPxOt7LCdhtjZMSl5shYRxJLfpb1cfZdEYXQR0sTIIGhrGCzQPcnqT1QNITXCHRHCHRB9j0HZTSznkGwOiRxbGI6SF9RO8MYwXJNrk8mtHNx0AQSxnEI6aN08zgxjBdzj7AdSei0Jtt4iT1znRQExU4yDRlI/1een5R7rz9uNs5cTlzu2FpPDjvl03ndXfssTQCEIQCEIQC9jDNpaylN4KiVnoHEt/pNwvHQg2VhfjFWxfDOyKdttSDHJ/U3L9Ky/C/FyiksJmSQn1HEZ9W5/UBaGQg6qw3aClqReCoiffkHDe/pOayBui43a4g3BsfTJe/hO2dfS24NVKALfC53Ej7Bj7gfJB1WlJvMf8A3ktJYX4z1LLCphZIObmfZu+huD7LM8L8WMOmsJS+Fx132kt/qZdBm6J6xkETpZXtYxty5zjZoFkvheL0tUCaaaKW2oY8OcP5m3uPmtXeOdDU/ZTNc40zW2c1t91khcfjeOdxYAnS1ueYeRt94nyVZdTURMcGjn6Syf8A5b6an2WsUIQCEIQCy7YTYuXE5b5sgZ/qyf8AVvVx9lHYbY2TEpebIGEcSS36W9XH2XReE0EdNG2nhaGMYLBoFu5J5k9UEMMw6OlibBA0MYwWaB+5PMnqmk1wh0Rwh0QWIS3HPoksVxmOkhdPO4MY0Zk6k8gBzJ6II4xicVLE6edwYxtyTzPQAcyei51232wlxKW5u2FhPCjvoPxO6uI+iNuNsZcTmJN2wtP2UYOQH4ndXH20WKoAoQhAIQhAIQhAIQt0eH/h3Q1mHMnnDnSPLrubIW7liQAAMr9wUGl0LdGK+CTc3UtUR+WZod+tlv8AisJxTw2xGC54Ikb1jcHZdbaoMNQr6qkfE7dkY9h6PaWn6FUIBCEIHcMxCSmlbPA8sew3a4G3yPUHoukMBxSPGMOa+RoIkY5kzNQHjJw/YjuFzEt8+BUB/gJnOvumoO762jYCf2HyQaY2iwt1JVy0rtY3loPVurT82kH5rzVnXjE5hxaQM1ayMP8A5twH/iWrBUAst2F2LlxOS+bIGEcST/q3q4+yNhdjZMTlzuyBhHEkt+hvVx9l0XhNBHTxNp4WhrGizQ39yeZPVBVhmHx0sTIIWhjGCzQP3J5k9U7HqO6u4I9UGMDMXyQXIS3HPojjn0Qedi2JRUsL6idwYxguSevJoHMk5ALnfbfbCXEprm7IWE8KO+Q/M7q4+yd8TseqairdBURuiZE4hkRN+zyRk4kcxksIugEIQgEIQgEIQgEIQgF6mE4/U0ZvTTyR31DXHdPdpyP0XloQbKwnxirohu1DIpx1I4b/AKt+H9Ky7C/F2jksJmSQntvs+ozWh0IOoYMVw/EG7gfTTA/cfuOcfTcfmvPxPwsw2fNsToXEaxOLR/S67foAubl7+E7YV1LYQ1MoaPuudvssOW664HyQZ/ivgpI25pahrujZG7p/qGXssMxDw+xGF26aZ7/zR2e0/TMfMLKsK8aKllhUwxyDm5t2O+mYWU0Xi7QSZyiaI9CzfH1af7INc4J4ZV1Q8cSPgMv8TpCN63OzBmT3stv1lbT4Bhga23wAtiafNJIRcn1zzPQLwMX8XaKNh/hmyTP5Xbw2dyTn7LUG0m0U+ITcaode2TGjJjG9Gj9zzQefXVj55HzSOLnvcXPJ5km5WSbCbGyYnLzZAw/av99xvVx9lHYfY6XE5crthaRxZP8Aq2+rj7Lo3CsNip4W09O0MYwWAHPqSeZPVBXhmHx0sTYIGhjGizQP3PUnqnofMpfw/qgM3c9UDChJ5T2VfH9EcW+VtckFCFd/D+qP4f1QYvt7sXFicPJk7B9lJb9LurT7arnDFcNlpZXQTtLXtNnA+xB5g9V11xmrEdvdj4cUi/BOwHhPt+l/Vp9kHMyE5ieHSU0roJmlr2GzgfYjqD1SaAQhCAQm8OoJKiVsELS57zZrRqT/AGHqtpUngnIWAy1TWutm1rC5o9Lki6DUSFs/EPBqrZnFNC/oDvMPvdY9V+HGJRf/AFy8dWOa4fuCgxFC9KqwKqi/1KadttSY32+trLzSEAhCEAhCEAhCEAsp2J2QlxOWzbtiYRxZLZAfhb1cfbVQ2M2SlxKYMaC2JpHFkt8LR+FvVx6fVdH4Rg8VJC2npmhrGi3qTzc48yeZQRwrDYqWFtPA0NY0WAGp6uJ5k9V6NPzUeC70UmfBrzQMKqfyo4w9VFzg4WGqChSj1HdS4JX1sZBueSBlCq4w9UcYeqBZClwz0KOGehQYxt1sRFicNwAyoa37OS2Z6Nf1b+11zniWHyU0r4JmFj2EhzXAjTmOoOoOhC67a4AAXCw/xB2NixOElu62oYPsnnIH8jyPunryQczp3C8OkqpWwQNLnuNmgfuTyA6puLZ2pfV/wIidx96xZbTq4nTd530W/wDYfYqPDIshvzPA4klv0s6N/dAeH2xcWGxbxDX1Dh9pJbS/3GdG/us1VEOV75d1ZvjqEEJ9Pml0xKbiwzz5KnhnoUH2LzBQq8Kp5haWCGQfnYx/7hWRtIIJFlfvjqEGNVewOGSA71HCP5AY/wDgQFjlT4T4e/ytlYfyvJH0K2Q54tqEtwz0KDU9T4MxH/SqXjpvNaR7LyqrwWqgLx1EL+m8HM/yt28M9CmQ8dQg55HhBiW9a0HfiZf8b+yyTA/B1jHB1bNv2+5Hdrexccz8rLcW+OoVEjSSSBdAnQUUcEbYoWNYxvla0WaP/PqvQg0+ap4Z6FXRGwscs+aC5UVHJWb46hVy52tn2QUKyHzKPDPQqcQsbnJAyoSeU9kb46hRc4EEAhAshS4Z6FHDPQoHEIQgTk1PdRUpNT3UUEoKRgeZQxvEI3S+w3y0G4aXa2Tiqg8qtQL1HJUq6o5KlBbBr8kyloNfkmUFc3lKVTUvlKVQfW6junUk3Ud06gEk/U906knanug+JqHyhKpqHyhBYl59fkmEvPr8kFKup+apV1PzQMKqfyq1VT+VAspR6juoqUeo7oHEIQg//9k=" alt="">
                                    <h5 class="card-title col">
                                        <?=
                                        totalNumberSale();

                                        ?>
                                    </h5>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <h1 class="h2 mt">Products List</h1>
                <br>
                <div class="col-12 col-xl-8 mx-auto d-block">
                    <table class="table table-responsive-sm ">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nom Produit</th>
                                <th scope="col">Type Produit</th>
                                <th scope="col">Prix Unitaire</th>
                                <th scope="col">Point Produit</th>
                                <th scope="col">


                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-success ">
                            <?php
                            $selectAllProduit = $connect->query('SELECT * FROM produit');
                            while ($produit = $selectAllProduit->fetch()) {
                            ?>
                                <tr>
                                    <td><?= $produit['nomProduit'] ?></td>
                                    <td><?= $produit['typeProduit'] ?></td>
                                    <td><?= $produit['prixUnitaire'] ?></td>
                                    <td><?= $produit['pointProduit'] ?></td>
                                    <td>
                                        <a href="./function/ProductsFunction/deleteProduct.php?codeProduit=<?= $produit['codeProduit']; ?>" class="btn btn-danger">

                                            delete
                                        </a>

                                        <a href="./function/ProductsFunction/modifyProduct.php?codeProduit=<?= $produit['codeProduit']; ?>" class="btn btn-primary">

                                            Modify
                                        </a>
                                        <a href="./function/ProductsFunction/addProduct.php?codeProduit=<?= $produit['codeProduit']; ?>" class="btn btn-warning">

                                            Add
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