<?php

function check_login($con)
{

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from clients where id = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //redirect to login
    //header("Location: login.php");
    //die;
}

function getArticles()
{
    include("connection.php");
    $sql = "SELECT * FROM articles";
    if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_close($con);
}

function showArticles(){   
    $result = getArticles();

    while ($article = mysqli_fetch_array($result)) {
        echo "<div class='my-2 d-flex'>";
        echo "<div>";
        echo '<img class="ffpic" src="' . $article['image'] . '" alt="' . $article["nom"] . '">';
        echo "</div>";

        echo "<div>";
        echo "<h1>" . $article['nom'] . "</h1>";
        echo "<h1>" . $article['description'] . "</h1>";
        echo "<h1>" . $article['prix'] . "€</h1>";
        echo '<form method="post" action="produit.php"' . $article['id'] . '">';
        echo '<input type="hidden" name="articleId" value="' . $article['id'] . '">';
        echo '<button type="submit" class="btn btn-sm btn-outline-secondary">Déscription</button>';
        echo '</form>';
        echo '<form method="post" action="panier.php"' . $article['id'] . '">';
        echo '<input type="hidden" name="articlePanierId" value="' . $article['id'] . '">';
        echo '<button type="submit" class="btn btn-sm btn-outline-secondary">Ajouter au panier</button>';
        echo '</form>';
        echo "</div>";
        echo "</div>";
        
    }
}

function getArticleFromId($id){
    $articles = getArticles();
    foreach($articles as $article){
        if ($id == $article['id']){
            return $article;
        }
    }
}

function showArticle($id){

    $article = getArticleFromId($id);

    echo '<img src="' . $article['image'] . '" alt="' . $article["nom"] . '" width="350">';
    echo "<h1>" . $article['nom'] . "</h1>";
    echo "<h1>" . $article['description'] . "</h1>";
    echo "<h1>" . $article['prix'] . "€</h1>";
    echo '<form method="post" action="produit.php"' . $article['id'] . '">';
    echo '<input type="hidden" name="articleId" value="' . $article['id'] . '">';
    echo '<button type="submit" class="btn btn-sm btn-outline-secondary">Déscription</button>';
    echo '</form>';
    echo '<form method="post" action="panier.php"' . $article['id'] . '">';
    echo '<input type="hidden" name="articlePanierId" value="' . $article['id'] . '">';
    echo '<button type="submit" class="btn btn-sm btn-outline-secondary">Ajouter au panier</button>';
    echo '</form>';
}

function addToCart($id){
    $articleDejaLa = FALSE;
    $articleAjouté = getArticleFromId($id);
    for ($i = 0; $i < count($_SESSION['cart']); $i++){
        if($articleAjouté['id'] === $_SESSION['cart'][$i]['id']){
            $articleDejaLa = TRUE;
            echo "<scripy>alert(\"cet article est deja dans le panier\")</scripy>";
        }
    }
    if (!$articleDejaLa) {
        $articleAjouté['qty'] = 1;
        array_push($_SESSION['cart'],$articleAjouté);
    }

}

function showArticlePanier(){
    
    foreach($_SESSION['cart'] as $article)

    echo '<img src="' . $article['image'] . '" alt="' . $article["nom"] . '" width="350">';
    echo "<h1>" . $article['nom'] . "</h1>";
    echo "<h1>" . $article['description'] . "</h1>";
    echo "<h1>" . $article['prix'] . "€</h1>";
    echo '<form method="post" action="panier.php">';
    echo '<input type="hidden" name="modifyArticleId" value="' . $article['id'] . '">';
    echo '<input type="text" size="1" name="newQantity" value="' . $article['qty'] . '">';
    echo '<button type="submit" class="btn btn-primary">Changer quantité</button>';
    echo '</form>';
    echo '<form method="post" action="panier.php">';
    echo '<input type="hidden" name="index_to_remove" value="' . $article['id'] . '">';
    echo '<input type="submit" name="deleteBtn" value="X">';
    echo '</form>';
    

}

function changeQantity(){

    for ($i = 0; $i < count($_SESSION['cart']); $i++){
       
        if($_SESSION['cart'][$i]["id"] == $_POST['modifyArticleId']){
            $_SESSION['cart'][$i]["qty"] = $_POST['newQantity'];
        }

    }
}

function deleteArticle($itemRemove){
for($i = 0; $i < count($_SESSION['cart']); $i++){
    if ($itemRemove == $_SESSION['cart'][$i]['id']) {
        array_splice($_SESSION['cart'],$i,1);
        echo "article supprimé";
    }
}

function btnSupLePanier(){
    echo "<form method='post' action='panier.php'>";
    echo "<input type='hidden' name='supLePanier'/>";
    echo "<button type='submit'>supprimer le panier</button>";
    echo "</form>";
    ;
}


function supLePanier(){
    $_SESSION['cart']=[];
}
}

function totalArticle(){
    $total = 0;
    foreach($_SESSION['cart'] as $article){
        $total += $article['prix'] * $article['qty'];
    }
    return $total;
}

function fdp(){
    
    $totalFdp = 0;
    foreach($_SESSION['cart'] as $article){
        $totalFdp += 5 * $article['qty'];
    }
    return $totalFdp;
    
}

function totalArticlefdp(){
    return totalArticle() + fdp();
}


function validation(){
    echo "<form method='post' action='index.php'>";
    echo "<input type='hidden' name='validation'>";
    echo "<button type='submit'>valider la commande</button>";
    echo "</form>";
}