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


 <?php showArticles(); ?>


<?php include("footer.php"); ?>