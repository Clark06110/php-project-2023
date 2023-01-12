<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=supinfo;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // echo "<p>CONNECT TO THE DATABASE</p>";
}
catch (Exception $e)
{
    echo "NO CONNECT TO DATABASE <br>";
    die('Erreur : ' . $e->getMessage());
}

// Check if the search form was submitted
if (isset($_POST['query'])) {
    // Get the search query from the request
    $query = $_POST['query'];
  
    try
  {
    // Search for movies that match the query
    $sql = "SELECT * FROM movies WHERE title LIKE '%$query%' ORDER BY title ASC";
  
    $req = $bdd->query($sql);
    
    while ($donnee = $req->fetch()) { 
      // print_r($donnee);
      echo "<div class='movie-card'>";
      echo "<img src='" . $donnee['imageURL'] . "' alt='Movie Poster'>";
      echo "<h2 class='movie-title'>" . $donnee['title'] . "</h2>";
      echo "<p class='movie-description'>" . $donnee['description'] . "</p>";
      echo "<p class='movie-genre'>Genre: " . $donnee['genre'] . "</p>";
      echo "<p class='movie-year'>Year: " . $donnee['year'] . "</p>";
      echo "<p class='movie-price'>Price: " . $donnee['price'] . " €</p>";
      
      // Display ADD TO CART if logged
      if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == 1) {
        echo "<form action='hooks_project/add-to-cart.php' method='post'>";
        echo "<input type='hidden' name='product_title' value='" . $donnee['title'] . "'>";
        echo "<input type='hidden' name='product_price' value='" . $donnee['price'] . "'>";
        echo "<input type='hidden' name='product_id' value='" . $donnee['id'] . "'>";
        echo "<input type='submit' value='Add to cart'>";
        echo "</form>";
      } 
      echo "</div>";
    }
  }
      catch (Exception $e)
  {
    echo "PROBLEME <br>";
    die('Erreur : ' . $e->getMessage());
  }
}
?>