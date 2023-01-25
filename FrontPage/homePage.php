<?php
$connect = mysqli_connect('localhost', 'root', '', 'conciergerie');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/37cf037958.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Document</title>
</head>

<body>
  <nav class="navbar  navbar-expand-sm navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="./homePage.php">HOME</a>
      <a class="navbar-brand" href="./aboutPage.html">ABOUT US</a>
      <a class="navbar-brand" href="./shopPage.php">SHOP</a>
      <a class="navbar-brand" href="./blogPage.html">BLOG</a>
      <a class="navbar-brand" href="./contactPage.html">CONTACT</a>

      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarToggler"
        aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-dark" href="#accueil"><img class="icon" src="../images/twitter.png" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#accueil"><img class="icon" src="../images/facebook.png" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#accueil"><img class="icon" src="../images/instagram.png" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#accueil"><img class="icon" src="../images/pinterest.png" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#accueil"><img class="icon" src="../images/linkedin.png" alt=""></a>
          </li>
          <li class="nav-item">

        </ul>
      </div>
    </div>
  </nav>


  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container ">

      <a class="navbar-brand" href="#"><img src="../images/logo.png" alt=""></a>


      <a class="navbar-brand" href="#"><img src="../images/image1.jpg" alt=""></a>


      <div id="navbarToggler">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link text-dark" href="#accueil"><span class="material-symbols-outlined">
                favorite
              </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#portfolio"><span class="material-symbols-outlined">
                person
              </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#contact"><span class="material-symbols-outlined">
                shopping_cart
              </span></a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <nav class="navbar  navbar-expand-sm navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">COSMETICS</a>
      <a class="navbar-brand" href="#">FASHION KIT</a>
      <a class="navbar-brand" href="#">CREAM</a>
      <a class="navbar-brand" href="#">MEDICATION</a>
      <a class="navbar-brand" href="#">FACE WASH</a>



      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarToggler"
        aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="input-group pl-lg-5 ">
        <input type="text" class="form-control " placeholder="Search...." aria-label="Search"
          aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
      </div>
    </div>
  </nav>
  <br>
  <div class="container">
    <div class="row ">
      <div class="col-lg-3">
        <div class="list-group categories">
          <a href="#" class="list-group-item list-group-item-action active text-center" aria-current="true">
            Top Categories
          </a>
          <a href="#" class="list-group-item list-group-item-action"><img class="icon" src="../images/VC.png" alt="">
            VITAMIN C+ SERUM</a>
          <a href="#" class="list-group-item list-group-item-action"><img class="icon" src="../images/FH.png" alt="">
            FACE HIGHLIGHTER</a>
          <a href="#" class="list-group-item list-group-item-action"><img class="icon" src="../images/CF.png"
              alt="">CREAMY FACE WASH</a>
          <a class="list-group-item list-group-item-action disabled"><img class="icon" src="../images/FM.png"
              alt="">FACE MOISTURIZER</a>
          <a href="#" class="list-group-item list-group-item-action"><img class="icon" src="../images/RW.png"
              alt="">ROSE WATER</a>
          <a href="#" class="list-group-item list-group-item-action"><img class="icon" src="../images/F.png"
              alt="">FOUNDATION</a>
          <a href="#" class="list-group-item list-group-item-action"><img class="icon" src="../images/HC.png"
              alt="">HAIR CONDITIONER</a>
          <a href="#" class="list-group-item list-group-item-action"><img class="icon" src="../images/CF.png"
              alt="">CREAMY FACE WASH</a>
          <a class="list-group-item list-group-item-action disabled"><img class="icon" src="../images/SD.png"
              alt="">SKIN DEVELOPER</a>

        </div>
      </div>
      <div class="col-lg-1">

      </div>
      <div class="col">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
              aria-label="Slide 2"></button>

          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="../images/banner11.png" class="d-block categories w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="../images/banner22.png" class="d-block categories w-100" alt="...">
            </div>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>

  </div>
  <br>
  <div class="py-5">

    <h2 class="text-center mb-5 text-uppercase ">Our Feature Products</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <img src="../images/femme.jpg" class="fem" alt="">
        </div>
        <div class="col-lg-2">

        </div>
          
        <div class="col-lg-6 ">
          
        <?php 
        $query = "SELECT * FROM produit WHERE prixUnitaire >= 100 LIMIT 8";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
        echo "<div class='col-lg-4 col-md-6 col-12'>
        <div class='card mb-4  text-center'>
          <img class='card-img-top' src='../images/nivea.jpg' alt='Card image'>
          <div class='card-body text-center'>
            <h4>".$row["nomProduit"]."</h4>
            <a class='text-dark ' target='_blank' href='https://github.com/'>".$row["prixUnitaire"]."$</a>

            <div class='  align-items-center'>
              <div class=' text-center'>

                <a class='text-dark card-link  ml-2' href='#'>
                  ADD TO CART
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>";
            }
          }
          ?>
          
        </div>
      </div>
    </div>
  </div>




  <footer class="text-center text-lg-start bg-white text-muted">
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <img src="../images/logo.png" alt="">
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Shopping With Us
            </h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful Links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact Details</h6>
            <p><i class="fas fa-home me-3 text-secondary"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3 text-secondary"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4 text-center">
        <!-- Facebook -->
        <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i
            class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i
            class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i
            class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i
            class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i
            class="fab fa-linkedin-in"></i></a>
        <!-- Github -->
        <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i
            class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Eben alias Daddy Chocolat</a>
    </div>
    <!-- Copyright -->
  </footer>
</body>

</html>