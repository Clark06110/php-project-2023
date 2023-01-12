<?php
$title = "CATEGORY";
require_once "components_project/project-header.php";
?>

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

    // Check if the "id" parameter is set in the URL
    if (isset($_GET['genre'])) {
        // Retrieve the value of the "genre" parameter
        $genre = $_GET['genre'];
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM movies WHERE genre = :genre");

    // Bind the parameters
    $stmt->bindParam(':genre', $genre);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll();

    // echo "<br>RECUP DATA FOR DISPLAY ALL MOVIES<br>";
    echo "<div id='search-results' class='movie-collection'>";
    foreach ($results as $row) {
    echo "<div class='movie-card'>";
        echo "<img src='" . $row['imageURL'] . "' alt='Movie Poster'>";
        echo "<h2 class='movie-title'>" . $row['title'] . "</h2>";
        echo "<p class='movie-description'>" . $row['description'] . "</p>";
        // echo "<p class='movie-description'>" . $row['id'] . "</p>";
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

<?php
require_once "components_project/project-footer.php";
?>