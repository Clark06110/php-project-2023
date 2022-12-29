<!DOCTYPE html>
<html>
<head>
  <title>Movie Store</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 

<!-- Include the jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script defer>
  // Wait for the document to be ready
  $(document).ready(function() {
    // Attach a submit event handler to the search form
    $('#search-form').submit(function(event) {
      // Prevent the form from being submitted
      event.preventDefault();

      // Get the search query from the input field
      var query = $('#search-input').val();

      // Send an AJAX request to the server to search for movies
      $.ajax({
        url: 'search.php',
        type: 'POST',
        data: {
          query: query
        },
        success: function(response) {
          // Display the search results
          $('#search-results').html(response);
        }
      });
    });
  });
</script>
</head>

<body>

  <nav>
    <ul>
      <li><a href="/test.php">Home</a></li>
      <li><a href="#">Movies</a></li>
      <li><a href="#">About</a></li>
      <li><a href="/panier.php">Panier</a></li>
    </ul>
    <!-- Add a search bar to the page -->
    <form id="search-form">
      <input type="text" id="search-input" placeholder="Search for a movie...">
      <button type="submit">Search</button>
    </form>
  </nav>

  <header>
    <!-- Add a search bar to the page -->
    <form id="add-product-form">
      <input type="text" id="add-product" placeholder="Search for a movie...">
      <button type="submit">VOIR PANIER</button>
    </form>
    
    <form action="clear-cart.php" method="post">
      <input type="submit" value="Clear Cart">
    </form>

    <h1>Movie Store</h1>
  </header>
  
  <main>
    <h1>HELLO MAIN</h1>
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

    // Display the cart
    echo "<h1>Cart</h1>";
    echo "<ul>";
    if (!empty($_SESSION['cart'])) {
        // The cart is empty
        foreach ($_SESSION['cart'] as $product) {
        echo "<pre>";
        echo "PRODUCT<br>";
        print_r($product);
        echo "</pre>";
        }
    } else {
        // The cart is not empty
        echo "<li>The CART is empty !!!</li>";
    }
    echo "</ul>";


    // RECUP DATA FOR DISPLAY ALL MOVIES 
    $stmt1 = $conn->query("SELECT * FROM movies");
    echo "<br>RECUP DATA FOR DISPLAY ALL MOVIES<br>";
    echo "<div id='search-results' class='movie-collection'>";
    while ($row = $stmt1->fetch()) {
      
      echo "<div class='movie-card'>";
      echo "<img src='" . $row['imageURL'] . "' alt='Movie Poster'>";
      // echo "<img src='https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5' alt='Movie Poster'>";
      echo "<h2 class='movie-title'>" . $row['title'] . "</h2>";
      echo "<p class='movie-description'>" . $row['description'] . "</p>";
      echo "<p class='movie-genre'>Genre: " . $row['genre'] . "</p>";
      echo "<p class='movie-year'>Year: " . $row['year'] . "</p>";
      echo "<p class='movie-price'>Price: " . $row['price'] . " €</p>";
      // display the add to cart button
      // echo "<button onclick=\"addToCart('" . $row["title"] . "', '" . $row["price"] . "')\">Add to Cart</button>";
      // echo "<li>" . $row['title'] . " - " . $row['price'] ." <a href='?add=" . $row['id'] . "'>Add to Cart</a></li>";
      // echo "<button class='movie-button' onclick=\"addProduct('" . $row[id] ."')\">ADD CART</button>";


      echo "<form action='cart.php' method='post'>";
      // echo "<input type='hidden' name='product_id' value='123'>";
      echo "<input type='hidden' name='product_title' value='" . $row['title'] . "'>";
      echo "<input type='hidden' name='product_price' value='" . $row['price'] . "'>";
      echo "<input type='submit' value='Add to cart'>";
      echo "</form>";
      echo "</div>";
    }
    echo "</div>";
    // close the connection
    $conn = null;


    ?>

    
  </main>
  
  <footer>
    <p>Copyright 2021 Movie Store</p>
  </footer>
</body>
</html>
