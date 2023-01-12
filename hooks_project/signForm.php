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
    $id = uniqid();
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
        header('Location: ../login.php');
    }

    
    if ($password == $confirmPassword) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        echo "<br>";
        print_r($hashed_password);

        $stmt = $conn->prepare("INSERT INTO users (id, pseudo, email, password) VALUES (:id, :pseudo, :email, :password)");

        // Bind the parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        // Execute the statement
        try {
            $stmt->execute();
        } catch (Exception $ex) {
            // Login was unsuccessful, display an error message
            echo "Invalid email or password.";
            $_SESSION['error-login-form'] = "Invalid email or password.";
            header('Location: ../login.php');
        }

        // Login
        echo "<br>";
        echo "LOGIN";
        $userInfo = array($id, $pseudo, $email);
        // 4 heures de cookie connecté
        $expire = time() + 60 * (4 * 60);

        // Set the cookie
        setcookie('loggedin', true, $expire, "/");
        setcookie('user-info', json_encode($userInfo), $expire, "/");
        // $_SESSION['success-login-form'] = 'CONNEXION SUCCESS';
        if (isset($_SESSION['error-login-form'])) {
            unset($_SESSION['error-login-form']);
        }
        /*
        echo "<pre>";
        $data = json_decode($_COOKIE['user-info'], true);
        print_r($data);
        print_r('$cookie');
        print_r($_COOKIE['user-info']);
        echo "</pre>";
        */
        header('Location: ../index.php');
    
    } else {
        echo "Password differents.";
        $_SESSION['error-login-form'] = "Password differents.";
        header('Location: ../login.php');
    }


    $conn = null;
    

    

?>
<h1>HELLO</h1>