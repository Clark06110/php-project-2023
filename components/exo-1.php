<?php

  // Exercice 1.2
  /*
  for ($i = 1; $i <= 20; $i++) {
    echo "$i </br>";
  }
  */

  // Exercice 1.3
  /*
  echo "sortie de la boucle, voici la valeur de i : $i<br>";
  echo 'sortie de la boucle, voici la valeur de i : $i<br>';
  */
 
  // Exercice 1.4
  // True affiche 1 mais false n'affiche pas 0, NULL affiche rien 
  
  /*
  $var1 = true;
  $var2 = false;
  $var3 = NULL;
  
  echo "
  <p>La variable 1 vaut : $var1</p>
  <p>La variable 2 vaut : $var2</p>
  <p>La variable 3 vaut : $var3</p>
  ";*/

  // Exercice 1.5
  // Affiche le type
  /*
  var_dump($var1);
  var_dump($var2);
  var_dump($var3);
  */

  // Exercice 1.6
  /*
  echo '<p>L\'événement principal ce mois-ci est :<br>';
  echo "<span class=’event’>’Oktoberfest’</span></p>";
  */

  // Exercice 1.7
  /*
  for ($i = 1; $i <= 10; $i++) {
    for ($a = 1; $a <= 10; $a++) {
      echo '*';
    }
    echo '<br>';
  }
  */

  // EXercice 1.8 et 1.9
  // $alphabet=['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', i];
  //print_r($alphabet);

  /*
  for ($i = 0; $i <= count($alphabet); $i++) {
    $res = strtoupper($alphabet[$i]);
    echo "$res ";
  }
  */

  /*
  for ($i = 0; $i <= count($alphabet); $i++) {
    $res = strtoupper($alphabet[count($alphabet)-$i]);
    echo "$res ";
  }
  */

  //Exercice 1.10
  /*
  $mois = [
    'janvier' => 31,
    'fevrier' => 28,
    'mars' => 31,
    'avril' => 30,
    'mai' => 31,
    'juin' => 30,
    'juillet' => 31,
    'aout' => 31,
    'septembre' => 30,
    'octobre' => 31,
    'novembre' => 30,
    'decembre' => 31
  ];
  $countDays = 0;

  foreach($mois as $key => $value) {
    $countDays += $value;
    if ($value % 2 == 0) {
      echo "<p>Mois Pairs</p>";
    } else {
      echo "<p>Mois Impairs</p>";
    }
    echo "
      <p>$key contient $value jours dans le mois</p>
      <p>$countDays depuis le début de l'année</p> <br><br>
    ";
  }
  */

  // Exercice 1.11
  /*
  $alphabet=['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', i];
  for ($i = 0; $i <= count($alphabet); $i++) {
    if (ord($alphabet[$i]) < 300) {
      $res = strtoupper($alphabet[$i]);
      echo "$res ";
    }
  }
  */

  //Exercice 1.12
  /*
  $date = date('d-m-Y');
  $dateConfig = explode("-", $date);
  print_r($dateConfig);
  print_r($dateConfig[1]);
  echo "<br>";
  switch ($dateConfig[1]) {
    case 1:
      echo('janvier');
    case 2:
      echo('fevrier');
    case 12: 
      echo('decembre');
      break;
    default: 
      echo('YESSAI');
  };
  */

  //Exercice 1.13
  // OBLIGER DE RETURN QQCH
  /*
  function dateFrancaise($date) {
    $dateFormat = strstr($date, '-');

    if (empty($dateFormat)) {
      // on essaye pour l'autre format car vide

      $dateFormat = strstr($date, '/');

      if (empty($dateFormat)) {
        return "ERREUR";
      }
        
      else {
        $year = strstr($date, '/', true);
        $month = str_replace('/', '', strstr(strstr($date, '/'), '/', true));
        $day = strstr(strstr($date, '/'), '/');

        return "$day / $month / $year <br>";
      }
    } else {
      $day = strstr($date, '-', true);
      $month = str_replace('-', '', strstr(strstr($date, '-'), '-', true));
      $year = strstr(strstr($date, '-'), '-');

      return "$day - $month - $year <br>";
      
    }
    
    return $date;
  };

  $date = dateFrancaise("04-12-2019");
  echo $date;

  $date = dateFrancaise("2019/04/12");
  echo $date;
  */

  //EXERCICE 1.19
  /*
  $utilisateur = 'HaCk3RdU37';
  $commentaire = '<p><b>Hello !</b><br>Ceci est mon <u>PREMIER</u> commentaire</ p>';
  $commentaieChecked = strip_tags($commentaire);
  echo '<p>Commentaire laissé par '.$utilisateur.'</p>';
  echo '<p>'.$commentaieChecked.'</p>';
  */
  
  


  


  
  
  ?>