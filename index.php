<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($con);
$title = "Accueil | GAMERCASH";
?>


<section class="showcase">
<?php 
include("header.php"); 
?>

 <video src="./images/ff7.mp4" muted loop autoplay></video>

    <div class="overlay"></div>
  <div class="text">    
    <h1 class="fw-light text-white">Bienvenue chez GAMERCASH</h1>
    <p class="lead text-white">Votre spécialiste consoles de jeux next generation, livraison rapide et frais de port imbatable!</p>
    <a href="#product" class="btn btn-light my-2">Decouvrir les packs</a>       
  </div>

</section>



<div id="product">
  <?php

    if ($user_data = check_login($con)) {

        echo '<a href="logout.php">Logout</a>';
        echo "Hello," . $user_data['nom'] . "";
    }

    ?>
  <?php showArticles(); ?>
</div>


<?php include("footer.php"); ?>