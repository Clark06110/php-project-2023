<?php
$title = "Accueil";
require_once "components/header.php";
?>


<?php
/*
/////// CLASSE VOITURE 1
require_once 'components/classe/voiture1.php';
try {
    $voiture1 = new Voiture("Tesla", "elec2", 112, "Bleu");
} catch (Exception $e)
{
    echo "NO CREATE VOITURE <br>";
    die('Erreur : ' . $e->getMessage());
}
$voiture1->set_marque("SUZUKI");
$voiture1->get_information_voiture();
*/
/////// CLASSE COMPTEBANCAIRE
/*
require_once 'components/classe/compteBancaire.php';
try {
    $CompteBancaire_1 = new CompteBancaire("jean", 1000);
} catch (Exception $e)
{
    echo "LE COMPTE BANCAIRE N'EST PAS CRÉÉ <br>";
    die('Erreur : ' . $e->getMessage());
}

$CompteBancaire_1->get_information_compteBancaire();
$CompteBancaire_1->set_credit(500);
$CompteBancaire_1->get_information_compteBancaire();
*/

/////// EXERCICE 1.9
require_once 'components/classe/voiture2.php';
require_once 'components/classe/camion.php';

echo "ICI 1 <br>";

$voiture1 = new Voiture('Suzuki', 'BQ-253-QQ', 10000);
$voiture2 = new Voiture('Tesla', 'YY-013-JJ', 50000);


$camion1 = new Camion('Camion_1', 'UU-233-DD', 125000, 15);
$camion2 = new Camion('Camion_2', 'MM-999-MM', 613000, 20);

$voiture1->get_informations();
$voiture2->get_informations();
$camion1->get_informations();
$camion2->get_informations();

$camion1->set_poids(18);
$camion1->_poids;
echo "ICI 3<br>";
echo $camion1;

$voiture1->demarrer();
$voiture1->rouler();
$voiture1->stopper();

    



echo "ICI 2 <br>";
?>

<h1>HELLO</h1>

<?php
require_once "components/footer.php";
?>