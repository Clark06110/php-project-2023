<?php
  $title = "Accueil";
  require_once "components/header.php";

  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=supinfo;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      
  }
      catch (Exception $e)
  {
    echo "NO CONNECT TO DATABASE <br>";
    die('Erreur : ' . $e->getMessage());
  }

  /* EXERCICE 3.1
  $req = "SELECT * FROM voiture";
  $res = $bdd->query($req);
  echo "
      <table>
        
        <tr>
          <th>Marque</th>
          <th>Modele</th>
          <th>Prix</th>
        </tr>
      ";

  while ($donnee = $res->fetch()) {
    // print_r($donnee); 
    echo "
      <tr>
        <td><a href='voiture.php?id=".$donnee['id']."'>".$donnee['marque']."</a></td>
        <td>".$donnee['modele']."</td>
        <td>".$donnee['prix']."</td>
      </tr>
    ";
  }
  echo "</table>";
  $res -> closeCursor();
  */
  $messageText = "HELLO";
  $messageDate = date("Y-m-d");
  $messageAuthor = "ADMINfd";

  /*
  print_r($messageText);
  echo "<br>";
  print_r($messageDate);
  echo "<br>";
  print_r($messageAuthor);
  */

  try
  {
    $req = $bdd -> prepare("INSERT INTO tchat (messageText, messageDate, messageAuthor) VALUES(:messageText, :messageDate, :messageAuthor)");
    $req->execute(array(
      ':messageText' => $messageText,
      ':messageDate' => $messageDate,
      ':messageAuthor' => $messageAuthor
    ));
  }
      catch (Exception $e)
  {
    echo "PROBLEME <br>";
    die('Erreur : ' . $e->getMessage());
  }
  // $req -> bind_param($messageText, $messageDate, $messageAuthor);
  
  echo "Message Envoyé";
  

  /*
  if (isset($_FILES['cv']) AND $_FILES['cv']['error'] == 0){
  // Testons si le fichier n'est pas trop gros
    if ($_FILES['cv']['size'] <= 1000000) {
    // Testons si l'extension est autorisée
      $infosfichier = pathinfo($_FILES['cv']['name']);
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
      if (in_array($extension_upload, $extensions_autorisees)) {
      // On peut valider le fichier et le stocker définitivement
        move_uploaded_file($_FILES['cv']['tmp_name'], 'uploads/' . basename($_FILES['cv']['name']));
        echo "L'envoie a bien été effectué !";
      } 
    }
  }
  */

?>

  
<p>Cette page contient du code HTML avec des balises PHP.</p> 

<div>
  <form method='post' action='bdd.php' enctype='multipart/form-data' class='form-contact'> 
    <input type='text' name='name' value='' placeholder='name'>
    <input type='text' name='email' value='' placeholder='email'>
    <input type='password' name='password' value='' placeholder='password'>
    <input type='file' name='cv' value='' placeholder='file'>
    <input type='submit' name='submit' value='Envoyer'> 
  </form>
</div>

  
<?php  if (isset($_POST['name'])) :?>
  <?php echo $_POST['name']?>
<?php else : ?>
  <?php echo "Veuillez renseignez un nom !" ?>
<?php endif ?>



<?php require_once "components/footer.php" ?>
