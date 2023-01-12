

<?php
// composer require google/apiclient:^2.0
$title = "Accueil";
require_once "components_project/project-header.php";
// require_once 'vendor/autoload.php';
?>

  <header>
    <form action="hooks_project/clear-cart.php" method="post">
      <input type="submit" value="Clear Cart">
    </form>

    <h1>Movie Store</h1>
    
  </header>
  
  <main>
    <?php
    
    try
    {
      $conn = new PDO('mysql:host=localhost;dbname=supinfo;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      // echo "<p>CONNECT TO THE DATABASE</p>";
    }
    catch (Exception $e)
    {
      echo "NO CONNECT TO DATABASE <br>";
      die('Erreur : ' . $e->getMessage());
    }
    session_start();

    

    // RECUP DATA FOR DISPLAY ALL MOVIES 
    $stmt1 = $conn->query("SELECT * FROM movies");
    // echo "<br>RECUP DATA FOR DISPLAY ALL MOVIES<br>";
    echo "<div id='search-results' class='movie-collection'>";
    while ($row = $stmt1->fetch()) {
      
      
      echo "<div class='movie-card'>";
      echo "<img src='" . $row['imageURL'] . "' alt='Movie Poster'>";
      echo "<h2 class='movie-title'>" . $row['title'] . "</h2>";
      echo "<p class='movie-description'>" . $row['description'] . "</p>";
      echo "<p class='movie-genre'>Genre: " . $row['genre'] . "</p>";
      echo "<p class='movie-year'>Year: " . $row['year'] . "</p>";
      echo "<p class='movie-price'>Price: " . $row['price'] . " €</p>";

      // Display ADD TO CART if logged
      if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == 1) {
        echo "<form action='hooks_project/add-to-cart.php' method='post'>";
        echo "<input type='hidden' name='product_title' value='" . $row['title'] . "'>";
        echo "<input type='hidden' name='product_price' value='" . $row['price'] . "'>";
        echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Add to cart'>";
        echo "</form>";
      } 
      
      echo "</div>";
    }
    echo "</div>";
    // close the connection
    $conn = null;


    ?>

    
  </main>

  <?php
  require_once "components_project/project-footer.php";
  ?>
