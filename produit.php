<?php
session_start();
include("connection.php");
include("function.php");
$id = $_POST['articleId'];
getArticleFromId($id);

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


 <?php showArticle($id); ?>


<?php include("footer.php"); ?>