<?php
session_start();
include '../bdConnection/dbconnexion.php';
function totalNumberCustomers()
{
    global $connect;
    $sql = "SELECT COUNT(*) as total FROM client";
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "0 results";
    }
}
function totalNumberPremium()
{
    global $connect;
    $sql = "SELECT DISTINCT COUNT(*) as total FROM client join cartefidelite
     on client.id_carte=cartefidelite.id_carte where cartefidelite.membership='Premium'";
    $result = $connect->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<br>" . $row["total"];
        }
    } else {
        echo "0 results";
    }
}


function totalNumberJunior()
{
    global $connect;
    $sql = "SELECT DISTINCT COUNT(*) as total FROM client join cartefidelite
     on client.id_carte=cartefidelite.id_carte where cartefidelite.membership='Junior'";
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
                            <a class="nav-link " href="acceuilAdmin.php">
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
                            <a class="nav-link active" aria-current="page" href="Customers.php">
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
                    <h1 class="mt-2">Customers</h1>

                </div><br><br><br><br>
                <div class="card shadow-lg" style="background-color:rgb(235, 235, 235) ;">
                    <div class="row my-4 z-index-1 m-0 mt-5">
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 ">
                            <div class="card">
                                <h5 class="card-header">Numbers Customers</h5>
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
                                    data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMSEhUTExIVFRIWFRUVFxUXFRUSFRIYFxUYFhUVFxUYHSggGBolGxcXITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGy0mICUwLjcvLy0rMC81Ly4tLS8tLS0vLy0uMC0wLS0tLS01LSsvLS01NS0tLTU3LS0tLy4tLf/AABEIALcBFAMBIgACEQEDEQH/xAAbAAADAAMBAQAAAAAAAAAAAAAAAQIDBAYFB//EAD8QAAEDAwIDBwIFAgMGBwAAAAEAAhEDITESQQQFYQYTIlFxgaEywUKRsdHhUmIU8PEVIzNDgpJTVGNyk6Ky/8QAGgEBAAIDAQAAAAAAAAAAAAAAAAQFAgMGAf/EADMRAAIBAgIGCgICAgMAAAAAAAABAgMRBCEFEjFBUWETcYGRobHB0eHwIjJC8TOyFDRS/9oADAMBAAIRAxEAPwD7W94IgZSpeHNkd3pv5JfX0hAFRpJkYVF4IjfCWvTbKO7jxT1QCpjTc2Q8ajIugu12xunq02zugHqERvEe6ljdJk2Cfd/inr90a9VsIAqjVi6bXgCDlT9HWU+7m8oCabSDJwqq+LF4R3mq2Eh4Os/ZAUx4Ag5UNYQZOFXd6r4R3s2QDqeLF0qbtIg2K06/M6NLNRpPkDJHsJWlV7R0Znxn0b+5C0yxFKH7SS7UbY4erL9YvuPX0GZ2mfZXUOoQLrwz2poxGipiMN/dFLtLRGz/AHA+xKw/5lD/ANrvNjwddfwZ7dI6bGyksJM7ZXn0+c0an4wOht+q3WcY3A9JW+MozV4u65ZmiUJQdpJrryM1RwIgZSpeHNkgNN5lP6+kLIxJewkyMK3vBEDKXeabeSO703nCAKXhzZKo0kyMI+vpCevTbKAZeCI3wppjTc2T7uPFPVIu12xugB41GRdVqERvEe6WrTbO6O7/ABT1+6ATG6TJsE6o1YujXqthL6OsoCmvAEHKim0gycKu7m8o7zVbCAyd4PNJR/h+qEAmvJMHCdTw43VPIItlTSt9XygBjQ4ScpB5JjbCKgJNsdFZIjqgE8abhDG6rn0U07Zx1Q8SbY6IA1mY2mFT26bhEiI3j3lTTBBvjqgHTGrKTnkGBhOrfHwqaRF8oBPYGiRlQ6oIJeQANyYA9StPjuYNoiXzJmG7u/jquQ5lzOpXMuMN2aPpH7nqoWKxsKGW2XD3+35EzDYOdbPYuPt9tzPd4/tMGy2kNX9xx7DJ+Fz/ABXH1Kn1PJHlj4C1kKjrYurV/Z5cFkvntuXdHC0qP6rPi9v3qBCEKMlYkAhCF6AWSjXcz6XEf58ljQibTusmGk1Z7D2+E7QOFqlx5j9l7vDczaQNJEH3XDrJRrOYZaYP6qyw+k5wyqZrjv8Ant7ytr6NhLOnk/D47O4+i0wHCdykx5cYOFzHLucEmDYrpGcQ1wsRPRXlOpGpHWi7opZwlCTjJWZkqeHG6GNDhJyinb6vlKoCTbHRZmAB5JjbCp403CZIjqop2zjqgKY3Vc+inWZjaYQ8SbY6KpERvHvKAHt03CVMaspUwQb46p1b4+EAnPIMDCb2BokZVNIi+Vjpgg3x1QC74oWeW9EkBjFPTfyQ7x42Q15dY7pu8ON/NAMP02KkU4v7qms1XKkPJtthANztVh6oa7TY+qHDTcel0NbqufSyAWj8W2fuqc7VYKdZ+nbH2VObpuEAmnTlaHNeObRbrNyfpbu4/t1W3WqtDS95gNEn0XB8x411Z5ccYaP6RsFCxuL6CP4/s9nLn7cybgsL087v9Vt58vfkY+L4l1Vxe8y4/kOgGwWJCFzbbebOiSsrIEIQvLnp6nIuU9+XyS1rRkf1HHqLH4WvzHllSgYeLHDh9Lv2PRdnyPgu5otaR4jd3qdvYQPZblWk1wLXAFpyDgq7WjIyopPKfH0a5bMiklpKUazazjw9V1nzRelynkr65n6ae7jv0aNz8LoGdmaQqapJZtTOJ6nJHT9V7bGgCAIAsBgLXh9GPWvV2cFv+PHqNmI0mrWpbeL3fe7rOE59y7uKkCdDgC0nNrEE+c39wvNXddouC72iY+tnib1jI9x8wuFUTH0FRq5bHmvVd/hYl4Gv0tLPasn793jcEIQoSaZMsMGF6/KOZlpGo4XjoUvC4qVCd9z2r7vRFxWGjXhbfuf3cfQqNcVBZbDX6bFcjyTmem036rqqEPEldPGSkrrYzmpRcXZ7ShTi/um52qw9Ug8m22E3DTcel16eA12mx9UtH4ts/dNrdVz6WS1n6dsfZAU52qwSadOd03N03CTRqz8IBGnN1RqarBSXkW2VOZpuEBPcnzCEu/PRCAt0RaJ6ZSpf3fP8pNaW3OE3+LGyAVSZtMdMKjEWiflDX6bFSKZBnbKAKf8Adjr/ACh+fDjp/Cp51WCGO02PqgC0bTHvP7qWTN8dcfKNBmds/dTxNYaSdgC4+guUBzna3jrik02s50YJ/CPv+S5xZOIrF7nOOXEn+FjXKYiu61Rz7urd79bOpw9FUqah39e/7wQLe5GAeIphwBaSQQQCDLSMHqtFbHLH6atM+VRn/wChK103apF815mdRXg1yZ3buV0D/wApns0D9Fg/2Hw8gikJBBF3RIM4mF6iF1UqFJ7YruRzCr1V/J97BCS5Glx9eu9hY5jPE4NbNx4CSXWMiLT5rGtiFSaTTbexLrS9TKjh5VU2mkltb7fY69C8TmHH1aNAOeGmoXabTpGSDm+Fq8tPFFznB9Jze8GrcXa0ktgY0kb5BWLxUVNQUW3lu2Xvt7jKOFk4ubkklfftsdKtNvLaI/5VP/tB/VbiFvlFPajRGco/q7GOnRa3DQPQAL57zd816p/9R4/JxH2X0ZfNOMdL3nzc4/mSVV6Wf4RXN+RaaKX5SfIxIQhUZcja/SQ7y/RddynjdQEEx0XILd7O8bocWHY/GyvNFVrxdJ7s11b/AB8WUulKNmqi35P0+8jvTEWiY91NP+7HX+Vi4cW1bZWd51WCtiqJfnw46fwqtG0x7z+6GO02Pqp0GZ2z90AU5m+Ov8p1f7fj+E3O1WCTDpygG2IvE9cqKczeY64TNMkzsm54cIGUBcN6fCFi7g9EIChU1W80iNGLyqe0ASMpUr5QAGaro7ybeyVQkGBhWWiJ3QElum/sgN1X9kqRnKHmDbCAfefh9vsvJ7TVO7oGDd5DfzufgFevpETvE+65jtfVP+7af7j+g+5UXGzcKE2uHm7epJwcNavFc/LM5xCELlzpjY4PgalUxTYT5nDR6k2XScv7MtbBqO1EX0tkNHvk/CzdmeZiozuzAewW21N8/Ub/AMr3le4PBUHBVH+V+OxdnvcpMZjK6m6f69W3v9rAhCFalWS4wPRcbzGpw73NqUnmm46i4gOBB0kttsSYFvNdotCry2m5zXljZaSfpb4pEeK1/P1UTFUZVYpK3auazTurZXvxJWFrRpNuV+x8tjVs+XBnmcJxzTwzTxIlrnaASCdQiQTF9jceS8cVu6qTw1RxmpAp3Ie2GkEzm5I87Lt6lMEQQCPIiR+S1eF4CnTLnNaAXGcAabAQIFhafcrVUwk5aq1llb8rPWy5338PPYbqeLhHWert3XWr3W4d/I3UIQrArwXjcd2eo1LgaHebce7cflC9lC11KUKitNJ9Zsp1Z03eDscHx/Ia1OTGtv8AU28ercheWus7U800jumHxOHiPk3y9T+nquTXN4ylSpVNSm3z5Ph/fedFhKlSpTUqm/Z1cQWJp01WnzEfl/qsq1eYGA0jZw+QVlgJ6uIjzy7172PMdHWoS5Z9z9rn0LlPE6mgey9Et039l4HZ6oCwHeF71IzldMc0MN1X9kd5+H2+yTzBthVpETvE+6ARZpul9fSEUySb4Tq2wgDvIsno03Q1oIk5UU3EmDhAPvz5IWTu2+SEBiYwgycKqniwjvNVoiUfR1n2QAxwaIOVIYQZ2yq0ar4+Ud5PhjogHUOqwRTOmxU6dF87eSenVfG3mgJ0GZ2mVzHbF01GR/Qf1XU6/wAMdJ+Fy3bGlD6Z82n4P8qDpH/rS7PNE3RztiF2+Rz6EIXNnRGThuIdTcHtMOaZH7HovoPLuKFWm2oARqGDsRY+t91w/JuXmvUDfwi7j5D9zj/Rd/SphoDQIAAAHkBhXOiYTSlL+Prx9H8FPpWUG4x/l6fc/wCzIhCFclQC1ePeRTcQ8MIH1ESG9Y3W0sdSmCIIBByCJB9ljJXTR7F2aZzf+0H/APn6f/xD9l73AuJptJeHkj6gIDusbJ/4Gl/4VP8A7G/sstOmAIAAAwAIA9looUZwbcnftk/9pMk161OaSirdkV5JGRCEKSRQWtx1Uspue1upzWkgea2ULxq6sj1WTuz5jVqlzi5xlxMk+ZKle12k5V3bu8YP9244/od5eh2/0XirkqtKVKbhLb9z7TqqVSNSClHZ9y7AWrzIwyerf1C2lpc2/wCHHm5v6z9lswv+eHWvMwxX+GfU/I6jsrMA7LrnnUIC5Dsq7wgey64N0Xzt5LqjlyqZ02KjQZnaZVadV8beaNf4Y6T8IB1HahAylTOnKNGm+fhKNfSPdAJzCTIwrc4OEDKXeRaEd3pvlAR3J8kK+/6fKEA3sAEjKVPxZupY0gycKqt8IBPcWmBhUWACd8opuAEHKhrTM7IB0zqsboedJgWVVTOEUjAugDSIneJ91zfaxpLWHyMfn/oF0OkzO0z7LR5/S7yk4C5iR7XWjE0+koyit6+V4m7D1Ojqxk9z+GcMhCFyidzqTrOzfGcO2mGB2l5u7V4dR6HBHkF0i+Xre4HnNal9LpaPwu8TfbceytcNpNU4qM45Levb27irxGjXOTlCWb4+/wB6zq+0HEPZTaWO0l1RrSYBsQ7z9lh4Ti6jKxpVKgqt7sv1BoaWxsQP83Cy9oOEdUpsaG6v940kC1ocD+q2+G5dSpghjA3UIOSSPKTdWLhUde6eStvdt91b9Xfe924gKdKNBJq7d9yvuzvtVt3E8rgTxHENNUVe6aSdDQwOEDzJ6oPM3u4Wo+dNWm7QSAM6m3g2wU+CFfh290KPeAE6HhwAIN7ja/8AndI8tqN4WoyNVWo7WQIzqbacYEqKuk6N21tbUlrXv+1srXyvfZq5W7CS+j189W2tHVtbZfO9t1tutnftHzXi6wHD90fE9jnEQDqLWtd5euPNZavM9TeHex0CpVa1wsejm3VVeFeanCnSYptdrNvDLGi/uFqV+W1G126GzRNVlXbwEGHb+/5eSzm6sZSau02lvy/GLuuX7J9a4Mxpqi1FO10m92f5SVn4W+UXzN1enUptFcxUqFoHds8AkR/7on4T5jXq0u6purQHF2qtoHsIwP8APVbXN+Ge+rw5a2QypLjbwiW3+CsvMqjxDf8AD96wi922Poc+qylTadTOSzVs5PLJvK/HJvdnbIwhUi1Tyi8nfKK4pbu1J7TLy5jwzx1BUky1wAHhgRjO91tPeAJJAAyTYBeX2f4V1NjtQ0hzy5rJ1aAdpXL884p7qr2ucSGvcAMAAExYdN17PFdBQjJxd3uu/FvPZxV7bTynhOmrSjGSst6Xkll3ZcD3Ob8+o6XU2jvZEEYaOurfzt+a5JCFSYjETry1pFzQw8KMdWILzebvvTb5uJ/IR916S8p7tfERs2G++T+seykaOhrYhPhdmnSE9Wg1xsvvYdv2ZowwHeJXTUjqsbrxOQcOWgGLL3ahkWXRnOkvOkwLKtIid4n3RSMC6jSZnaZ9kA2O1GDhOodOLJ1DIgZRSMZQA1gIk5UMeSYOEOaSZGFdRwIgZQD7oeX6oWLQ7yQgLNTVbzQPB1lNzA24ykzxZ2QAWaro7yfD7JPfpsFRYAJ3ygEG6b52QW6r42Qw6rFD3abD1QB3n4fb7LFWpQJys2gRO+fupa7VY4QHA80oaKjhsTI91qrqO0fA2kC4v/C5dc1jsP0NV8HmvVdj8LHSYKv0tJX2rJ+j7V43BXRZLmjzIH5mFCycLV0va4iQ1zXR5wQYUNJNq+wlu9sj6YhcpU7WnaiPd8/ZYH9q6uzKY9nH7ro5aTw+537H6o56Ojq72pLtR2SFq8BxIq021B+IY8jgj2MraU2MlJJohNOLs9oIQhengIWOo8AEkwAJJ8gMri6vaSvqcWuAaSdLS1thsJiVGxGKhQtr3z4EjD4Wde+ru4ncLgO0TI4mp6g/m0H7rbb2prf00z6g/Zy8vmPGms8vcACQAYmLW3VXj8XSr01GN7p32cmvUtMFhKlGo3K1mvY10IQqoszDxdcU2Oedh+Z2H5rW7McEXu1HJMnqd1qcxq97UFNv0tN+rv4+5XZdm+C0AWXRaOoOnT1ntl5bvftKDSNfpKmqtkfPf7dh03ACGhsdFthum+dkmUgBO+U2HVYqwK8C3VfGyO8/D7fZD3abD1T0CJ3z90AgzTfKCNfSEmO1WKbzpwgGKkWSFPTdNtMETupa4uscICu/6IVdyEkBjZM3mOuFVX+34/hDqmqw3Q3w538kA6cRfPVQJnePhNzNVwqNQG2+EAVf7c9EmRHiz1Q0abn0shzdVx6XQE3neJ9oV1Ii2eiWu2nfH2Sa3Tc/CAxVKQIOr5XHc44EscSB4T+S7Z414+Vo8fw4LdJF1pxFCNaGpL+jdQryoz1o93E4VC2+P4F1M3wtRcxWozoy1Zr5Olo1o1Y60AQhC1Gw6Tshx0OdRJsfE31A8Q/K/sV6/N+cMoCPqqbNH6nyC4alULSHNMOBkEbKXOJJJJJNyTcnqSp9LSE6dHo0s9z4L4z8CBVwEKlbXls4cWbnEc1qvqCoXEEfTFg3oB++V0XKO0bXw2rDXbOw13r/AEn4XIoWmli6tOesne+2+d/vH0N9bCUqsdVq1tlt33h65nZdq+N0UtAPiqW/6R9X52HuVxqb6hMSSYECTMDyHRJeYrEOvU1tnBfedxhqCoQ1fEEIQo5IBedzXj9A0N/4jv8A6jz9fJPmPMQzwt8VQ7bN6u/ZYuTcrdUdLpLiZJO6s8DgnUaqVF+O5cfjz6itxuNUF0cNu/l8/dptdneUkwYX0jlnDhjRMT1WjyblwpC4/Jex3eq4wr8ogaDO8fCur/bnog1Abb4SaNNz6WQAyI8Weqm87xPtCpzdVx6XRrtp3x9kA6kRbPRFP+75Sa3Tc/CHDVjbzQEumbTHwrfEWiemUCoBbdS1hbcoCYd1+ULL3w6oQEmnpuNkN8WdvJSwmbzHVVVt9PwgE5+mwVGnF98oYARfPVQCZ3j4QFNOqx9bIc7TYeqdS2PhFK4vnqgF3f4t8/dDXarFTJneJ9oV1AALZ6IBOOnG/mjug65RTv8AV8qXEzaYQHn8dwgqiCBdcrzLlzqRsCR8hd7UaItnotSpwgeDq+Vrq0YVY6s1dfdn3wyNlKrOlLWg7M+ftdKa9vmvI7ktBHovG4nhalPbUPyKpq2ipxzpu64PJ+z8C4o6Tg8qit1Zr38yULX/AMUB9Qc31E/oqHEs/rHuY/VQJ4etD9oPu9SdDEUp/rJd5mQsffs/rb/3BQ7i6Y/G38wf0WChN7E+4zc4ra0Z0LRfzWmManejT+pha7uPqv8AoYG9T4j+WP1Uinga8/4268vnwI88bQh/K/Vn8eJ6dWq1olxAHmbLyK/M3VPDRBA/rIv/ANI29SsnC8mqVXS8l3rt6eS6fl3Z3TFlaYfRkIZ1Pyfh7vt7isxGkZzyh+K8fZdhz/KOSGbiepvK77lnKBTE7hbnAcva0CQJW3SBm8x1VmVo6bdVjt5JufpsE6tvp+E2AEXz1QAacX3yk06rH1spBM7x8K6lsfCATnabD1R3f4t8/dOlcXz1USZ3ifaEBTXarFDjpxv5p1AALZ6JU7/V8oBinN1LX6rFJxM2mFdQCLZ6IB9yOqFi1O6oQFueHCBlDPDndBp6b+SB4+kIBPbquMKi8ERvhIv02yju48XugBg03KT26rj0TDtVsboLtNs7oB6xEbxH2UsbpuU+7/F7/dAfqthADxqwm14Ag5SJ0dZR3c3QCYwtMnCdTxY2QKmqyR8HWfsgAQBBytKry4G5FlvaNV0d5NkBz/F8ja/AXl1uzjRYhdoRp6yl3QffCA+fv7K7xbKB2ZBwF31vpjp9kdyGXzslxY4vh+zQbkL0eG7OgXiy6UUw6+Nka48MdEBoUuXtiALrdo0wzKss03ygePpCATmE3GE3PDhAyg1NNvJHd6b+SAGeHO6T26rjCY8fSEF+m2UAy8ERvhJg03KO7jxe6A7VbG6AT26rj0VaxEbxH2SLtNs7o7v8Xv8AdAJjdNym8asID9VsIJ0dZQDa8AQcqWMLTJwn3c3QKmqyAvvgkl3HVCAhjyTBwqqeHFkIQDptBEnKgPJMbYQhAXUGnFkUhqEm6EICNZmNpj2V1GwJFihCAKY1Zuoc8gwMIQgLqNAEjKVPxZuhCAmo4gwMK3MAEjKaEBNM6s3Se6DAsEIQFaBE7xPuppmTBuhCAKp04sqawETvlNCAim4kwcJ1PDiyEIBsYCJOVDHkmDhCEBVTw4snTaCJOU0IDGHkmNsK6g04shCAKQ1CTdRrMxtMeyEIC6jYEixRTGrN0IQEOeQYGFdRoAkZTQgMXeHzQhCA/9k=" alt="">

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
                                <h5 class="card-header">Premium Customers</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px; " src="data:image/jpeg;base64,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"
                                  >  <h5 class="card-title col">
                                        <?= totalNumberPremium(); ?>
                                    </h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                            <div class="card">
                                <h5 class="card-header">Junior Customers</h5>
                                <div class="card-body row">
                                    <img class="col" style="height: 80px;" src="http://cdn.onlinewebfonts.com/svg/img_351980.png">
                                    <h5 class="card-title col">
                                        <?=
                                        totalNumberJunior();

                                        ?>
                                    </h5>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <br>
                <br>
                <h1 class="h2 mt">Customers List</h1>
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
                            while ($client = $selectAllClients->fetch()) {
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
                                        <a href="./function/CustomersFunction/deleteClient.php?codeClient=<?= $client['codeClient']; ?>" class="btn btn-danger">

                                            delete
                                        </a>

                                        <a href="./function/CustomersFunction/modifyClient.php?codeClient=<?= $client['codeClient']; ?>" class="btn btn-primary">

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