<?php
session_start();
include("connection.php");
include("function.php");
$id = $_POST['articleId'];
getArticleFromId($id);
$title = "Produit | GAMERCASH";
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

<?php 
if(!$user_data){
    header("Location: login.php");
}else{
    showArticle($id); 
}



?>



<?php include("footer.php"); ?>