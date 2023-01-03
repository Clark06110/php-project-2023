<?php
    session_start();
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

    // Retrieve the email and password values from the form submission
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    print_r($email);
    echo "<br>";
    print_r($password);
    echo "<br>";
    print_r($confirmPassword);


    
    if (strlen($password) <= 6) {
        $_SESSION['error-login-form'] = 'Password is not long enough';
        // header('Location: index.php');
    }

    
    if ($password == $confirmPassword) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        echo "<br>";
        print_r($hashed_password);

        $stmt = $conn->prepare("INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)");

        // Bind the parameters
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        // Execute the statement
        $stmt->execute();

        // Fetch the result
        $user = $stmt->fetch();

        // Check if a user was found
        if ($user) {
            // Login
            echo "<br>";
            echo "LOGIN";
            $expire = time() + 60 * 5;

            // Set the cookie
            setcookie('loggedin', true, $expire, "/");
            setcookie('pseudo', $user['pseudo'], $expire, "/");
            // $_SESSION['success-login-form'] = 'CONNEXION SUCCESS';
            if (isset($_SESSION['error-login-form'])) {
                unset($_SESSION['error-login-form']);
            }
            header('Location: ../index.php');
        } else {
            // Login was unsuccessful, display an error message
            echo "Invalid email or password.";
            $_SESSION['error-login-form'] = "Invalid email or password.";
            header('Location: ../login.php');
        }
    } else {
        echo "Password differents.";
        $_SESSION['error-login-form'] = "Password differents.";
        header('Location: ../login.php');
    }

    $conn = null;
    

    

?>
<h1>HELLO</h1>