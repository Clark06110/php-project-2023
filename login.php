<?php
$title = "LOGIN";
require_once "components_project/project-header.php";
?>
<head>
    <script>
    function toggleForm() {
        // Get the login form element
        var loginForm = document.getElementById("login-form");
        var signInForm = document.getElementById("signin-form");
        

        // Toggle the visibility of the form
        if (loginForm.style.display === "none") {
            loginForm.style.display = "block";
            signInForm.style.display = "none";
        } else {
            loginForm.style.display = "none";
            signInForm.style.display = "block";
        }
        console.log("Button clicked!");
    }
    </script>
</head>

<button onclick="toggleForm()">Toggle Form</button>
<form method="POST" action="hooks_project/loginForm.php" id="login-form">
  <label for="email">Email:</label>
  <input type="email" name="email" id="email">
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  <br>
  <input type="submit" value="Log In">
</form>

<form method="POST" action="hooks_project/signForm.php" id="signin-form" style="display:none;">
  <label for="email">Email:</label>
  <input type="email" name="email" id="email">
  <br>
  <label for="pseudo">Pseudo:</label>
  <input type="text" name="pseudo" id="pseudo">
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  <br>
  <label for="confirmPassword">Confirm password:</label>
  <input type="password" name="confirmPassword" id="confirmPassword">
  <br>
  <input type="submit" value="Sign In">
</form>

<?php
session_start();
if (isset($_SESSION['error-login-form'])) {
    echo "<p class='error-log'>";
    print_r($_SESSION['error-login-form']);
    echo "</p>";
}
if (isset($_SESSION['success-login-form'])) {
    echo "<p class='success-log'>";
    print_r($_SESSION['success-login-form']);
    echo "</p>";
}
?>

<?php
require_once "components_project/project-footer.php";
?>