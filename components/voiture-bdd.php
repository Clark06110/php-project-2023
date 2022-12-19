<?php

$title = "Voiture ".$_GET['id'];
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

print_r($_GET);

$req = $bdd->prepare('SELECT * FROM voiture WHERE id=:id');
$req->execute(array(':id' => $_GET['id']));

echo "
      <table>
        
        <tr>
          <th>Marque</th>
          <th>Modele</th>
          <th>Prix</th>
          <th>descriptif</th>
          <th>Cylindre</th>
          <th>Motorisation</th>
        </tr>
      ";
while ($donnee = $req->fetch()) {
    echo "
      <tr>
        <td>".$donnee['marque']."</a></td>
        <td>".$donnee['modele']."</td>
        <td>".$donnee['prix']."</td>
        <td>".$donnee['descriptif']."</td>
        <td>".$donnee['cylindre']."</td>
        <td>".$donnee['motorisation']."</td>
      </tr>
    ";
}
echo "</table>";
$req -> closeCursor();

?>

<?php
require_once "components/footer.php";
?>