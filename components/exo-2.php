<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCUEIL</title>
</head>
<body>
    <?php 
    session_start();
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=supinfo;charset=utf8', 'root', 'rot');
        echo "CONNECT TO DATABASE";
    }
        catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage()); 
    }

    ?>
    
    <div>
        <form action="login.php" method="post" enctype="multipart/form-data">
            <p>name : <input type="text" name="name" value="" /></p>
            <p>email : <input type="email" name="email" value="" /></p>
            <p>password : <input type="password" name="password" value="yessai123" /></p>
            <p>password confirmation : <input type="password" name="password2" value="" /></p>
            <p>file : <input type="file" name="avatar" value="" /></p>
            <p><input type="submit" value="OK"></p>
        </form>
    </div>
</body>
</html>