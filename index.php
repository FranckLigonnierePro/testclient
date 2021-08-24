<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_login($con);



?>

<?php include("header.php"); ?>

    <section>
        <?php
        if($user_data = check_login($con)){
            
            echo '<a href="logout.php">Logout</a>';
            echo "Hello," . $user_data['nom'] . "";
        }

        ?>
    </section>


    <section>

        <?php

        // Attempt select query execution
        $sql = "SELECT * FROM articles";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($article = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo '<img src="'. $article["image"] .'" alt="" width="300px">';
                    echo "<td>" . $article['nom'] . "</td>";
                    echo "<td>" . $article['description'] . "</td>";
                    echo "<td>" . $article['prix'] . "</td>";
                    echo "</tr>";
                    echo "<a href='produit.php'>description</a>";
                    echo "<a href='panier.php'>ajouter au panier</a>";
                }
                // Free result set
                mysqli_free_result($result);
            } else {
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close connection
        mysqli_close($con);
        ?>


    </section>

    <?php include("footer.php"); ?>