<?php

 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/favoritelist.php';
$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);
$virhe = null;


if (!is_null($ravintola)) {
  $s = $ravintola->getSuosikki() - 1;
  $ravintola->setSuosikki($s);
  $ravintola->muokkaaSuosikkia();
  Suosikit::poistaRavintolaListalta($id, $_SESSION['kirjautunut']);
  $_SESSION['ilmoitus'] = "Ravintola poistettu suosikeista.";
  header('Location: ravintola.php?id='.$id);
  } 
