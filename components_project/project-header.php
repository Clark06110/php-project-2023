<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php if (isset($title)): ?>
                <?= $title ?>
            <?php else : ?>
                <?= "Titre Casual" ?>
            <?php endif ?>
        </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../style.css" />
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
                    url: 'hooks_project/search.php',
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
        <li><a href="/">Home</a></li>
        <div class="menu">
            Categories
            <li class="categories">
            <a href="/category.php?genre=action">Action</a>
            <a href="/category.php?genre=drama">Drama</a>
            <a href="/category.php?genre=crime">crime</a>
            <a href="/category.php?genre=sci-fi">Science fiction</a>
            <a href="/category.php?genre=western">Western</a>
            <a href="/category.php?genre=animation">Animation</a>
            </li>
        </div>
        <?php
            // Check if the user is logged in
            /*
            echo "<pre>";
            print_r($_COOKIE["pseudo"]);
            echo "</pre>";
            */
            if (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == true) {
            // If the user is logged in, display the navbar anchor
            echo '<li><a href="/cart.php">Cart</a></li>';
            }
        ?>
        <li><a href="/login.php">Log In</a></li>
        </ul>
        <!-- Add a search bar to the page -->
        <form id="search-form">
        <input type="text" id="search-input" placeholder="Search for a movie...">
        <button type="submit">Search</button>
        </form>
    </nav>