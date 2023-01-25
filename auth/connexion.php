<?php
session_start();
include '../bdConnection/dbconnexion.php';
 
if(isset($_POST['Submit'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $password = htmlspecialchars($_POST['password']);
   if(!empty($nom) AND !empty($password)) {
      $request = $connect->prepare("SELECT * FROM client WHERE nom_Client = ? AND password = ?");
      $request->execute(array($nom, $password));
      $userexist = $request->rowCount();
      if($userexist == 1) {
         $userinfo = $request->fetch();
         $_SESSION['id_Client'] = $userinfo['id_Client'];
         $_SESSION['nom_Client'] = $userinfo['nom_Client'];
         $_SESSION['password'] = $userinfo['password'];
         header("Location: compteClient.php?id_Client=".$_SESSION['id_Client']);
      } else {
         $erreur = "Mauvais nom ou mot de passe !";
      }
   } else {
    if($nom == "ADMIN" AND $password== ""){
        header('Location: ../Admin/acceuilAdmin.php');
       }else{
      $erreur = "Tous les champs doivent être complétés !";}
   }

   
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">

    <title>Connexion</title>
</head>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">

            <div class="fadeIn first">
                <img src="../images/logo.png" id="icon" alt="logo Icon" />
            </div>

            <form method="POST" action="">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
                <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
               
                <input type="submit" class="fadeIn fourth" value="Submit">
            </form>

            <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
            ?>

            <div id="formFooter" >
                <a class="underlineHover  " href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>

