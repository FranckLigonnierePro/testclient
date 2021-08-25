<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
include('function.php');
include('connection.php');
$title = "Panier | GAMERCASH";
if(isset($_SESSION['cart']) && empty($_SESSION['cart'])){
    echo "le panier est vide";
}

if(isset($_POST['articlePanierId'])){
    $id = $_POST['articlePanierId'];
    addToCart($id);
}

if(isset($_POST['modifyArticleId'])){
    changeQantity();
}

if(isset($_POST['index_to_remove'])){
    deleteArticle($_POST['index_to_remove']);
}

if(isset($_POST['supLePanier'])){
    $_SESSION['cart']=[];
}

if(isset($_POST['validation'])){
    $_SESSION['cart']=[];
    header('Location: /testclient/index.php');
}

?>

<?php
include('header.php');

if(isset($_SESSION['cart']) && empty($_SESSION['cart'])){
    echo "le panier est vide";
}else{

    showArticlePanier();
}

echo "<h1>total panier:" .totalArticle(). "</h1>";
echo "<h1>total frais de port:" .fdp(). "</h1>";
echo "<h1>total:" .totalArticlefdp(). "</h1>";
?>

<form method="post" action="panier.php">
    <input type="hidden" name="supLePanier"/>
    <button type="submit">supprimer le panier</button>
</form>
<form method="post" action="index.php">
    <input type="hidden" name="validation"/>
    <button type="submit">valider la commande</button>
</form>

<?php
include('footer.php');

?>