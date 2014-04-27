<?php

 require_once 'libs/utilities.php';
 require_once 'libs/models/restaurant.php';
 require_once 'libs/models/favoritelist.php';
 require_once 'libs/models/user.php';
$id = (int)$_GET['id'];
$ravintola = Ravintola::etsiRavintolaIdlla($id);
$kayttaja = Kayttaja:etsiKayttajaIdlla($_SESSION['kirjautunut']);


if (!is_null($ravintola)) {
  $s = $ravintola->getSuosikki() - 1;
  $ravintola->setSuosikki($s);
  $ravintola->muokkaaSuosikkia();
  $k = $kayttaja->getSuosikkeja() -1;
  $kayttaja->setSuosikkeja($k);
  $kayttaja->muokkaaSuosikkeja();
  Suosikit::poistaRavintolaListalta($id, $_SESSION['kirjautunut']);
  $_SESSION['ilmoitus'] = "Ravintola poistettu suosikeista.";
  header('Location: ravintola.php?id='.$id);
  } 
