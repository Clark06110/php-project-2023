<pre>
    <?php 
        print_r($_POST);
        print_r($_FILES);
    ?>
</pre>

<?php
    session_start();


    if (isset($_POST['name']) && !empty($_POST['name'])) {
        // print_r(strlen($_POST['password']));
        if (isset($_POST['password']) && !empty($_POST['password']) && strlen($_POST['password']) >= 8) {
            echo "OK 1";
            if ($_POST['name'] === 'yessai' && $_POST['password'] === 'yessai123') {
                echo "OK 2";
                if (isset($_FILES['avatar']) /*AND $_FILES['avatar']['error'] == 0*/){
                    // Testons si le fichier n'est pas trop gros 
                      if ($_FILES['avatar']['size'] <= 256000) {
                      // Testons si l'extension est autorisée
                        $infosfichier = pathinfo($_FILES['avatar']['name']); 
                        $extension_upload = $infosfichier['extension']; 
                        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png'); 
                        if (in_array($extension_upload, $extensions_autorisees)) {
                        // On peut valider le fichier et le stocker définitivement
                          move_uploaded_file($_FILES['avatar']['tmp_name'], 'uploads/' . basename($_FILES['avatar']['name']));
                          
                          
                          $_SESSION['pseudo'] = $_POST['name'];
                          
                          header('location: /welcome.php');
                          return;
                        } else {
                            echo "extension non autorisé";
                        }
                      } else {
                        echo "TAILLE DU FICHIER TROP GRAND";
                      }
                } else {
                    echo "PAS DE FICHIER";
                }
            }
            
        } else {
            echo "password incomplet";
        }
    } else {
        echo "pseudo incomplet";
    }
?>