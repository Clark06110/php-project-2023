<?php
$title = "Accueil";
require_once "components/project-header.php";
?>

<?php

// connect to the database
/*
$host = "localhost";
$user = "your_username";
$password = "your_password";
$dbname = "your_database_name";
*/

try {
	// $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	$conn = new PDO('mysql:host=localhost;dbname=supinfo;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	die("Connection failed: " . $e->getMessage());
}

// CREATE THE TABLE MOVIES
/*
$sql = "CREATE TABLE movies (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	price DECIMAL(10,2) NOT NULL,
	title TEXT NOT NULL,
	year INT(4) NOT NULL,
	genre VARCHAR(255) NOT NULL,
	description TEXT NOT NULL,
	imageURL TEXT NOT NULL
)";
try {
	$conn->exec($sql);
	echo "Table movies created successfully";
} catch(PDOException $e) {
	echo "Error creating table: " . $e->getMessage();
}

// close the connection
$conn = null;
*/


// SEND MOVIES TO THE TABLE 
/*
$sql = "INSERT INTO movies (price, title, year, genre, description, imageURL)
VALUES (5, 'The Shawshank Redemption', 1994, 'Drama', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Godfather', 1972, 'Crime', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Godfather: Part II', 1974, 'Crime', 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Dark Knight', 2008, 'Action', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, '12 Angry Men', 1957, 'Drama', 'A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Pulp Fiction', 1994, 'Crime', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Good, the Bad and the Ugly', 1966, 'Western', 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Matrix', 1999, 'Sci-Fi', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'One Flew Over the Cuckoo''s Nest', 1975, 'Drama', 'A criminal pleads insanity after getting into trouble again and once in the mental institution rebels against the oppressive nurse and rallies up the scared patients.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Inception', 2010, 'Sci-Fi', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Goodfellas', 1990, 'Crime', 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Prestige', 2006, 'Drama', 'Two stage magicians engage in competitive one-upmanship in an attempt to create the ultimate stage illusion.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Departed', 2006, 'Crime', 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Lion King', 1994, 'Animation', 'A Lion prince is born in Africa, thus making his uncle Scar the second in line to the throne. Scar plots with the hyenas to kill King Mufasa and Prince Simba, thus making himself King.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Green Mile', 1999, 'Drama', 'The story of a supernatural-infused prison drama set on death row in the 1930s South, where gentle giant John Coffey possesses the mysterious power to heal people''s ailments.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Silence of the Lambs', 1991, 'Thriller', 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Gladiator', 2000, 'Action', 'When a Roman general is betrayed and his family murdered by an emperor''s corrupt son, he comes to Rome as a gladiator to seek revenge.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Interstellar', 2014, 'Sci-Fi', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity''s survival.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Forrest Gump', 1994, 'Drama', 'Forrest Gump, while not intelligent, has accidentally been present at many historic moments, but his true love, Jenny Curran, eludes him.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Avengers', 2012, 'Action', 'Earth''s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Harry Potter and the Sorcerer''s Stone', 2001, 'Fantasy', 'Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Titanic', 1997, 'Drama', 'A seventeen-year-old aristocrat falls in love with a kind, but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Great Gatsby', 2013, 'Drama', 'A writer and wall street trader, Nick, finds himself drawn to the past and lifestyle of his millionaire neighbor, Jay Gatsby.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Wolf of Wall Street', 2013, 'Biography', 'Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Avatar', 2009, 'Action', 'A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Revenant', 2015, 'Adventure', 'A frontiersman on a fur trading expedition in the 1820s fights for survival after being mauled by a bear and left for dead by members of his own hunting team.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Doctor Strange', 2016, 'Action', 'While on a journey of physical and spiritual healing, a brilliant neurosurgeon is drawn into the world of the mystic arts.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Black Panther', 2018, 'Action', 'T''Challa, the King of Wakanda, rises to the throne in the isolated, technologically advanced African nation, but his claim is challenged by a vengeful outsider who was a childhood victim of T''Challa''s father''s mistake.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Moonlight', 2016, 'Drama', 'A young African-American man grapples with his identity and sexuality while experiencing the everyday struggles of childhood, adolescence, and burgeoning adulthood.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Mad Max: Fury Road', 2015, 'Action', 'In a post-apocalyptic wasteland, a woman rebels against a tyrannical ruler in search for her homeland with the aid of a group of female prisoners, a psychotic worshiper, and a drifter named Max.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'La La Land', 2016, 'Musical', 'A jazz pianist falls for an aspiring actress in Los Angeles.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Incredibles', 2004, 'Animation', 'A family of undercover superheroes, while trying to live the quiet suburban life, are forced into action to save the world.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Terminator', 1984, 'Action', 'A cyborg is sent from the future on a deadly mission. He has to kill Sarah Connor, a young woman whose life will have a great significance in years to come. Sarah has only one protector - Kyle Reese - also sent from the future. The Terminator uses his exceptional intelligence and strength to find Sarah, but is there any way to stop the seemingly indestructible cyborg?', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Indiana Jones and the Raiders of the Lost Ark', 1981, 'Adventure', 'Archeologist and adventurer Indiana Jones is hired by the US government to find the Ark of the Covenant before the Nazis.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Back to the Future', 1985, 'Adventure', 'Marty McFly, a 17-year-old high school student, is accidentally sent thirty years into the past in a time-traveling DeLorean invented by his close friend, the eccentric scientist Doc Brown.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'E.T. the Extra-Terrestrial', 1982, 'Sci-Fi', 'A troubled child summons the courage to help a friendly alien escape Earth and return to his home world.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Iron Giant', 1999, 'Animation', 'A boy makes friends with an innocent alien giant robot that a paranoid government agent wants to destroy.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Princess Bride', 1987, 'Adventure', 'While home sick in bed, a young boy''s grandfather reads him a story called The Princess Bride.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Avengers Endgame', 2019, 'Action', 'After the devastating events of Avengers, Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos actions and restore balance to the universe.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'Jurassic Park', 1993, 'Adventure', 'During a preview tour, a theme park suffers a major power breakdown that allows its cloned dinosaur exhibits to run amok.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5'),
	(5, 'The Wizard of Oz', 1939, 'Musical', 'Dorothy Gale is swept away to a magical land in a tornado and embarks on a quest to see the Wizard who can help her return home.', 'https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5');";

try {
	$conn->exec($sql);
	echo "Movies data sent successfully";
} catch(PDOException $e) {
	echo "Error sending movies data: " . $e->getMessage();
}

// close the connection
$conn = null;
*/





// https://drive.google.com/file/d/1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5/view?usp=share_link
// https://drive.google.com/uc?id=1DJZW6es2NTEzkghl-wdNFrqafzvA2ZN5


?>

<h1>SI TU VOIS CE MESSAGE C'EST SUREMENT QUE TOUT C'EST BIEN PASSÉ SI TU AS LANCÉ UNE REQUÊTE 👍</h1>
<?php
require_once "components/project-footer.php";
?>