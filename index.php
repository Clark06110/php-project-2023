<?php
$title = "Accueil";
require_once "components/project-header.php";
?>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=supinfo;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    echo "<p>CONNECT TO THE DATABASE</p>";
}
catch (Exception $e)
{
    echo "NO CONNECT TO DATABASE <br>";
    die('Erreur : ' . $e->getMessage());
}
/*
$req = "CREATE TABLE movies (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    year INT(4) NOT NULL,
    genre VARCHAR(255) NOT NULL
  );";
$res = $bdd->query($req);

$req = "INSERT INTO movies (title, year, genre)
VALUES ('The Shawshank Redemption', 1994, 'Drama'),
       ('The Godfather', 1972, 'Crime'),
       ('The Godfather: Part II', 1974, 'Crime'),
       ('The Dark Knight', 2008, 'Action');";
$res = $bdd->query($req);
*/
$req = "SELECT * FROM movies";
$res = $bdd->query($req);
// print_r($res);

?>


<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://moviesdatabase.p.rapidapi.com/titles?titleType=movie&genre=Action&limit=10&startYear=2000",
    // CURLOPT_URL => "https://moviesdatabase.p.rapidapi.com/titles/utils/genres",
    // CURLOPT_URL => "https://moviesdatabase.p.rapidapi.com/titles/utils/titleTypes",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 50,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: moviesdatabase.p.rapidapi.com",
		"X-RapidAPI-Key:  323dacdd96msh37cc676e3519eb7p11507ejsn64b86b1405ac"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $result = json_decode($response);
    echo "<pre>";
	//print_r($response);
    echo "</pre>";
    echo "<pre>";
	//print_r($result);
    echo "</pre>";
    
    for ($i = 0; $i < 10; $i++) {
        echo "<div style='margin-bottom: 50px'>";
        print_r($result->results[$i]->primaryImage->url);echo "<br>";
        print_r($result->results[$i]->primaryImage->caption->plainText);echo "<br>";
        print_r($result->results[$i]->titleType->text);echo "<br>";
        print_r($result->results[$i]->titleText->text);echo "<br>";
        print_r($result->results[$i]->releaseDate->year);echo "<br>";
        print_r($result->results[$i]->releaseDate->month);echo "<br>";
        print_r($result->results[$i]->releaseDate->day);
        echo "</div>";
    }
    
    
    //print_r($response->results->primaryImage->url);
    //print_r($response->results->primaryImage->caption->plainText);
    //print_r($response->results->titleType->text);
    //print_r($response->results->titleText->text);
    //print_r($response->results->releaseDate->year);
    //print_r($response->results->releaseDate->month);
    //print_r($response->results->releaseDate->day);
}

$file = 'assets/genres.json';
$data = file_get_contents($file);
$result = json_decode($data);
/*
echo "<pre>";
print_r($result->genres);
echo "</pre>";
*/
?>


<h1>HELLO PROJECT</h1>
<?php
require_once "components/project-footer.php";
?>