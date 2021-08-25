<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($con);

?>

<?php include("header.php"); ?>

<section>
    <?php
    if ($user_data = check_login($con)) {

        echo '<a href="logout.php">Logout</a>';
        echo "Hello," . $user_data['nom'] . "";
    }

    ?>
</section>

<section class="showcase">
  <video src="./images/ff7.mp4" muted loop autoplay></video>
       
  <h1 class="fw-light text-white">Bienvenu chez GAMERCASH</h1>
  <p class="lead text-white">Votre spécialiste consoles de jeux next generation, livraison rapide et frais de port imbatable!</p>
  <p>
    <a href="panier.php" class="btn btn-light my-2">Voir mon panier</a>       
  </p>
</section>

 <?php showArticles(); ?>


<?php include("footer.php"); ?>