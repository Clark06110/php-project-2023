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
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");

    // Bind the parameters
    $stmt->bindParam(':email', $email);
    // $stmt->bindParam(':password', $hashed_password);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $user = $stmt->fetch();
    
    // Check if a user was found
    if ($user) {
        if (password_verify($password, $user['password'])){
            // Login
            $userInfo = array($user['id'], $user['pseudo'], $user['email']);

            $expire = time() + 60 * (4 * 60);


            // Set the cookie
            setcookie('loggedin', true, $expire, "/");
            setcookie('user-info', json_encode($userInfo), $expire, "/");
            echo "<br>";
            // $_SESSION['success-login-form'] = 'CONNEXION SUCCESS';
            if (isset($_SESSION['error-login-form'])) {
                unset($_SESSION['error-login-form']);
            }
            /*
            echo "<pre>";
            $data = json_decode($_COOKIE['user-info'], true);
            print_r($data);
            echo "</pre>";
            */
            header('Location: ../index.php');
        } else {
            $_SESSION['error-login-form'] = "Invalid password";
            header('Location: ../login.php');
        }
        
    } else {
        // Login was unsuccessful, display an error message
        $_SESSION['error-login-form'] = "Invalid email";
        header('Location: ../login.php');
    }

?>